<table>
	<tr>
		<th style="width:20%">Tổng vé bán:</th>
		<td>{{ isset($ticket) ? $ticket : 0 }} vé</td>
	</tr>
	<tr style="width:20%">
		<th>Tổng doanh thu:</th>
		<td>{{ isset($total) ? number_format($total,3,'.','.') : 0 }} VNĐ</td>
	</tr>
</table>