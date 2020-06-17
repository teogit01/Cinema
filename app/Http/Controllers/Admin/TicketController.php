<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\film;
use App\Models\ticket;
use App\Models\user;
class TicketController extends Controller
{
    public function index(){
    	$films = film::where('status',1)->get();
    	$tickets = ticket::where('date',date('Y-m-d'))->get();
    	return view('admin.ticket.index',[
    		'films'=>$films,
    		'tickets'=>$tickets,
    		]);
    }
    // ajax load ticket from film

    public function find(Request $request){
    	$name = $request->name;
    	$id_film = $request->id_film;
    	$date = $request->date;
    	
    	if (isset($name)){
    		$id_user = user::where('name',$name)->get('id');
    		if (count($id_user)>0){
    		
    			if ($id_film == 0){
    				$tickets = ticket::where('id_user',$id_user[0]->id)->get();	
    				
    			} else {
    				$tickets = ticket::where([['id_film',$id_film],['id_user',$id_user[0]->id]])->get();
    			}
    		} else {
    			return 'Không tìm thấy';
    		}
    	} else {
    		if ($id_film == 0){
    			$tickets = ticket::where('date',$date)->get();	
    		} else {
    			$tickets = ticket::where([['id_film',$id_film],['date',$date]])->get();
    		}
    	}
    	return view('admin.ticket.load_ticket',[
    		'tickets'=>$tickets,
    		]);
    }

}
