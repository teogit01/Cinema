<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Exception;
use Illuminate\Support\Facedes\Validation;
use App\Http\Controllers\Base\BaseResponseweb;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const SUCCESS = 'SUCCESS';
    const ERROR = 'ERROR';

    public $request;
    public $model = null;
    
    public $response;
    public $only_code = true;
    public $key = 'data';
    public $data =[];
    public $nameImgs = [];
    public $checkLogin=null;

    public function __construct(){
        
    }

    public function config($option){
    	isset($option['request']) ? $this->request = $option['request'] : '';
    	isset($option['model']) ? $this->model = $option['model'] : '';
    }

    public function addImg($imgs){
        //if (isset($imags) and count($imgs)>0){
        if (($imgs) != null){
            $path = public_path('img/carDetail');
            foreach($imgs as $index => $img ) {
                $name = Str::random(5).'_'.$img->getClientOriginalName();
                $img->move($path,$name);
                //$img->storeAs('public/img/carDetail', $name);
                //$img->store('public/img/carDetail');
                $this->nameImgs[] = $name;
            }
        }  
        return;
    }
    public function response(){
        if ($this->only_code) {
            return $this->response::response();
        }

        return $this->response::response($this->key, $this->data);
    }
}
