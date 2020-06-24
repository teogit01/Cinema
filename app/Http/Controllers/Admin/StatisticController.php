<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\film;
use App\Models\ticket;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public function index(){
    	$films = film::all();
        $total = 0;
        $ticket = 0;
        $prices = ticket::all();
        foreach ($prices as $price) {
            $total = $total + $price->price;   
        }        
        $ticket = count($prices);
    	return view('admin.statistic.index',['films'=>$films,'total'=>$total,'ticket'=>$ticket]);
    }
    public function find(Request $request){
    	$total = 0;
    	$ticket = 0;
    	$id_film = $request->id_film;
    	$month= $request->month;
    	$year = $request->year;

    	if($id_film == 0 && $month == 0){    		 
    		$dates = ticket::all('date','price');
    		foreach ($dates as $date) {	
    			if ( ($year == Carbon::create($date['date'])->year) ) {
    				$total = $total + $date['price'];
    				$ticket++;
    			}
    		}
    	} elseif($month == 0 && $id_film != 0) {
    		$dates = ticket::all(['date','price','id_film']);
    		foreach ($dates as $item) {	
    			if ( ($year == Carbon::create($item['date'])->year) && ($id_film==$item['id_film']) ) {
    				$total = $total + $item['price'];
    				$ticket++;
    				//}
    			}
    		}
    		
    	} elseif($month != 0 && $id_film == 0){
    		$dates = ticket::all('date','price');
    		foreach ($dates as $date) {	
    			if ( ($month == Carbon::create($date['date'])->month) && ($year == Carbon::create($date['date'])->year) ) {
    				
    					$total = $total + $date['price'];
    					$ticket++;
    				
    			}
    		}
    	}else {
    		$dates = ticket::all('date','price','id_film');
    		foreach ($dates as $date) {	
    			if ( ($month == Carbon::create($date['date'])->month) && ($year == Carbon::create($date['date'])->year) && ($id_film == $date['id_film']) ) {
    				
    				$total = $total + $date['price'];
    				$ticket++;
    				
    			}
    		}
    	}
    	
    	return view('admin.statistic.load-data',['total'=>$total,'ticket'=>$ticket]);
    }
}
