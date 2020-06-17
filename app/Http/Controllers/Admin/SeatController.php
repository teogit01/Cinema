<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\room;
use App\Models\seat;
use App\Models\film;
use App\Models\showtime;
use App\Models\ticket;
class SeatController extends Controller
{
    public function index(Request $request){
        $rooms = room::all();
        //$seats = seat::where('room_id','=',1)->orderBy('row','asc')->orderBy('column','asc')->get();
    	//return view('admin.seat.index');
        //update status all == 0
        $films = film::all();

        // $seatOfRoom = seat::where('room_id',1)->update(array('status' => 0));
        // //update status able
        // $seatUnable = ticket::where([['id_film',$id_film],['id_showtime',$id_showtime]])->get('id_seat');
        // foreach ($seatUnable as $item){
        //      $seat = seat::find($item->id_seat);
        //      $seat->status = 1;
        //      $seat->save();
        // }

        $showtimes = showtime::where([['id_film',$films[0]->id],['id_room',1]])->orderBy('start','asc')->get();


        $seatsA = seat::where([['room_id',1],['row','A']])->orderBy('column','asc')->get();
        if(isset($seatsA)) 
            foreach ($seatsA as $sA)
                $seatA[$sA->column] = $sA; 
        $seatsB = seat::where([['room_id',1],['row','B']])->orderBy('column','asc')->get();
        if(isset($seatsB)) 
            foreach ($seatsB as $sB)
                $seatB[$sB->column] = $sB; 
        $seatsC = seat::where([['room_id',1],['row','C']])->orderBy('column','asc')->get();
        if(isset($seatsC)) 
            foreach ($seatsC as $sC)
                $seatC[$sC->column] = $sC; 
        $seatsD = seat::where([['room_id',1],['row','D']])->orderBy('column','asc')->get();
        if(isset($seatsD)) 
            foreach ($seatsD as $sD)
                $seatD[$sD->column] = $sD; 
        $seatsE = seat::where([['room_id',1],['row','E']])->orderBy('column','asc')->get();
        if(isset($seatsE)) 
            foreach ($seatsE as $sE)
                $seatE[$sE->column] = $sE; 
        $seatsF = seat::where([['room_id',1],['row','F']])->orderBy('column','asc')->get();
        if(isset($seatsF)) 
            foreach ($seatsF as $sF)
                $seatF[$sF->column] = $sF; 
        $seatsG = seat::where([['room_id',1],['row','G']])->orderBy('column','asc')->get();
        if(isset($seatsG)) 
            foreach ($seatsG as $sG)
                $seatG[$sG->column] = $sG; 
        $seatsH = seat::where([['room_id',1],['row','H']])->orderBy('column','asc')->get();
        if(isset($seatsH)) 
            foreach ($seatsH as $sH)
                $seatH[$sH->column] = $sH; 
        $seatsI = seat::where([['room_id',1],['row','I']])->orderBy('column','asc')->get();
        if(isset($seatsI)) 
            foreach ($seatsI as $sI)
                $seatI[$sI->column] = $sI; 
        $seatsJ = seat::where([['room_id',1],['row','J']])->orderBy('column','asc')->get();
        if(isset($seatsJ)) 
            foreach ($seatsJ as $sJ)
                $seatJ[$sJ->column] = $sJ;
        // $rows =['A'=>$seatA,'B','C','D','E','F','G','H','I','J'];
            $rows =['A'=>isset($seatA) ? $seatA : '',
                    'B'=>isset($seatB) ? $seatB : '',
                    'C'=>isset($seatC) ? $seatC : '',
                    'D'=>isset($seatD) ? $seatD : '',
                    'E'=>isset($seatE) ? $seatE : '',
                    'F'=>isset($seatF) ? $seatF : '',
                    'G'=>isset($seatG) ? $seatG : '',
                    'H'=>isset($seatH) ? $seatH : '',
                    'I'=>isset($seatI) ? $seatI : '',
                    'J'=>isset($seatJ) ? $seatJ : ''];
        
        return view('admin.seat.index',[
            'rooms'=>$rooms,
            'rows'=>$rows,
            'films'=>$films,
            'showtimes'=>$showtimes
        ]);
    }
    //findRoom Ajax
    public function findRoom(Request $request){

        $id_room = $request->id_room;


         $seatsA = seat::where([['room_id',$id_room],['row','A']])->orderBy('column','asc')->get();
        if(isset($seatsA)) 
            foreach ($seatsA as $sA)
                $seatA[$sA->column] = $sA; 
        $seatsB = seat::where([['room_id',$id_room],['row','B']])->orderBy('column','asc')->get();
        if(isset($seatsB)) 
            foreach ($seatsB as $sB)
                $seatB[$sB->column] = $sB; 
        $seatsC = seat::where([['room_id',$id_room],['row','C']])->orderBy('column','asc')->get();
        if(isset($seatsC)) 
            foreach ($seatsC as $sC)
                $seatC[$sC->column] = $sC; 
        $seatsD = seat::where([['room_id',$id_room],['row','D']])->orderBy('column','asc')->get();
        if(isset($seatsD)) 
            foreach ($seatsD as $sD)
                $seatD[$sD->column] = $sD; 
        $seatsE = seat::where([['room_id',$id_room],['row','E']])->orderBy('column','asc')->get();
        if(isset($seatsE)) 
            foreach ($seatsE as $sE)
                $seatE[$sE->column] = $sE; 
        $seatsF = seat::where([['room_id',$id_room],['row','F']])->orderBy('column','asc')->get();
        if(isset($seatsF)) 
            foreach ($seatsF as $sF)
                $seatF[$sF->column] = $sF; 
        $seatsG = seat::where([['room_id',$id_room],['row','G']])->orderBy('column','asc')->get();
        if(isset($seatsG)) 
            foreach ($seatsG as $sG)
                $seatG[$sG->column] = $sG; 
        $seatsH = seat::where([['room_id',$id_room],['row','H']])->orderBy('column','asc')->get();
        if(isset($seatsH)) 
            foreach ($seatsH as $sH)
                $seatH[$sH->column] = $sH; 
        $seatsI = seat::where([['room_id',$id_room],['row','I']])->orderBy('column','asc')->get();
        if(isset($seatsI)) 
            foreach ($seatsI as $sI)
                $seatI[$sI->column] = $sI; 
        $seatsJ = seat::where([['room_id',$id_room],['row','J']])->orderBy('column','asc')->get();
        if(isset($seatsJ)) 
            foreach ($seatsJ as $sJ)
                $seatJ[$sJ->column] = $sJ;
        // $rows =['A'=>$seatA,'B','C','D','E','F','G','H','I','J'];
            $rows =['A'=>isset($seatA) ? $seatA : '',
                    'B'=>isset($seatB) ? $seatB : '',
                    'C'=>isset($seatC) ? $seatC : '',
                    'D'=>isset($seatD) ? $seatD : '',
                    'E'=>isset($seatE) ? $seatE : '',
                    'F'=>isset($seatF) ? $seatF : '',
                    'G'=>isset($seatG) ? $seatG : '',
                    'H'=>isset($seatH) ? $seatH : '',
                    'I'=>isset($seatI) ? $seatI : '',
                    'J'=>isset($seatJ) ? $seatJ : ''];
        
        return view('admin.seat.findRoom',[
            'rows'=>$rows,
        ]);
    }

    // list
    public function list(Request $request){
        //return $request;  
        $rooms = room::all();
        $seats = seat::where('room_id','=',1)->orderBy('row','asc')->orderBy('column','asc')->get();
        return view('admin.seat.list',['rooms'=>$rooms,'seats'=>$seats]);
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
 			for($i=0; $i<12; $i++){
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
 			
 			return $columns[] = [1,2,3,4,5,6,7,8,9,10,11,12];
 		}
    	//return $request->row;
    }


    ///////////////////////////// load seat from showtime ////////////////////////////////////
    public function loadSeat(Request $request){
        $id_film = $request->id_film;
        $id_room = $request->id_room;
        $id_showtime= $request->id_showtime;

        $seatOfRoom = seat::where('room_id',$id_room)->update(array('status' => 0));
        //update status able
        $seatUnable = ticket::where([['id_film',$id_film],['id_showtime',$id_showtime]])->get('id_seat');
        foreach ($seatUnable as $item){
             $seat = seat::find($item->id_seat);
             $seat->status = 1;
             $seat->save();
        }

        $seatsA = seat::where([['room_id',$id_room],['row','A']])->orderBy('column','asc')->get();
        if(isset($seatsA)) 
            foreach ($seatsA as $sA)
                $seatA[$sA->column] = $sA; 
        $seatsB = seat::where([['room_id',$id_room],['row','B']])->orderBy('column','asc')->get();
        if(isset($seatsB)) 
            foreach ($seatsB as $sB)
                $seatB[$sB->column] = $sB; 
        $seatsC = seat::where([['room_id',$id_room],['row','C']])->orderBy('column','asc')->get();
        if(isset($seatsC)) 
            foreach ($seatsC as $sC)
                $seatC[$sC->column] = $sC; 
        $seatsD = seat::where([['room_id',$id_room],['row','D']])->orderBy('column','asc')->get();
        if(isset($seatsD)) 
            foreach ($seatsD as $sD)
                $seatD[$sD->column] = $sD; 
        $seatsE = seat::where([['room_id',$id_room],['row','E']])->orderBy('column','asc')->get();
        if(isset($seatsE)) 
            foreach ($seatsE as $sE)
                $seatE[$sE->column] = $sE; 
        $seatsF = seat::where([['room_id',$id_room],['row','F']])->orderBy('column','asc')->get();
        if(isset($seatsF)) 
            foreach ($seatsF as $sF)
                $seatF[$sF->column] = $sF; 
        $seatsG = seat::where([['room_id',$id_room],['row','G']])->orderBy('column','asc')->get();
        if(isset($seatsG)) 
            foreach ($seatsG as $sG)
                $seatG[$sG->column] = $sG; 
        $seatsH = seat::where([['room_id',$id_room],['row','H']])->orderBy('column','asc')->get();
        if(isset($seatsH)) 
            foreach ($seatsH as $sH)
                $seatH[$sH->column] = $sH; 
        $seatsI = seat::where([['room_id',$id_room],['row','I']])->orderBy('column','asc')->get();
        if(isset($seatsI)) 
            foreach ($seatsI as $sI)
                $seatI[$sI->column] = $sI; 
        $seatsJ = seat::where([['room_id',$id_room],['row','J']])->orderBy('column','asc')->get();
        if(isset($seatsJ)) 
            foreach ($seatsJ as $sJ)
                $seatJ[$sJ->column] = $sJ;
        // $rows =['A'=>$seatA,'B','C','D','E','F','G','H','I','J'];
            $rows =['A'=>isset($seatA) ? $seatA : '',
                    'B'=>isset($seatB) ? $seatB : '',
                    'C'=>isset($seatC) ? $seatC : '',
                    'D'=>isset($seatD) ? $seatD : '',
                    'E'=>isset($seatE) ? $seatE : '',
                    'F'=>isset($seatF) ? $seatF : '',
                    'G'=>isset($seatG) ? $seatG : '',
                    'H'=>isset($seatH) ? $seatH : '',
                    'I'=>isset($seatI) ? $seatI : '',
                    'J'=>isset($seatJ) ? $seatJ : ''];
        
        return view('admin.seat.load_from_showtime',[
            'rows'=>$rows,
        ]);
    }


    //////////////////////////  load showtime when change film //////////////////////////
    public function loadShowtime(Request $request){
        $id_film = $request->id_film;
        $id_room = $request->id_room;
        
        $showtimes = showtime::where([['id_film',$id_film],['id_room',$id_room]])->orderBy('start','asc')->get();


        $seatsA = seat::where([['room_id',$id_room],['row','A']])->orderBy('column','asc')->get();
        if(isset($seatsA)) 
            foreach ($seatsA as $sA)
                $seatA[$sA->column] = $sA; 
        $seatsB = seat::where([['room_id',$id_room],['row','B']])->orderBy('column','asc')->get();
        if(isset($seatsB)) 
            foreach ($seatsB as $sB)
                $seatB[$sB->column] = $sB; 
        $seatsC = seat::where([['room_id',$id_room],['row','C']])->orderBy('column','asc')->get();
        if(isset($seatsC)) 
            foreach ($seatsC as $sC)
                $seatC[$sC->column] = $sC; 
        $seatsD = seat::where([['room_id',$id_room],['row','D']])->orderBy('column','asc')->get();
        if(isset($seatsD)) 
            foreach ($seatsD as $sD)
                $seatD[$sD->column] = $sD; 
        $seatsE = seat::where([['room_id',$id_room],['row','E']])->orderBy('column','asc')->get();
        if(isset($seatsE)) 
            foreach ($seatsE as $sE)
                $seatE[$sE->column] = $sE; 
        $seatsF = seat::where([['room_id',$id_room],['row','F']])->orderBy('column','asc')->get();
        if(isset($seatsF)) 
            foreach ($seatsF as $sF)
                $seatF[$sF->column] = $sF; 
        $seatsG = seat::where([['room_id',$id_room],['row','G']])->orderBy('column','asc')->get();
        if(isset($seatsG)) 
            foreach ($seatsG as $sG)
                $seatG[$sG->column] = $sG; 
        $seatsH = seat::where([['room_id',$id_room],['row','H']])->orderBy('column','asc')->get();
        if(isset($seatsH)) 
            foreach ($seatsH as $sH)
                $seatH[$sH->column] = $sH; 
        $seatsI = seat::where([['room_id',$id_room],['row','I']])->orderBy('column','asc')->get();
        if(isset($seatsI)) 
            foreach ($seatsI as $sI)
                $seatI[$sI->column] = $sI; 
        $seatsJ = seat::where([['room_id',$id_room],['row','J']])->orderBy('column','asc')->get();
        if(isset($seatsJ)) 
            foreach ($seatsJ as $sJ)
                $seatJ[$sJ->column] = $sJ;
        // $rows =['A'=>$seatA,'B','C','D','E','F','G','H','I','J'];
            $rows =['A'=>isset($seatA) ? $seatA : '',
                    'B'=>isset($seatB) ? $seatB : '',
                    'C'=>isset($seatC) ? $seatC : '',
                    'D'=>isset($seatD) ? $seatD : '',
                    'E'=>isset($seatE) ? $seatE : '',
                    'F'=>isset($seatF) ? $seatF : '',
                    'G'=>isset($seatG) ? $seatG : '',
                    'H'=>isset($seatH) ? $seatH : '',
                    'I'=>isset($seatI) ? $seatI : '',
                    'J'=>isset($seatJ) ? $seatJ : ''];
        
        return view('admin.seat.load_showtime_film',[
            'rows'=>$rows,
            'showtimes'=>$showtimes
        ]);
    }
}
