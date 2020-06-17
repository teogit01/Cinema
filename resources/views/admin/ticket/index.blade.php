@extends('admin.layouts.index')
@section('content')

<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<style type="text/css">
	.main-content { width: 100%; display: flex;font-size: 16px  }
	.left { width: 100%; box-shadow: 10px 10px 10px #ddd; padding:10px; }	
	.right { width: 40%;margin-left:40px; box-shadow: 10px 10px 10px #ddd;padding:10px; --max-height: 600px;height:280px;}
	table { width: 100%; margin-top: -30px; }
	tr { border-bottom: 1px solid #eee; line-height: 40px; }
	.td-code { width: 30%; }
	.td-name { width: 50% }
	.sub-action { width: 20%; }
	.a { cursor: pointer; }
	input { border: none; background-color: #fff; }
	input:focus { outline: none }
	.th { --box-shadow: 2px 1px 20px #ddd; background-color: #aaa; border-radius: 15px}
	tr:hover { color: green }
</style>
<br>
	<div style="margin-left: 5%;width: 100%;display: flex;">
		<div style="width: 50%"><h3>Quản lí Vé Đặt</h3></div>
    	<input class="form-control mr-sm-2" id='search' style="width: 50%;" type="text" placeholder="Tìm khách hàng ..." aria-label="Search">
	</div>
	@if($message = Session::get('success'))
        <div class="alert alert-success" role="alert" id='showMessage'
            style="position: fixed;width: 50%;padding: 7px; right: 0px;top:10%;">
            <span>{{$message}}</span>
        </div>
    @endif	
    
	<hr>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div style="width: 100%;margin-left: 3%;display: flex;">
		<div style="width: 20%">
			<select name="" class="form-control films">
				<option value=0>Tất cả vé đặt</option>
				@if(!empty($films))
				@foreach($films as $film)
				<option value="{{$film->id}}">{{$film->name}}</option>
				@endforeach
				@endif
			</select>
		</div> &nbsp;
		<div style="width: 20%">
			<input type="date" class="form-control date" name="" value="{{date('Y-m-d')}}">
		</div>
	</div>
	<div class="content" style="padding-left: 5px; padding-right: 5px;">
		<div class="main-content">
			<div class="left load-data">
				<table class="">
					<tr class="th">
						<th style="width: 5%;">#</th>
						<th style="width: 15%;">Khách</th>
						<th style="width: 20%;">Ngày</th>
						<th style="width: 10%;">Phim</th>
						<th style="width: 15%;">Xuất chiếu</th>
						<th style="width: 10%;">Ghế</th>
						<th style="width: 20%;">Giá</th>
					</tr>					
					@if(!empty($tickets))
						@foreach ($tickets as $index => $ticket)
						<tr>
							<td>{{ $index+1 }}</td>
							<td></td>
							<td>{{ $ticket->date }}</td>
							<td>{{ $ticket->film->name }}</td>
							<td>{{ $ticket->showtime->start }}~{{ $ticket->showtime->end }}</td>
							<td>{{ $ticket->seat->name }}</td>
							<td>{{ $ticket->price }} K</td>
						</tr>
						@endforeach
					@endif
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		// Autocomplete
		// var names = ['phanlac','a']
		// $('#search').on('keyup',function(){
		// 	const value = $('#search').val()
		// 	//console.log(names)
		// 	$('#search').autocomplete({
		// 			source: names
		// 	})
		// })
		$('#search').on('change',function(){
			const name = $('#search').val()
			const id_film = $('.films').val()
			const date = $('.date').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/ticket/find',
                    data : {id_film: id_film,date:date,name:name},
                    success : function(data) {
                    	//alert(data)
                        $('.load-data').html(data)
                        //console.log(data)
                        
                    },
                    error : function(error) {
                    	
                        alert('error')
                        //console.log(error)
                    }
            	})     
		})

		$('.films').on('change',function(){
			const id_film = $('.films').val()
			const date = $('.date').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/ticket/find',
                    data : {id_film: id_film,date:date},
                    success : function(data) {

                        $('.load-data').html(data)
                        
                    },
                    error : function(error) {
                    	
                        alert('error')
                        //console.log(error)
                    }
            	})     
			//window.location= path+'admin/seat/'+room_id;
		})
		$('.date').on('change',function(){
			const id_film = $('.films').val()
			const date = $('.date').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/ticket/find',
                    data : {id_film: id_film,date:date},
                    success : function(data) {

                        $('.load-data').html(data)
                        
                    },
                    error : function(error) {
                    	
                        alert('error')
                        //console.log(error)
                    }
            	})     
			//window.location= path+'admin/seat/'+room_id;
		})


	</script>
@endsection