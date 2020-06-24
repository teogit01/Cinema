<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(){
    	return view('login');
    }
    public function postLogin(Request $request){

    	$email = $request->email;
    	$password = $request->password;
        

    	if( Auth::attempt(['email' => $email, 'password' =>$password])) {

    		$user = User::where('email',$email)->first();
    		if ($user){
    			if ( Hash::check($password,$user->password) ){
    				if ( $user->role== 'Admin' ){
            //return view('admin.index');
    					return redirect('admin/film/list');
    				} else {
            //custom
                // return view('user');
    					return redirect('user');
    				}
    			}
    		}
    	} 
    	return redirect('login');
    }
    public function register(){
    	return view('register');
    }

    public function postRegister(Request $request){
    
    	if ($request->has('avatar')){
    		$path = public_path('img/avatar');
    		$name = Str::random(5).'_'.$request->avatar->getClientOriginalName();
            $request->avatar->move($path,$name);
    	} 
    	$user = new user();

    	$user->code = Str::random(5);
    	$user->name = $request->name;
    	$user->password = Hash::make($request->password);
    	$user->avatar = isset($name) ? $name : '';
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->birthday = $request->birthday;
    	$user->gender = isset($request->gender) ? $request->gender : 'other';
    	$user->role = 'User';
    	$user->save();

    	return redirect('/user');

    	// if ( Hash::check($password,$user->password) ){
    	//$this->request['password'] =  Hash::make($request->password);
    	
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/user');
    }
}
