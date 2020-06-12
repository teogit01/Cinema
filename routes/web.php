<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::prefix('admin')->group(function(){
	route::prefix('film')->group(function(){
		route::get('/','Admin\FilmController@index');
		route::get('/list','Admin\FilmController@list')->name('admin.film.list');
		//add film
		route::get('/add','Admin\FilmController@getAdd')->name('admin.film.getadd');
		route::post('/add','Admin\FilmController@postAdd')->name('admin.film.add');

		//detail
		route::get('/detail/{id}','Admin\FilmController@detail')->name('admin.film.detail');
		//edit
		route::post('/edit/{id}','Admin\FilmController@edit')->name('admin.film.edit');
		// delete
		route::get('/delete/{id}','Admin\FilmController@delete')->name('admin.film.delete');

	});
	////////////////////// Grene //////////////////////

	route::prefix('genre')->group(function(){
		route::get('/','Admin\GenreController@index')->name('admin.genre.index');

		route::post('/add','Admin\GenreController@postAdd')->name('admin.genre.add');
		route::get('/delete/{id}','Admin\GenreController@postDetele')->name('admin.genre.delete');
		route::get('/edit/{id}/{value}','Admin\GenreController@postEdit')->name('admin.genre.edit');
	});
	////////////////////// Room //////////////////////
	route::prefix('room')->group(function(){
		route::get('/','Admin\RoomController@index')->name('admin.room');
		route::post('/add','Admin\RoomController@postAdd')->name('admin.room.add');
		route::get('/delete/{id}','Admin\RoomController@postDetele')->name('admin.room.delete');
		route::get('/edit/{id}/{value}','Admin\RoomController@postEdit')->name('admin.room.edit');
	});
	////////////////////// COUNTRY //////////////////////
	route::prefix('country')->group(function(){
		route::get('/','Admin\CountryController@index')->name('admin.country');

		route::post('/add','Admin\CountryController@postAdd')->name('admin.country.add');
		route::get('/delete/{id}','Admin\CountryController@postDetele')->name('admin.country.delete');
		route::get('/edit/{id}/{value}','Admin\CountryController@postEdit')->name('admin.country.edit');
		
	});
	////////////////////// SEAT //////////////////////
	route::prefix('seat')->group(function(){
		route::get('/','Admin\SeatController@index')->name('admin.seat');
		route::post('/','Admin\SeatController@postIndex')->name('admin.seat');
		route::post('/add','Admin\SeatController@add')->name('admin.seat.add');

		//select seat trong
		route::post('/select','Admin\SeatController@select')->name('admin.seat.select');
	});

	////////////////////// ShowTime //////////////////////
	route::prefix('showtime')->group(function(){
		route::get('/','Admin\ShowtimeController@index')->name('admin.showtime');
		//add show
		route::post('/add','Admin\ShowtimeController@postAdd')->name('admin.showtime.add');
		// set time end and select room
		route::post('/settime/','Admin\ShowtimeController@setTime')->name('admin.film.settime');
		// showtime of day (thứ trong tuần)	
		route::post('/ofday/','Admin\ShowtimeController@showtimeOfDay')->name('admin.film.ofday');	
		// showtime of date (Ngày tháng đc chọn)
		route::post('/date/','Admin\ShowtimeController@showtimeOfDate')->name('admin.film.ofdate');	

		//delete
		route::post('/delete/','Admin\ShowtimeController@delete')->name('admin.film.delete');
		// find showtime of room	
		route::post('/find/','Admin\ShowtimeController@findOfRoom')->name('admin.film.find');	
	});
	////////////////////// TICKET //////////////////////
	route::prefix('ticket')->group(function(){
		route::get('/','Admin\TicketController@index')->name('admin.ticket');
	});
ok
});
