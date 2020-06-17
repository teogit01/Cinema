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