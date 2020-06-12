<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\country;

class CountryController extends Controller
{
    public function index(){
    	
    	$countrys = country::all();
    	return view('admin.country.index',['countrys'=>$countrys]);
    }
    public function postAdd(Request $request){
    	$code = str::random(5);
    	$country = new country();
    	$country->code = $code;
    	$country->name = $request->name;
    	$country->save();
    	return back()->with('success','Thêm Thành Công!');
    }
    // Delete
    public function postDetele(Request $request){
        $country = country::find($request->id);
        $country->delete();
        return back()->with('success','Xoá Thành Công!');
    }
    // Edit
    public function postEdit(Request $request){
        $country = country::find($request->id);
        $country->name = $request->value;
        $country->save();
        return back()->with('success','Sửa Thành Công!');
        //return $request->value;
    }
}
