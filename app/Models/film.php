<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class film extends BaseModel{
    
    protected $table = 'films';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'code',
        'name',
        'runtime',
        'director',
        'cast',
        'trailer',
        'openday',
        'price',
        'poster',
        'status',
        'banner',
        'description',
        'star',
        
        // 'id_genre',
        // 'id_country',
        
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;

    public function __construct() {
        $this->fillable_list = $this->fillable;         // trường fillable sẽ truyền vào biến fillable_list
    }
    
    public function base_update(Request $request)
    {
        // $filter_param = $request->only($this->$fillable);
        $this->update_conditions = [
            'id' => 1
        ];
        
        return parent::base_update($this->request);
    }
}
