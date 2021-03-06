<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class ticket extends BaseModel{
    
    protected $table = 'tickets';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'code',
        'date',
        'price',

        'id_film',
        'id_user',
        'id_showtime',
        'id_seat',
        
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
    public function seat(){
        return $this->belongsTo('App\Models\seat', 'id_seat', 'id');
    }
    public function user(){
        return $this->belongsTo('App\Models\user', 'id_user', 'id');
    }
    public function film(){
        return $this->belongsTo('App\Models\film', 'id_film', 'id');
    }
    public function showtime(){
        return $this->belongsTo('App\Models\showtime', 'id_showtime', 'id');
    }
}
