<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\film;
use App\Models\room;
use App\Models\showtime;

use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ShowtimeController extends Controller
{
    public function index(){
    	//$films = film::all();
        $films = film::where('status',1)->get();
    	$rooms = room::all();
    	//$t = date('Y-d-m');
    	//return $t;
    	$showtimes = showtime::where('date','=',date('Y-m-d'))->get();
    	$showtimeM = showtime::where([['date','=',date('Y-m-d')],['start','<=','12:00'],['id_film',$films[0]->id]])->orderBy('start','asc')->get();
    	$showtimeA = showtime::where([['date','=',date('Y-m-d')],['start','>','12:00'],['start','<','17:00'],['id_film',$films[0]->id]])->orderBy('start','asc')->get();
    	$showtimeE = showtime::where([['date','=',date('Y-m-d')],['start','>=','17:00'],['id_film',$films[0]->id]])->orderBy('start','asc')->get();

    	//return $showtimes;
    	//$thu = Carbon::now();
    	$thu = Carbon::create(2020,6,7);
    	if ($thu->dayOfWeek == 0){
    		$d = $thu->day;
    		$m = $thu->month;
    		if ($thu->month < 10){
    			$m = '0'.$thu->month;
    		}
    		if ($thu->day < 10){
    			$d = '0'.$thu->day;
    		}
    		$dates[] = '2020-'.$m.'-'.$d;
    		for($i=0; $i<6; $i++){
    			//$days[] = $thu->tomorrow()->day;
    			$day = $thu->addDay(1)->day;
    			if ($day == 1){
    				$month = $thu->addMonth(1)->month;
    			} else {
    				$month = $thu->month;
    			}
    			if ($day < 10){
    				$day = '0'.$day;
    			}
    			if ($month<10){
    				$month = '0'.$month;
    			}
    			$dates[] = '2020-'.$month.'-'.$day;
    		}
    		Storage::put('public/date.txt','');
    		Storage::put('public/date.txt',json_encode($dates));
    	}
    	//return $dates;
    	//return $thus;
    	$dates = json_decode(Storage::get('public/date.txt'));
    	return view('admin.showtime.index',['films'=>$films,'rooms'=>$rooms,'showtimes'=>$showtimes,'dates'=>$dates,'showtimeM'=>$showtimeM,'showtimeA'=>$showtimeA,'showtimeE'=>$showtimeE]);
    }

    // Function add show time
    public function postAdd(Request $request){
  
    	$runtime = film::find($request->film)->runtime;

    	$hour = floor($runtime / 60);
    	$minute = $runtime % 60;
    	//$minute = 70;
    	if ($minute >= 60){
    		$hour = $hour + 1;
    		$minute = $minute % 60;
    	}
    	
    	$start = Carbon::create($request->start);
    	$startHour = $start->hour;
    	$startMinute = $start->minute;
    	if (($startMinute + $minute)>=60){
    		$hour = $hour + 1;
    		$minute = $minute % 60;
    	} 

    	$endHour = $start->addHour($hour)->hour;
    	$endMinute = $start->addMinute($minute)->minute;
    	if ($endHour < 10){
    		$endHour = '0'.$endHour;
    	}
    	if ($endMinute < 10){
    		$endMinute = '0'.$endMinute;
    	}
    	$end = $endHour.':'.$endMinute;
    	$showtime = new showtime();

    	$showtime->code = str::random(5);
    	$showtime->date = $request->date;
    	$showtime->start = $request->start;
    	$showtime->end = $end;
    	$showtime->id_film = $request->film;
    	$showtime->id_room = $request->room;
    	$showtime->save();
    	
    	return back()->with('success','Đã Thêm Xuất Chiếu');
    }
    // Function set time

    public function setTime(Request $request){

    	$film_id = $request->film_id;
    	$date = $request->date;
    	$timeStart = $request->start;
    	
    	$rooms = room::all();
    	foreach ($rooms as $room){

	    	$showtimes = showtime::where([['id_film','=',$film_id],['date','=',$date],['id_room','=',$room->id]])->get();
	    	if (isset($howtimes)){
		    	// find time not add
		    	foreach ($showtimes as $showtime) {
		    		//if ($showtime->start)
		    		$start =  Carbon::create($showtime->start)->hour;
		    		$end =  Carbon::create($showtime->end)->hour;
		    		while ($start <= $end){
		    			$hourNotAdd[] = $start;
		    			$start++;
		    		}
		    	}
		    	// time start end not add

		    	$runtime = film::find($film_id)->runtime;

		    	$hour = floor($runtime / 60);
		    	$minute = $runtime % 60;
		    	//$minute = 70;
		    	if ($minute >= 60){
		    		$hour = $hour + 1;
		    		$minute = $minute % 60;
		    	}
		    	
		    	$timeStart = Carbon::create($timeStart);
		    	
		    	$startHour = $timeStart->hour;
		    	$startMinute = $timeStart->minute;
		    	if (($startMinute + $minute)>=60){
		    		$hour = $hour + 1;
		    		$minute = $minute % 60;
		    	} 

		    	$endHour = $timeStart->addHour($hour)->hour;
		    	$endMinute = $timeStart->addMinute($minute)->minute;
		    	if ($hour < 10){
		    		$hour = '0'.$hour;
		    	}
		    	if ($minute < 10){
		    		$minute = '0'.$minute;
		    	}
		    	$timeEnd = $endHour.':'.$endMinute;
		    	
		    	if (!in_array($endHour,$hourNotAdd) && !in_array($startHour, $hourNotAdd)){
		    		// dc them
		    		$roomIds[] = $room->id;
		    		//return $room->id;
		    	}
	    	} else {
	    		$roomIds[] = $room->id;
	    	}
	    }// end foreach rooms

    	return $roomIds;
    	// return $endHour;	
    	
    	// return $timeEnd;
    	// return $timeStart;
    	// return $hourNotAdd;
    }
   
    // Function showtime of day (Thứ trong tuần)
    public function showtimeOfDay(Request $request){
    	
    	$date = $request->date;
        $id_film = $request->id_film;
    	//return $date;
    	//$showtimes = showtime::where('date','=',$date)->get();
    	//$showtimes = showtime::where('date','=',$date)->get();
    	//$showtimes = showtime::where('date','=',$date)->get();
    	$showtimes = showtime::where('date','=',$date)->get();
    	$showtimeM = showtime::where([['date','=',$date],['start','<=','12:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	$showtimeA = showtime::where([['date','=',$date],['start','>','12:00'],['start','<','17:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	$showtimeE = showtime::where([['date','=',$date],['start','>=','17:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	//$dates = json_decode(Storage::get('public/date.txt'));
    	//	return $date;
    	//return $showtimes;
    	return view('admin.showtime.updateShowtime',['showtimes'=>$showtimes,'showtimeM'=>$showtimeM,'showtimeA'=>$showtimeA,'showtimeE'=>$showtimeE]);
    }

    // Function showtime of day (Ngày Tháng đc chọn)
    public function showtimeOfDate(Request $request){
     	$date = $request->date;
        $id_film = $request->id_film;
    	//return $date;
    	//$showtimes = showtime::where('date','=',$date)->get();
    	//$showtimes = showtime::where('date','=',$date)->get();
    	
    	//$showtimes = showtime::where('date','=',$date)->get();

    	$showtimes = showtime::where('date','=',$date)->get();
    	$showtimeM = showtime::where([['date','=',$date],['start','<=','12:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	$showtimeA = showtime::where([['date','=',$date],['start','>','12:00'],['start','<','17:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	$showtimeE = showtime::where([['date','=',$date],['start','>=','17:00'],['id_film',$id_film]])->orderBy('start','asc')->get();
    	//$dates = json_decode(Storage::get('public/date.txt'));
    	//	return $date;
    	//return $showtimes;
    	return view('admin.showtime.updateShowtime',['showtimes'=>$showtimes,'showtimeM'=>$showtimeM,'showtimeA'=>$showtimeA,'showtimeE'=>$showtimeE]);
    }

    // Function delete showtime
    public function delete(Request $request){
    	$date = $request->date;
    	//return $date;
    	$showtime = showtime::find($request->id); 	
    	
    	$showtime->delete();

    	$showtimeM = showtime::where([['date','=',$date],['start','<=','12:00']])->orderBy('start','asc')->get();
    	$showtimeA = showtime::where([['date','=',$date],['start','>','12:00'],['start','<','17:00']])->orderBy('start','asc')->get();
    	$showtimeE = showtime::where([['date','=',$date],['start','>=','17:00']])->orderBy('start','asc')->get();
    	return view('admin.showtime.updateShowtime',['showtimeM'=>$showtimeM,'showtimeA'=>$showtimeA,'showtimeE'=>$showtimeE]);

    }

    // Function find of room
    public function findOfFilm(Request $request){
    	$date = $request->date;
    	$id_film = $request->id_film;

    	$showtimeM = showtime::where([['date','=',$date],['id_film','=',$id_film],['start','<=','12:00']])->orderBy('start','asc')->get();
    	$showtimeA = showtime::where([['date','=',$date],['id_film','=',$id_film],['start','>','12:00'],['start','<','17:00']])->orderBy('start','asc')->get();
    	$showtimeE = showtime::where([['date','=',$date],['id_film','=',$id_film],['start','>=','17:00']])->orderBy('start','asc')->get();
    	return view('admin.showtime.updateShowtime',['showtimeM'=>$showtimeM,'showtimeA'=>$showtimeA,'showtimeE'=>$showtimeE]);
    }

    // load showtime for film
    public function loadFilm(Request $request){
        $date = $request->date;
        $id_film = $request->id_film;

        $showtimeM = showtime::where([['date','=',$date],['id_film','=',$id_film],['start','<=','12:00']])->orderBy('start','asc')->get();
        $showtimeA = showtime::where([['date','=',$date],['id_film','=',$id_film],['start','>','12:00'],['start','<','17:00']])->orderBy('start','asc')->get();
        $showtimeE = showtime::where([['date','=',$date],['id_film','=',$id_film],['start','>=','17:00']])->orderBy('start','asc')->get();
        return view('admin.showtime.updateShowtime',['showtimeM'=>$showtimeM,'showtimeA'=>$showtimeA,'showtimeE'=>$showtimeE]);
    }
}




















