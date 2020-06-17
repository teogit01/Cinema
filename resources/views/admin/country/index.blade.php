@extends('admin.layouts.index')
@section('content')
<style type="text/css">
	.main-content { width: 100%; display: flex;font-size: 16px  }
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
	<div style="margin-left: 10%"><h3>Quản lí Quốc Gia</h3></div>
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
						<th>Mã Quốc gia</th>
						<th>Tên Quốc gia</th>
						<th></th>
					</tr>
					@if(!empty($countrys))
						@foreach ($countrys as $index => $country)
						<tr ondblclick='open1({{$country->id}})'>
							
								<td class="td-code"><input style="width: 100%" type="text" name="code" placeholder="{{$country->code}}" disabled autocomplete="off"></td>
								<td class="td-name"><input class="{{$country->id}}" type="text" id="{{$country->id}}" name="name" placeholder="{{$country->name}}" disabled autocomplete="off"></td>
								<td class="sub-action">
									<label for='sm'><img class="a" onclick="edit({{$country->id}})" style="width: 20px; height:20px;" src="{{asset('icon/pen.png')}}"></label>&nbsp;
									<img class="a" onclick="del({{$country->id}})" style="width: 20px; height:20px;" src="{{asset('icon/eraser.png')}}"></a>
									<!-- <button type="submit" style="display: none;" id='sm'></button> -->
								</td>
							
						</tr>
						@endforeach
					@endif
				</table>
			</div>
			<div class="right">
				<form action="{{route('admin.country.add')}}" method="post">
					@csrf
					<label><h5>Nhập tên Quốc gia</h5></label>
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
        	window.location= path+'admin/country/delete/'+id;
        	//alert()
        }
        function open1(id){
        	$('.'+id).removeAttr('disabled')
        	$('.open')[1].focus();

        }
        function edit(id){
        	const value = $('#'+id).val()
        	window.location= path+'admin/country/edit/'+id+'/'+value;
        }
	</script>
@endsection