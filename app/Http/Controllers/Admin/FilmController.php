<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\genre;
use App\Models\country;
use App\Models\film;
use App\Models\film_country;
use App\Models\film_genre;

class FilmController extends Controller
{
    public function __construct(){
        parent::__construct();
        //$this->middleware('auth');
    }
    public function index(){
    	return view('admin.film.index');
    }
    public function list(){
        $films = film::paginate(5);
    	return view('admin.film.list',['films'=>$films]);
    }
    public function getAdd(){
        $genres = genre::all();
        $countrys = country::all();

    	return view('admin.film.add',['genres'=>$genres,'countrys'=>$countrys]);
    }

    // function post add
    public function postAdd(Request $request){

        // Add film 
        if ($request->has('image')){
            $path = public_path('img/poster');
            $name = Str::random(5).'_'.$request->image->getClientOriginalName();            
            $request->image->move($path,$name);
        }             
        
        $film = new film();
        $film->code = str::random(5);
        $film->name = $request->name;
        $film->runtime = $request->runtime;
        $film->director = $request->director;
        $film->cast = $request->cast;
        $film->trailer = $request->trailer;
        $film->openday = $request->openday;
        $film->price = $request->price;
        $film->poster = isset($name) ? $name : ''; 
        $film->status = 0;
        $film->save();
        
        //return $film->id;

        // Add genre
        if (isset($request->genre)){
            foreach ($request->genre as $item){
                $fgenre = new film_genre();
                $fgenre->film_id = $film->id;
                $fgenre->genre_id = $item;
                $fgenre->save();
            }
        }
        if (isset($request->country)){
            foreach ($request->country as $item){
                $fcountry = new film_country();
                $fcountry->film_id = $film->id;
                $fcountry->country_id = $item;
                $fcountry->save();
            }
        }

        return back()->with('success','Thêm Thành Công!');
    }
    // Detail
    public function detail(Request $request){
        $film = film::find($request->id);
        return view('admin.film.detail',['film'=>$film]);
    }
    // Edit

    public function edit(Request $request){
        $film = film::find($request->id);

        if ($request->has('image')){
            $path = public_path('img/poster');
            $name = Str::random(5).'_'.$request->image->getClientOriginalName();            
            $request->image->move($path,$name);
            $film->poster = $name;
        }

        $film->name = isset($request->name) ? $request->name : $film->name;
        $film->director = isset($request->director) ? $request->director : $film->director;
        $film->cast = isset($request->cast) ? $request->cast : $film->cast;
        $film->runtime = isset($request->runtime) ? $request->runtime : $film->runtime;
        $film->openday = isset($request->openday) ? $request->openday : $film->openday;
        $film->trailer = isset($request->trailer) ? $request->trailer : $film->trailer;
        $film->price = isset($request->price) ? $request->price : $film->price;
        $film->status = isset($request->status) ? $request->status : $film->status;
        $film->save();

        return back()->with('success','Cập Nhật Thành Công!');
    }

    // delete

    public function delete(Request $request){
        $film = film::find($request->id);
        $film->delete();
        return back()->with('success','Xoá Thành Công!');
    }
}
