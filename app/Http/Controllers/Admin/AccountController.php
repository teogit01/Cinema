<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\user;
class AccountController extends Controller
{
    public function index(){
    	$users = user::all();
    	return view('admin.account.index',['users'=>$users]);
    }

    // ajax load ticket from film

    public function find(Request $request){
    	
    	$name = $request->name;
    	if(isset($name)){
    		$users = user::where('name',$name)->get();
    	} else {
    		$users = user::all();
    	}
    	return view('admin.account.load-user',[
    		'users'=>$users,
    	]);
    }

}
