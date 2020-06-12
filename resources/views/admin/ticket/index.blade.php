@extends('admin.layouts.index')
@section('content')
<style type="text/css">
	.main-content { width: 100%; display: flex }
	.left { width: 60%; box-shadow: 10px 10px 10px #ddd; padding:10px; }	
	.right { width: 40%;margin-left:40px; box-shadow: 10px 10px 10px #ddd;padding:10px; --max-height: 600px;height:280px;}
	table { width: 100% }
	tr { border-bottom: 1px solid #eee; line-height: 40px; }
	.td-code { width: 30%; }
	.td-name { width: 50% }
	.sub-action { width: 20%; }
	.a { cursor: pointer; }
	input { border: none; background-color: #fff; }
	input:focus { outline: none }
</style>
<br>
	<div style="margin-left: 10%"><h3>Quản lí Vé Đặt</h3></div>
	@if($message = Session::get('success'))
        <div class="alert alert-success" role="alert" id='showMessage'
            style="position: fixed;width: 50%;padding: 7px; right: 0px;top:10%;">
            <span>{{$message}}</span>
        </div>
    @endif
	<hr>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div style="width: 55%;margin-left: 3%;">
		<select name="" class="form-control room">
			@if(!empty($rooms))
			@foreach($rooms as $room)
				<option value="{{$room->id}}">{{$room->name}}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="content">
		<div class="main-content load-data">
			<div class="left">
				<table class="load-left">
					<tr>
						<th>Mã Ghế</th>
						<th>Tên Ghế</th>
						<th></th>
					</tr>
					@if(!empty($seats))
						@foreach ($seats as $index => $seat)
						<tr ondblclick='open1({{$seat->id}})'>
							
								<td class="td-code"><input style="width: 100%" type="text" name="code" placeholder="{{$seat->code}}" disabled autocomplete="off"></td>
								<td class="td-name"><input class="{{$seat->id}}" type="text" id="{{$seat->id}}" name="name" placeholder="{{$seat->name}}" disabled autocomplete="off"></td>
								<td class="sub-action">
									<img class="a" onclick="del({{$seat->id}})" style="width: 20px; height:20px;" src="{{asset('icon/eraser.png')}}"></a>
									<!-- <button type="submit" style="display: none;" id='sm'></button> -->
								</td>
							
						</tr>
						@endforeach
					@endif
				</table>
			</div>
			<div class="right">
				<form action="#" method="" class="load-right">
					@csrf
					<label><h5>Chọn Hàng Ghế</h5></label>
					<select class="form-control rows" name="row">
						<option></option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
						<option value="E">E</option>
						<option value="F">F</option>
						<option value="G">G</option>
						<option value="H">H</option>
						<option value="I">I</option>
						<option value="J">J</option>
					</select>
					<br>
					<label><h5>Chọn Cột Ghế</h5></label>					
					<select class="form-control columns" name="column">
						<!-- <option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option> -->
					</select>
					<!-- <input type="text" name="name" id='name' class="form-control" autocomplete="off"> -->
					<input type="text" name="room_id" id='room_id' class="room_id" style="display: none;">
					<br>
					<a class="btn btn-info btn-block" onclick="add()">Thêm</a>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
            setTimeout(function(){
                $('#showMessage').hide()            
            },2000)
        })
        
		$(document).ready(function(){
			const room_id = $('.room').val()
			$('#room_id').val(room_id)
			//$('#room_id').val()
		})
		$('.room').on('change',function(){
			const room_id = $('.room').val()
			$('#room_id').val(room_id)
			$(document).ready(function(){
				$('.rows').val('')
				$('.columns').val('')
			})
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/seat/',
                    data : {room_id: room_id},
                    success : function(data) {

                        $('.load-left').html(data)
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
		// add seat from room
		function add(){
			const row = $('.rows').val()
			const column = $('.columns').val()
			const room_id = $('#room_id').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/seat/add',
                    data : {row:row,room_id:room_id,column:column},
                    success : function(data) {
                    	$('.load-left').html(data)
                    	//alert(data);
                    },
                    error : function(error) {
                        alert('error')
                        //console.log(error)
                    }
            	})

		}

		// Change ROWS
		$('.rows').on('change',function(){
			const room_id = $('#room_id').val()
			const row = $('.rows').val()
			//alert(row)
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/seat/select',
                    data : {row:row,room_id:room_id},
                    success : function(data) {

                    	let columns = data;
                    	$('.columns').html('')
                    	columns.forEach(item => $( ".columns" ).append('<option>'+item+'</option>'))
                    },
                    error : function(error) {
                        alert('error')
                        //console.log(error)
                    }
            	})
		})

	</script>
@endsection