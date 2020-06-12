<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\genre;
class GenreController extends Controller{
    
    public function index(){
    	$genres = genre::all();
    	
    	return view('admin.genre.index',['genres'=>$genres]);
    }

    public function postAdd(Request $request){
    	$code = str::random(5);
    	$genre = new genre();
    	$genre->code = $code;
    	$genre->name = $request->name;
    	$genre->save();
    	return back()->with('success','Thêm Thành Công!');
    }
    // Delete
    public function postDetele(Request $request){
        $genre = genre::find($request->id);
        $genre->delete();
        return back()->with('success','Xoá Thành Công!');
    }
    // Edit
    public function postEdit(Request $request){
        $genre = genre::find($request->id);
        $genre->name = $request->value;
        $genre->save();
        return back()->with('success','Sửa Thành Công!');
        //return $request->value;
    }
}
