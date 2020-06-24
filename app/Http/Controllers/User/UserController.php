<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\film;
use App\Models\film_genre;
use App\Models\film_country;
use App\Models\showtime;
use App\Models\seat;
use App\Models\rate;
use App\Models\ticket;
use App\Models\user;

use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){

        $filmAll = film::all();
        $showtimes = showtime::all();
    	$films = film::where([['status',1],['openday','<',date('Y-m-d')]])->get();

    	return view('user.home',['films'=>$films,'filmAll'=>$filmAll,'showtimes'=>$showtimes]);
    }

    public function commingsoon(Request $request){

        $type = $request->type;
        if ($type == 'showing'){
            $films = film::where([['status',1],['openday','<',date('Y-m-d')]])->get();
        } else {
            $films = film::where([['status',1],['openday','>=',date('Y-m-d')]])->get();
        }

        return view('user.commingsoon',['films'=>$films]);
    }


    public function detail(Request $request){
    	$id_film = $request->id;
    	$film = film::find($id_film);
    	$rates = rate::where('film_id',$id_film)->get();

    	$film_genre = film_genre::where('film_id',$id_film)->get();
    	$film_country = film_country::where('film_id',$id_film)->get();
		//get date
    	$dates = json_decode(Storage::get('public/date.txt'));

    	//return $dates;

    	//ShowTime Of Day

    	$showtimes = showtime::where('date','=',date('Y-m-d'))->get();
    	$showtimeM = showtime::where([['date','=',date('Y-m-d')],['start','<=','12:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	$showtimeA = showtime::where([['date','=',date('Y-m-d')],['start','>','12:00'],['start','<','17:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	$showtimeE = showtime::where([['date','=',date('Y-m-d')],['start','>=','17:00'],['id_film',$id_film]])->orderBy('start','asc')->get();

    	return view('user.detail',['film'=>$film,
    		'film_genre'=>$film_genre,
    		'film_country'=>$film_country,
    		'dates'=>$dates,
    		'showtimeM'=>$showtimeM,
    		'showtimeA'=>$showtimeA,
    		'showtimeE'=>$showtimeE,
    		'rate'=>count($rates),
    		'rates'=>$rates
    	]);
    }

    // findShowtime
    public function findShowtime(Request $request){

    	$date = $request->day;
    	$id_film = $request->id_film;

    	$showtimeM = showtime::where([['date','=',$date],['start','<=','12:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	$showtimeA = showtime::where([['date','=',$date],['start','>','12:00'],['start','<','17:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	$showtimeE = showtime::where([['date','=',$date],['start','>=','17:00'],['id_film',$id_film]])->orderBy('start','asc')->get();

    	return view('user.updateShowtime',[
    		'showtimeM'=>$showtimeM,
    		'showtimeA'=>$showtimeA,
    		'showtimeE'=>$showtimeE
    	]);
    }

  	// rate
    public function rate(Request $request){
    
    	if(Auth::check()){
    		$check = rate::where([['user_id',Auth::id()],['film_id',$request->id_film]])->get();	
    		if (count($check)==1){
    			return back();
    		} else {
    			$rate = new rate();
    			$rate->film_id = $request->id_film;
    			$rate->star = $request->star;
    			$rate->comment = $request->comment;
    			$rate->user_id = Auth::id();
    			$rate->save();
                
                $rates = rate::where('film_id',$request->id_film)->get();
                
                $film = film::find($request->id_film);

                $film->star = number_format((float)($film->star + $request->star )/count($rates),1,'.','.');
                
                $film->save();
    			return back()->with('danhgia','danhgia');
    		}
    	} else {
    		return redirect('login');
    	}
    	
    	return  $check;
    	
    }

    // checkout
    public function checkout(Request $request){
    	$id_user = $request->id_user;
    	$id_film = $request->id_film;
    	$id_showtime = $request->id_showtime;


    	$film = film::find($id_film);
    	$showtime = showtime::find($id_showtime);
        //update status all == 0
        $seatOfRoom = seat::where('room_id',$showtime->room->id)->update(array('status' => 0));
        //update status able
        $seatUnable = ticket::where([['id_film',$id_film],['id_showtime',$id_showtime]])->get('id_seat');
        foreach ($seatUnable as $item){
             $seat = seat::find($item->id_seat);
             $seat->status = 1;
             $seat->save();
        }

        $id_room = $showtime->room->id;

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

    	return view('user.checkout',[
    		'film'=>$film,
    		'showtime'=>$showtime,
            'rows'=>$rows
    	]);
    }
    //post checkout
    public function postCheckout(Request $request){
        //return $request;
        //return $request->id_showtime;
        $showtime = showtime::find($request->id_showtime);
        //return $showtime->film->price;
        $str = json_decode(json_encode($request->seat_value));
        $seats = explode(' ',$str);
        
        foreach ($seats as $seat){
            $s = seat::find($seat);

            $ticket = new ticket();
            
            if ($s->row == 'A'|| $s->row == 'B'|| $s->row == 'C'|| $s->row == 'D'){
                $ticket->price = $showtime->film->price - 10;
            } elseif ($s->row == 'E'|| $s->row == 'F'|| $s->row == 'G'|| $s->row == 'H'){
                $ticket->price = $showtime->film->price;
            } else {
                $ticket->price = $showtime->film->price + 20;
            }

            $ticket->code = Str::random(5);
            $ticket->date = $showtime->date;
            //$ticket->price = $showtime->film->price;
            $ticket->id_film = $showtime->film->id;
            $ticket->id_user = $request->id_user;
            $ticket->id_showtime = $request->id_showtime;
            $ticket->id_seat = $seat;
            $ticket->save();
        }
        return redirect('user');
    }

    // profile

    public function profile(Request $request){
        $user = user::find($request->id);
        return view('user.profile',['user'=>$user]);
    }
    //edit
    public function editProfile(Request $request){
        
        if ($request->hasFile('avatar')){
            $path = public_path('img/avatar');
            $name = Str::random(5).'_'.$request->avatar->getClientOriginalName();
            $request->avatar->move($path,$name);
        }

        $user = user::find(Auth::id());
        
        $user->name = $request->name ? $request->name : $user->name;
        $user->birthday = $request->birthday ? $request->birthday : $user->birthday;
        $user->phone = $request->phone ? $request->phone : $user->phone;
        $user->email = $request->email ? $request->email : $user->email;
        $user->address = $request->address ? $request->address : $user->address;
        $user->avatar = isset($name) ? $name : $user->avatar;
        $user->save();
        
        return back()->with('success','Cập nhật thành công!');  
        
    }

    public function find(Request $request){

        $key = $request->key;
        
        //$filmAll = film::all();
        //$showtimes = showtime::all();
        $films = film::where([['status',1],['openday','<',date('Y-m-d')],['name','like','%'.$key.'%']])->get();

        return view('user.find',['films'=>$films]);
        //$cars = CarDetail::where('name','like','%'.$request->key.'%')->get();
    }

}
