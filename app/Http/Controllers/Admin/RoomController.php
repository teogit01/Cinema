<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\room;

class RoomController extends Controller
{
    public function index(Request $request){
    	$rooms = room::all();
    	return view('admin.room.index',['rooms'=>$rooms]);
    }
    public function postAdd(Request $request){
    	$code = str::random(5);
    	$room = new room();
    	$room->code = $code;
    	$room->name = $request->name;
    	$room->save();
    	return back()->with('success','Thêm Thành Công!');
    }

    // Delete
    public function postDetele(Request $request){
        $room = room::find($request->id);
        $room->delete();
        return back()->with('success','Xoá Thành Công!');
    }
    // Edit
    public function postEdit(Request $request){
        $room = room::find($request->id);
        $room->name = $request->value;
        $room->save();
        return back()->with('success','Sửa Thành Công!');
        //return $request->value;
    }
}
