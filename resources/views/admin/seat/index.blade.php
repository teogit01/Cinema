@extends('admin.layouts.index')
@section('content')
<style type="text/css">
	.main-content { width: 100%; display: flex }
	.left { width: 100%; box-shadow: 10px 10px 10px #ddd; padding:10px; }	
	.right { width: 40%;margin-left:40px; box-shadow: 10px 10px 10px #ddd;padding:10px; --max-height: 600px;height:280px;}
	table { width: 100% }
	tr { border-bottom: 1px solid #eee; line-height: 40px; }
	.td-code { width: 30%; }
	.td-name { width: 50% }
	.sub-action { width: 20%; }
	.a { cursor: pointer; }
	input { border: none; background-color: #fff; }
	input:focus { outline: none }
	.img { width: 15px; }
	.showtime { border: 1px solid #ddd; width: 11%;margin-left: 1%; background-color: #eee; border-radius: 3px;position: relative;}
	.showtime:hover { box-shadow: 1px 1px 10px #aaa; cursor: pointer; }
	.showtime-content {--position: absolute;}
	.showtime-del { position: absolute;z-index: 1;right: 0;top:-18px }
	.img { width: 15px; }
</style>
<br>
	<div style="margin-left: 10%;display: flex;">
		<h3 style="width: 70%">Quản lí ghế ngồi</h3>
		<a href="{{route('admin.seat.list')}}" class="btn btn-info" style="width: 100px;">Thêm</a>
	</div>
	@if($message = Session::get('success'))
        <div class="alert alert-success" role="alert" id='showMessage'
            style="position: fixed;width: 50%;padding: 7px; right: 0px;top:10%;">
            <span>{{$message}}</span>
        </div>
    @endif
	<hr>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div style="width: 100%;margin-left: 2%; display: flex;">
		<div style="width: 20%;">
			<select name="" class="form-control film">
				@if(!empty($films))
				@foreach($films as $film)
					<option value="{{$film->id}}">{{$film->name}}</option>
				@endforeach
				@endif
			</select>
		</div>
		&nbsp;
		<div style="width: 20%;">
			<select name="" class="form-control room">
				@if(!empty($rooms))
				@foreach($rooms as $room)
					<option value="{{$room->id}}">{{$room->name}}</option>
				@endforeach
				@endif
			</select>
		</div>
	</div>
	<div class="load-showtime-film">
		<div style="width: 100%;font-size: 13px; margin-left: 2%;margin-top: 10px;">
		<div class="" style="padding: 10px;">
			<div style="width: 100%;display: flex; flex-direction: column;">
				<div style="width: 100%; display: flex;--justify-content: space-around;justify-content:flex-start;">
					@if (isset($showtimes))
					@foreach($showtimes as $show)
					<div  class="showtime" style="text-align: center;" onclick="detail({{$show->id}})">
						<div class="showtime-content">
							{{$show->start}} - {{$show->end}}
						</div>
					</div>
					@endforeach
					@endif
				</div>	
			</div>
		</div>
		<hr>
		<div class="content">
		<div class="main-content load-data" style="margin-top: -50px;font-size: 20px;">
			<div class="left" style="text-align: center;width: 100%">
				<div class="page_lich-chonghe-conten row" style="width: 100%;display: flex;">
					<div class="page_lich-chonghe-content-manhinh" style="width: 100%">
						Màn hình
					</div>
					<div class="page_lich-chonghe-content-ghe" style="width: 100%; justify-content: center;margin-left: 20%">
                
						<div class="page_lich-chonghe-content-ghe">
							@foreach($rows as $key => $row)
							<div class="page_lich-chonghe-content-ghe-hang">
								
								<div class="page_lich-chonghe-content-ghe-tencot">{{$key}}</div>
								
									@for($i=1; $i<13; $i++)
										@if(isset($row[$i]))
											@if($key=='A' || $key == 'B' || $key == 'C' || $key =='D')
												@if ($row[$i]->status == 1)
												<div class="page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title">
													<span style="font-size: 20px;">X</span>
												</div>
												@else
												<div class="page_lich-chonghe-content-ghe-item seat ">
													<span style="font-size: 20px;color: #bbb">{{$i}}</span>
												</div>
												@endif
											@elseif($key =='E' || $key =='F' || $key =='G' || $key =='H')	
												@if ($row[$i]->status == 1)
													<div class="page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title">
													<span style="font-size: 20px;">X</span>
													</div>
												@else
													<div class="page_lich-chonghe-content-ghe-item seat2 ">
														<span style="font-size: 20px;color: #bbb">{{$i}}</span>
													</div>
												@endif
											@else
											@if ($row[$i]->status == 1)
												<div class="page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title">
												<span style="font-size: 20px;">X</span>
												</div>
												@else
												<div class="page_lich-chonghe-content-ghe-item seat3 ">
													<span style="font-size: 20px;color: #bbb">{{$i}}</span>
												</div>
												@endif
											@endif
										@else
											<div class="page_lich-chonghe-content-ghe-item-stt"></div>	
										@endif
									@endfor
							</div>
							@endforeach	
							
						<div class="page_lich-chonghe-content-ghe-hang">
							<div class="page_lich-chonghe-content-ghe-tencot"></div>
							@for($i=1; $i<13; $i++)
								<div class="page_lich-chonghe-content-ghe-item-stt-2">{{$i}}</div>	
							@endfor
						</div>
					</div>
					<br>
				</div>
				<br>
				<div class="page_lich-chonghe-tutorial" style="width: 100%">
					<div class="page_lich-chonghe-tutorial-item">
						<div class="page_lich-chonghe-tutorial-item-color">
						</div>
						<div class="page_lich-chonghe-tutorial-item-title">
							Ghế Vip
						</div>
					</div>
					<div class="page_lich-chonghe-tutorial-item">
						<div class="page_lich-chonghe-tutorial-item-color">
						</div>
						<div class="page_lich-chonghe-tutorial-item-title">
							Ghế thường
						</div>
					</div>
					<div class="page_lich-chonghe-tutorial-item">
						<div class="page_lich-chonghe-tutorial-item-color">
						</div>
						<div class="page_lich-chonghe-tutorial-item-title">
							Ghế trung bình
						</div>
					</div>
					<div class="page_lich-chonghe-tutorial-item">


						<div class="page_lich-chonghe-tutorial-item-color seat-select" style="position: relative;">
							<span style="position: absolute;top:-5px;left: 5px">x</span>
						</div>
						<div class="page_lich-chonghe-tutorial-item-title">
							Ghế đã có người chọn	
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		</div>
	</div>

	<script type="text/javascript">
		
		// $(document).ready(function(){
		// 	const room_id = $('.room').val()
		// 	$('#room_id').val(room_id)
		// 	//$('#room_id').val()
		// })
		$('.room').on('change',function(){
			const id_room = $('.room').val()
			//$('#room_id').val(room_id)
			//alert(room_id)
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/seat/findroom',
                    data : {id_room: id_room},
                    success : function(data) {

                        $('.load-data').html(data)
                        //$('#comment').val('')
                        //$('#count-comment').val(countComment-1)
                        //alert(data)
                    },
                    error : function(error) {
                    	
                        alert('error')
                        //console.log(error)
                    }
            	})     
			//window.location= path+'admin/seat/'+room_id;
		})

		function detail(id_showtime){
			const id_film = $('.film').val()
			const id_room = $('.room').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/seat/showtime',
                    data : {id_film: id_film,id_room:id_room,id_showtime:id_showtime},
                    success : function(data) {

                        $('.load-data').html(data)
                        //$('#comment').val('')
                        //$('#count-comment').val(countComment-1)
                        //alert(data)
                    },
                    error : function(error) {
                    	
                        alert('error')
                        //console.log(error)
                    }
            	})     
		}

		// film change load showtime
		$('.film').on('change',function(){
			const id_film = $(this).val()
			const id_room = $('.room').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/seat/showtime/film',
                    data : {id_film: id_film,id_room:id_room},
                    success : function(data) {

                        $('.load-showtime-film').html(data)
                        //$('#comment').val('')
                        //$('#count-comment').val(countComment-1)
                        //alert(data)
                    },
                    error : function(error) {
                    	
                        alert('error')
                        //console.log(error)
                    }
            	})  
		})


	</script>
@endsection