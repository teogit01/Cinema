@extends('admin.layouts.index')
@section('content')
<style type="text/css">
	.main-content { width: 100%; display: flex;font-size: 16px  }
	.left { width: 100%; box-shadow: 10px 10px 10px #ddd; padding:10px; }	

	table { width: 100% }
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
	<div style="margin-left: 3%;width: 100%;display: flex;">
		<div style="width: 50%"><h3>Danh sách tài khoản</h3></div>
    	<input class="form-control mr-sm-2" id='search' style="width: 50%;" type="text" placeholder="Tìm tài khoản..." aria-label="Search">
	</div>
	@if($message = Session::get('success'))
        <div class="alert alert-success" role="alert" id='showMessage'
            style="position: fixed;width: 50%;padding: 7px; right: 0px;top:10%;">
            <span>{{$message}}</span>
        </div>
    @endif
	<hr>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="content" style="padding-left: 5px; padding-right: 5px;">
		<div class="main-content" style="margin-top: -40px;">
			<div class="left load-data">
				<table class="">
					<tr class="th">
						<th style="width: 3%;">#</th>
						<th style="width: 7%;">Mã</th>
						<th style="width: 15%;">Tên</th>
						<th style="width: 10%;">Ngày sinh</th>
						<th style="width: 15%;">Email</th>
						<th style="width: 10%;">Sdt</th>
						<th style="width: 20%;">Địa chỉ</th>
						<th style="width: 10%;">Điểm</th>
					</tr>					
					@if(!empty($users))
						@foreach ($users as $index => $user)
						<tr>
							<td>{{ $index+1 }}</td>
							<td>{{ $user->code }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->birthday }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->phone }}</td>
							<td>{{ $user->address }}</td>
							<td>{{ $user->point }}</td>
						</tr>
						@endforeach
					@endif
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		
        // delete 
        function del(id){
        	window.location= path+'admin/country/delete/'+id;
        	//alert()
        }
        $('#search').on('change',function(){
			const name = $('#search').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/account/find',
                    data : {name:name},
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
	</script>
@endsection