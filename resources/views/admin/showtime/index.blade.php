@extends('admin.layouts.index')
@section('content')
<style type="text/css">
	.main-head { width: 100%; display: flex }
	.main-body { width: 100%;  }
	#today { border: none; --background-color: red;font-weight: bold;}
	#today:focus { outline: none; font-weight: bold; }
	h5 { cursor: pointer; --background-color: blue; padding-top: 15px }
	form { width: 100% }
	.showtime { border: 1px solid #ddd; width: 11%;margin-left: 1%; background-color: #eee; border-radius: 3px;position: relative;}
	.showtime:hover { box-shadow: 1px 1px 10px #aaa; cursor: pointer; }
	.showtime-content {--position: absolute;}
	.showtime-del { position: absolute;z-index: 1;right: 0;top:-18px }
	.img { width: 15px; }
</style>
<br>
	<div style="display: flex; width: 100%;align-items: center;">
		<div style="margin-left: 3%;font-size: 20px;display: flex;width:30%"><b>Quản lý Xuất Chiếu</b></div>
			<div style="display: flex;justify-content: flex-end;width: 50%;align-items: center;">
				<label for='today' style="width: 15%"><h5>Ngày:</h5></label>
				<input id='today' type="date" name="" value="{{date('Y-m-d')}}" class="form-contro" style="width: 30%">
			</div>
		@if($message = Session::get('success'))
        	<div class="alert alert-success" role="alert" id='showMessage'
            	style="position: fixed;width: 50%;padding: 7px; right: 0px;top:10%;">
            	<span>{{$message}}</span>
        	</div>
    	@endif

	</div>	
	<hr>
	<meta name="csrf-token" content="{{ csrf_token() }}">
		
	<div class="content">
		<div class="main-content">
			<form method="post" action="{{route('admin.showtime.add')}}">
				@csrf
			<div class="main-head">
				<div style="width: 20%;">
					<select class="form-control film" name="film">
						<option>Chọn Phim</option>
						@foreach($films as $film)
							<option value="{{$film->id}}">{{$film->name}}</option>
						@endforeach
					</select>
				</div>
				<div style="width: 20%;">
					<input type="date" id="date" name="date" class="form-control date" value="{{date('Y-m-d')}}">
				</div>
				<div style="width: 20%;">
					<input type="time" id='start' name="start" class="form-control start" value="{{date('H:i')}}">
				</div>

				<div style="width: 20%;">
					<select class="form-control rooms" name="room">
						<option>Chọn Phòng</option>
						@foreach($rooms as $room)
							<option value="{{$room->id}}">{{$room->name}}</option>
						@endforeach
					</select>
				</div>
				<div style="width: 20%;margin-left:10px;">
					<button class="btn btn-info" style="width: 90%">Thêm</button>
				</div>
			</div>
			<form>
			<br>
			<br>

			<div class="main-body">
				<ul class="nav nav-tabs" id="myTab" role="">
					@for($i=0; $i<7; $i++)
					<li class="nav-item">
						<a class="nav-link {{$i}}" id="{{$dates[$i]}}" data-toggle="tab" href="" role="" aria-controls="" aria-selected="" onclick="showtime(id)">
							@switch($i)
								@case(0)
									Chủ Nhật
									@break
								@case(1)
									Thứ Hai
									@break
								@case(2)
									Thứ Ba
									@break
								@case(3)
									Thứ Tư
									@break
								@case(4)
									Thứ Năm
									@break
								@case(5)
									Thứ Sáu
									@break
								@default
									Thứ Bảy
							@endswitch
						</a>
					</li>
					@endfor
					<div style="width: 25%;text-align: right;margin-left: 60px;">
						<select name="" class="form-control findFilm">
							<!-- <option>Tìm Theo Phòng</option> -->
							@foreach($films as $film)
								<option value="{{$film->id}}">{{$film->name}}</option>
							@endforeach
						</select>
					</div>
				</ul>
				<!-- <div class="tab-content load-showtime" id="myTabContent" style="margin-top: 20px;">
					<div class="tab-pane fade show 4" role="tabpanel" aria-labelledby="home-tab"> -->
						<div class="load-showtime" style="padding: 10px;">
							<div style="width: 100%;display: flex; flex-direction: column;">
								<div style="width: 100%;"><b>Buổi Sáng</b></div>
								<br>
								<div style="width: 100%; display: flex;--justify-content: space-around;justify-content:flex-start;">
									@if (isset($showtimeM))
									@foreach($showtimeM as $show)
										<div  class="showtime">
											<div class="showtime-content">
												{{$show->start}} - {{$show->end}}
											</div>
											<div class="showtime-del" onclick="del({{$show->id}})">
												<img class='img' src="{{asset('icon/eraser.png')}}">
											</div>
										</div>
									@endforeach
									@endif
								</div>	
							</div>
							<hr style="width: 90%">
							<div style="width: 100%;display: flex; flex-direction: column;">
								<div style="width: 100%;"><b>Buổi Trưa</b></div>
								<br>
								<div style="width: 100%; display: flex;--justify-content: space-around;justify-content:flex-start;">
									@if(isset($showtimeA))
									@foreach($showtimeA as $show)
										<div  class="showtime">
											<div class="showtime-content">
												{{$show->start}} - {{$show->end}}
											</div>
											<div class="showtime-del" onclick="del({{$show->id}})">
												<img class='img' src="{{asset('icon/eraser.png')}}">
											</div>
										</div>
									@endforeach
									@endif
								</div>	
							</div>
							<hr style="width: 90%">
							<div style="width: 100%;display: flex; flex-direction: column;">
								<div style="width: 100%;"><b>Buổi Tối</b></div>
								<br>
								<div style="width: 100%; display: flex;--justify-content: space-around;justify-content:flex-start;">
									@if(isset($showtimeE))
									@foreach($showtimeE as $show)
										<div  class="showtime">
											<div class="showtime-content">
												{{$show->start}} - {{$show->end}}
											</div>
											<div class="showtime-del" onclick="del({{$show->id}})">
												<img class='img' src="{{asset('icon/eraser.png')}}">
											</div>
										</div>
									@endforeach
									@endif
								</div>	
							</div>
							<hr style="width: 90%">
						</div>
				<!-- 	</div>
				</div> -->
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
            setTimeout(function(){
                $('#showMessage').hide()            
            },2000)
        })
		// $(document).ready(function(){
		// 	var t = new Date()
		// 	alert(t.getDay())
		// })
		$(document).ready(function(){
			const today = new Date().getDay()
			// alert(today)
				// $('.'+today).attr('class','active')
				// $('.'+today).attr('class','active')
				$('.'+today).attr('class','nav-link active')
				//$('.'+today).attr('class','active')

		})
		// select showtime
		$('#start').on('change',function(){
			const film_id = $('.film').val()
			const date = $('.date').val()
			const start = $('.start').val()
			

			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/showtime/settime',
                    data : {film_id:film_id,date:date,start:start},
                    success : function(data) {
                    	//alert(data)
                    	//console.log(data);
                    	let rooms = data;
                    	$('.rooms').html('')
                    	rooms.forEach(item => $( ".rooms" ).append('<option value="'+item+'"">Phòng '+item+'</option>'))
                    },
                    error : function(error) {
                        //alert('error')
                        //console.log(error)
                    }
            	})
		})

		// function delete showtime
		function del(id){
			const date = $('#today').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/showtime/delete',
                    data : {id:id,date:date},
                    success : function(data) {
                    	//console.log(data)
                    	//alert(data)
                    	console.log(data)
                    	$('.load-showtime').html(data)
                    	//let columns = data;
                    	//$('.columns').html('')
                    	//columns.forEach(item => $( ".columns" ).append('<option>'+item+'</option>'))
                    },
                    error : function(error) {
                        console.log(error)
                        //console.log(error)
                    }
            	})
		}


		// show all showtime of date
		function showtime(date){
			$('#today').val(date)
			const id_film = $('.findFilm').val()			
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/showtime/ofday',
                    data : {date:date,id_film:id_film},
                    success : function(data) {
                    	//console.log(data)
                    	//alert(data)
                    	$('.load-showtime').html(data)
                    	//let columns = data;
                    	//$('.columns').html('')
                    	//columns.forEach(item => $( ".columns" ).append('<option>'+item+'</option>'))
                    },
                    error : function(error) {
                        console.log(error)
                        //console.log(error)
                    }
            	})
		}

		// Today change
		$('#today').on('change',function(){
			const date  = $('#today').val()
			const id_film = $('.findFilm').val()
			const today = new Date($('#today').val()).getDay()
			$( '.nav-link' ).removeClass( "active" )
			$('.'+today).attr('class','nav-link active')

			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/showtime/date',
                    data : {date:date,id_film:id_film},
                    success : function(data) {
                    	//console.log(data)
                    	//alert(data)
                    	$('.load-showtime').html(data)
                    	//let columns = data;
                    	//$('.columns').html('')
                    	//columns.forEach(item => $( ".columns" ).append('<option>'+item+'</option>'))
                    },
                    error : function(error) {
                        console.log(error)
                        //console.log(error)
                    }
            	})
		})

		// function find room (Tìm suất chiếu theo phòng)
		$('.findFilm').on('change',function(){
			const id_film = $('.findFilm').val()
			const date = $('#today').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/showtime/find',
                    data : {date:date,id_film:id_film},
                    success : function(data) {
                    	//console.log(data)
                    	//alert(data)
                    	$('.load-showtime').html(data)
                    	//let columns = data;
                    	//$('.columns').html('')
                    	//columns.forEach(item => $( ".columns" ).append('<option>'+item+'</option>'))
                    },
                    error : function(error) {
                        console.log(error)
                        //console.log(error)
                    }
            	})
		})

		// Load film from when film change
		// $('.film').on('change',function(){
		// 	const id_film = $('.film').val()
		// 	const date = $('#today').val()
		// 	$.ajax({
  //                   headers: {
  //                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //                   },
  //                   type: 'post',
  //                   url: path +'admin/showtime/loadfilm',
  //                   data : {date:date,id_film:id_film},
  //                   success : function(data) {
  //                   	//console.log(data)
  //                   	//alert(data)
  //                   	$('.load-showtime').html(data)
  //                   	//let columns = data;
  //                   	//$('.columns').html('')
  //                   	//columns.forEach(item => $( ".columns" ).append('<option>'+item+'</option>'))
  //                   },
  //                   error : function(error) {
  //                       console.log(error)
  //                       //console.log(error)
  //                   }
  //           	})
		// })
	</script>

@endsection