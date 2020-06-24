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
    	$thu = Carbon::create(2020,6,14);
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

    	
    	//$rooms = room::all();
    
	    	$showtimes = showtime::where('date','=',$date)->get();
            if (count($showtimes)>0){
                foreach ($showtimes as $showtime){
                    $runtime = film::find($film_id)->runtime;
                    
                    $hourAdd = floor($runtime / 60);
                    $minuteAdd = $runtime % 60;
                 //$minute = 70;
                    if ($minuteAdd >= 60){
                        $hourAdd = $hourAdd + 1;
                        $minuteAdd = $minuteAdd % 60;
                    }
                    $startHour = Carbon::create($timeStart)->hour;
                    $startMinute = Carbon::create($timeStart)->minute;
                    if (($startMinute + $minuteAdd)>=60){
                        $hourAdd = $hourAdd + 1;
                        $minuteAdd = 60 - ($startMinute + $minuteAdd);
                    }
                    
                    $endHour = $startHour + $hourAdd;
                    $endMinute = $startMinute + $minuteAdd;
                    if ($endHour<10){
                        $endHour = '0'.$endHour;
                    }
                    if ($endMinute<10){
                        $endMinute = '0'.$endMinute;
                    }
                    $end = $endHour.':'.$endMinute;
                    
                    
                    $showStart =  Carbon::create($showtime->start)->hour;
                    $showEnd =  Carbon::create($showtime->end)->hour;
                    
                    while ($showStart <= $showEnd){
                        $hourNotAdd[] = $showStart;
                        $showStart++;
                    }
                    
                    if (in_array($endHour,$hourNotAdd) || in_array($startHour, $hourNotAdd))
                     // k chon room
                       $notRoom[] = $showtime->id_room;
                     //return $room->id;
               }    
            } else {
                $room = room::all();
                foreach($room as $r){
                    $rooms[] = $r->id;
                }
                return $rooms;
            }
            
            if (isset($notRoom)){
                $room = room::all();
                foreach($room as $r){
                    $rooms[] = $r->id;
                }
                $diff = array_diff($rooms,$notRoom);   
                foreach ($diff as $key => $value) {
                    $rom[] = $value;
                }
                return $rom;
                
            } else {
                $room = room::all();
                foreach($room as $r){
                    $rooms[] = $r->id;
                }
                return $rooms;
            }
            
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




















