<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\room;
use App\Models\seat;
class SeatController extends Controller
{
    public function index(Request $request){
    	//return $request;	
    	$rooms = room::all();
    	$seats = seat::where('room_id','=',1)->orderBy('row','asc')->orderBy('column','asc')->get();
    	return view('admin.seat.index',['rooms'=>$rooms,'seats'=>$seats]);
    }
    //
    public function postIndex(Request $request){
    	$seats = seat::where('room_id','=',$request->room_id)->orderBy('row','asc')->orderBy('column','asc')->get();
    	return view('admin.seat.updateSeat',['seats'=>$seats]);
    }
    // add
    public function add(Request $request){
    	$row = $request->row;
    	$column = $request->column;
    	$room_id = $request->room_id;
    	$name = $row.$column;
    	$code = str::random(5);
    	
    	$seat = new seat();
    	$seat->code = $code;
    	$seat->name = $name;
    	$seat->room_id = $room_id;
    	$seat->row = $row;
    	$seat->column = $column;
    	$seat->status = 0;
    	$seat->save();
    	$seats = seat::where('room_id','=',$request->room_id) ->orderBy('row','asc')->orderBy('column','asc')->get();
    	return view('admin.seat.updateSeat')->with(['success'=>'Thêm Thành Công!','seats'=>$seats]);;
    	//return back()->with(['success'=>'Thêm Thành Công!','room_id'=>$request->room_id]);
    	//return 
    }

    // Auto select seat
    public function select(Request $request){
 		
 		// $seats = seat::where('room_id','=',$request->room_id)->where('row','=',$request->row)->get();
 		$seats = seat::where([['room_id','=',$request->room_id],['row','=',$request->row]])->get();

 		if (count($seats) > 0){
 			for($i=0; $i<10; $i++){
 				$count = 0;
 				foreach ($seats as $seat) {
 					if (($i+1) == $seat->column ){
 						$count++;
 					}
 				}

 				if ($count == 0){
 					//return $count;
 					$columns[] = $i+1;
 				}
 			}
 			return $columns;
 		}
 		else {
 			
 			return $columns[] = [1,2,4,5,6,7,8,9,10];
 		}
    	//return $request->row;
    }
}
