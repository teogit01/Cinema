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
		<td>{{ $ticket->user->name }}</td>
		<td>{{ $ticket->date }}</td>
		<td>{{ $ticket->film->name }}</td>
		<td>{{ $ticket->showtime->start }}~{{ $ticket->showtime->end }}</td>
		<td>{{ $ticket->seat->name }}</td>
		<td>{{ $ticket->price }} K</td>
	</tr>
	@endforeach
	@endif
</table>