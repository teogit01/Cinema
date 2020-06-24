@extends('admin.layouts.index')
@section('content')
<style type="text/css">
	.main-content { width: 100%; display: flex;--font-size: 16px  }
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
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div style="margin-left: 3%;font-size: 20px;display: flex;">
		<div style="width: 20%"><b>Thống kê</b></div>
    	<!-- <input class="form-control mr-sm-2" id='search' style="width: 50%;" type="text" placeholder="Tìm tài khoản..." aria-label="Search"> -->
    	<select class="form-control films load" style="width: 25%">
    		<option value="0">Tất cả phim</option>
    		@foreach($films as $film)
    		<option value="{{$film->id}}">{{{$film->name}}}</option>
    		@endforeach
    		
    	</select>
    	&nbsp;&nbsp;&nbsp;
    	<select class="form-control month load" style="width: 25%">
    		<option value="0">Tất cả tháng</option>
    		@for($i = 0; $i<12; $i++)
    		<option value="{{$i+1}}">Tháng {{ $i+1 }}</option>
    		@endfor
    		
    	</select>
    	&nbsp;&nbsp;&nbsp;
    	<input type="text" name="" value="Năm:" style="width:7%;background-color: #fff;font-size: 18px" disabled>
    	<input type="text" name="" value="{{date('Y')}}" class="year load" style="width:10%;">
	</div>

	<hr>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="content" style="padding-left: 5px; padding-right: 5px;">
		<div class="main-content" style="margin-top: -40px;height: 400px;margin-top: 10px">
			<div class="left load-data">
				<table>
					<tr>
						<th style="width:20%">Tổng vé bán:</th>
						<td>{{ isset($ticket) ? $ticket : 0 }}</td>
					</tr>
					<tr style="width:20%">
						<th>Tổng doanh thu:</th>
						<td>{{ isset($total) ? number_format($total,3,'.','.') : 0 }} VNĐ</td>
					</tr>
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
        $('.load').on('change',function(){
			const month = $('.month').val()
			const year = $('.year').val()
			const id_film = $('.films').val()
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/statistic/find',
                    data : {month:month,year:year,id_film:id_film},
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