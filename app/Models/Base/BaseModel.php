<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BaseModel extends Model
{
    // List fill want get on request
    protected $fillable_list = [];
    // Conditions where on query
    protected $update_conditions = [];
    protected $delete_conditions = [];

    public function base_search(Request $request){
        $data = self::query();      // self dùng khi gọi static function
        $filter_param = $request->only($this->fillable_list);       // bộ lọc chỉ lọc và lấy ra các trường thuộc trong fillable_list , nếu có trường nào ngoài thì sẽ bỏ qua.
        if(!empty($filter_param)){
            foreach ($filter_param as $key => $value) {
                $data = $data->where($key, $value);
            }
        }
        return $data;
    }

    public function base_first(Request $request)
    {
        $data = $this->base_search($request);        
        // Nhớ thêm order by để lấy được trường tạo gần đây nhất
        return $data->first();
    }

    public function base_index(Request $request)
    {
        $data = $this->base_search($request);   // tìm kím xem request có tìm thấy k?
        return $data->where("deleted_at", null)->get();     // nếu nó không bị xóa mềm thì lấy ra được. NULL ngĩa là trường đó k bị xóa sẽ lấy dữ liệu ra đc.
    }

    public function base_insert(Request $request)
    {
        $filter_param = $request->only($this->fillable_list);

        return self::insert($filter_param);
    }

    public function base_update(Request $request)
    {
        $filter_param = $request->only($this->fillable_list);
        // Bỏ đi id trong filter_param
        return self::where($this->update_conditions)
                    ->update($filter_param);
    }

    // Hàm xóa cứng. Xóa cái mất luôn k khôi phục được.
    public function base_delete(Request $request)
    {
        $data = self::query();
        $filter_param = $request->only($this->delete_conditions);
        if(!empty($filter_param)){
            foreach ($filter_param as $key => $value) {
                $data = $data->where($key, $value);
            }
            return self::where($filter_param)->delete();
        }
    }

    // Hàm xóa mềm. Xóa có thể khôi phục được.
    public function base_soft_delete(Request $request)
    {
        $data = self::query();
        $filter_param = $request->only($this->delete_conditions);
        if(!empty($filter_param)){
            foreach ($filter_param as $key => $value) {
                $data = $data->where($key, $value);
            }
            return self::where($filter_param)
                        ->update([
                            "deleted_at" => Carbon::now()->toDateTimeString()
                        ]);
        }
    }

    // use on web
    public function web_first(Request $request)
    {
        return $this->base_first($request);
    }

    public function web_index(Request $request)
    {
        return $this->base_index($request);
    }

    public function web_insert(Request $request)
    {
        return $this->base_insert($request);
    }

    public function web_update(Request $request)
    {
        return $this->base_update($request);
    }

    public function web_delete(Request $request)
    {
        return $this->base_delete($request);
    }
}
