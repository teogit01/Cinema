<!-- <div class="load-showtime" style="padding: 10px;"> -->
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
<!-- </div> -->