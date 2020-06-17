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
		//giao dien ghe khi thay doi room
		route::post('/findroom','Admin\SeatController@findRoom')->name('admin.seat.findroom');
		
		route::post('/','Admin\SeatController@postIndex')->name('admin.seat');

		route::get('/list','Admin\SeatController@list')->name('admin.seat.list');
		
		route::post('/add','Admin\SeatController@add')->name('admin.seat.add');

		//select seat trong
		route::post('/select','Admin\SeatController@select')->name('admin.seat.select');

		//load seat from show time
		route::post('/showtime','Admin\SeatController@loadSeat')->name('admin.seat.showtime');		
		//load showtime when change film
		route::post('/showtime/film','Admin\SeatController@loadShowtime')->name('admin.seat.film');		
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
		route::post('/find/','Admin\ShowtimeController@findOfFilm')->name('admin.film.find');	
		// load show time (thay doi khi thay doi select film)
		route::post('/loadfilm/','Admin\ShowtimeController@loadFilm')->name('admin.film.loadfilm');	
	});
	////////////////////// TICKET //////////////////////
	route::prefix('ticket')->group(function(){
		route::get('/','Admin\TicketController@index')->name('admin.ticket');

		// ajax load ticket form film
		route::post('/find','Admin\TicketController@find')->name('admin.ticket.find');
		
	});
	////////////////////// Account //////////////////////
	route::prefix('account')->group(function(){
		route::get('/','Admin\AccountController@index')->name('admin.account');
		route::post('/find','Admin\AccountController@find')->name('admin.account.find');
		
	});
});

///////////////////// User /////////////////////
route::prefix('user')->group(function(){
	route::get('/','User\UserController@home')->name('user.home');
	route::get('/detail/{id}','User\UserController@detail')->name('user.detail');

	//find show time of day
	route::post('/showtime/find','User\UserController@findShowtime')->name('user.showtime.find');	
	//post danh gia
	route::post('/rate/','User\UserController@rate')->name('user.rate');	

	// thanh toan
	route::get('/checkout/{id_user}/{id_film}/{id_showtime}','User\UserController@checkout')->name('user.checkout');

	route::post('/checkout/{id_user}/{id_film}/{id_showtime}','User\UserController@postCheckout')->name('user.checkout.post');

	///// frofile /////
	route::get('/profile/{id}','User\UserController@profile')->name('user.profile');
	route::post('/profile/edit','User\UserController@editProfile')->name('user.profile.edit');

});

route::get('/login','LoginController@login')->name('login');
route::post('/login','LoginController@postLogin')->name('login.post');
route::get('/register','LoginController@register')->name('register');
route::post('/register','LoginController@postRegister')->name('register.post');
route::get('/logout','LoginController@logout')->name('logout');
