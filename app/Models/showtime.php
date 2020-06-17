<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class showtime extends BaseModel{
    
    protected $table = 'showtimes';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'code',
        'date',
        'start',
        'end',

        'id_film',
        'id_room',
        
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

    public function film(){
        return $this->belongsTo('App\Models\film','id_film','id');
    }
    public function room(){
        return $this->belongsTo('App\Models\room', 'id_room', 'id');
    }
}
