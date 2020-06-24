@extends('admin.layouts.index')
@section('content')
<style type="text/css">
	.main-content { width: 100%; display: flex }
	.left { width: 60%; box-shadow: 10px 10px 10px #ddd; padding:10px; }	
	.right { width: 40%;margin-left:40px; box-shadow: 10px 10px 10px #ddd;padding:10px; max-height: 400px;height:170px;}
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
	<div style="display: flex; width: 100%;margin-left: 3%">
		<div style="width: 25%; font-size: 20px;"><b>Quản lý thể loại</b></div>
		<div style="width: 55%">
			<!-- <b> Tổng phim: </b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b> Đang chiếu:</b>  -->
		</div>
	</div>
	@if($message = Session::get('success'))
        <div class="alert alert-success" role="alert" id='showMessage'
            style="position: fixed;width: 50%;padding: 7px; right: 0px;top:10%;">
            <span>{{$message}}</span>
        </div>
    @endif
	<hr>
	<div class="content">
		<div class="main-content">
			<div class="left">
				<table>
					<tr>
						<th>Mã Thể Loại</th>
						<th>Tên Thể loại</th>
						<th></th>
					</tr>
					@if(!empty($genres))
						@foreach ($genres as $index => $genre)
						<tr ondblclick='open1({{$genre->id}})'>
							
								<td class="td-code"><input style="width: 100%" type="text" name="code" placeholder="{{$genre->code}}" disabled autocomplete="off"></td>
								<td class="td-name"><input class="{{$genre->id}}" type="text" id="{{$genre->id}}" name="name" placeholder="{{$genre->name}}" disabled autocomplete="off"></td>
								<td class="sub-action">
									<label for='sm'><img class="a" onclick="edit({{$genre->id}})" style="width: 20px; height:20px;" src="{{asset('icon/pen.png')}}"></label>&nbsp;
									<img class="a" onclick="del({{$genre->id}})" style="width: 20px; height:20px;" src="{{asset('icon/eraser.png')}}"></a>
									<!-- <button type="submit" style="display: none;" id='sm'></button> -->
								</td>
							
						</tr>
						@endforeach
					@endif
				</table>
			</div>
			<div class="right">
				<form action="{{route('admin.genre.add')}}" method="post">
					@csrf
					<label><h5>Nhập tên Thể Loại</h5></label>
					<input type="text" name="name" class="form-control" autocomplete="off">
					<br>
					<button class="btn btn-info btn-block">Thêm</button>
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

        // delete 
        function del(id){
        	window.location= path+'admin/genre/delete/'+id;
        	//alert(path)
        }
        function open1(id){
        	$('.'+id).removeAttr('disabled')
        	$('.open')[1].focus();

        }
        function edit(id){
        	const value = $('#'+id).val()
        	window.location= path+'admin/genre/edit/'+id+'/'+value;
        }
	</script>
@endsection