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
