<div class="left" style="text-align: center;width: 100%">
	<div class="page_lich-chonghe-conten row" style="width: 100%;display: flex;">
		<div class="page_lich-chonghe-content-manhinh" style="width: 100%">
			Màn hình
		</div>
		<div class="page_lich-chonghe-content-ghe" style="width: 100%; justify-content: center;margin-left: 20%">
			
			<div class="page_lich-chonghe-content-ghe">
				@foreach($rows as $key => $row)
				<div class="page_lich-chonghe-content-ghe-hang">
					
					<div class="page_lich-chonghe-content-ghe-tencot">{{$key}}</div>
					
					@for($i=1; $i<13; $i++)
					@if(isset($row[$i]))
					@if($key=='A' || $key == 'B' || $key == 'C' || $key =='D')
					@if ($row[$i]->status == 1)
					<div class="page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title">
						<span style="font-size: 20px;">X</span>
					</div>
					@else
					<div class="page_lich-chonghe-content-ghe-item seat ">
						<span style="font-size: 20px;color: #bbb">{{$i}}</span>
					</div>
					@endif
					@elseif($key =='E' || $key =='F' || $key =='G' || $key =='H')	
					@if ($row[$i]->status == 1)
					<div class="page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title">
						<span style="font-size: 20px;">X</span>
					</div>
					@else
					<div class="page_lich-chonghe-content-ghe-item seat2 ">
						<span style="font-size: 20px;color: #bbb">{{$i}}</span>
					</div>
					@endif
					@else
					@if ($row[$i]->status == 1)
					<div class="page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title">
						<span style="font-size: 20px;">X</span>
					</div>
					@else
					<div class="page_lich-chonghe-content-ghe-item seat3 ">
						<span style="font-size: 20px;color: #bbb">{{$i}}</span>
					</div>
					@endif
					@endif
					@else
					<div class="page_lich-chonghe-content-ghe-item-stt"></div>	
					@endif
					@endfor
				</div>
				@endforeach	
				
				<div class="page_lich-chonghe-content-ghe-hang">
					<div class="page_lich-chonghe-content-ghe-tencot"></div>
					@for($i=1; $i<13; $i++)
					<div class="page_lich-chonghe-content-ghe-item-stt-2">{{$i}}</div>	
					@endfor
					
				</div>
			</div>
			<br>
		</div>
		<br>
		<div class="page_lich-chonghe-tutorial" style="width: 100%">
			<div class="page_lich-chonghe-tutorial-item">
				<div class="page_lich-chonghe-tutorial-item-color">
				</div>
				<div class="page_lich-chonghe-tutorial-item-title">
					Ghế Vip
				</div>
			</div>
			<div class="page_lich-chonghe-tutorial-item">
				<div class="page_lich-chonghe-tutorial-item-color">
				</div>
				<div class="page_lich-chonghe-tutorial-item-title">
					Ghế thường
				</div>
			</div>
			<div class="page_lich-chonghe-tutorial-item">
				<div class="page_lich-chonghe-tutorial-item-color">
				</div>
				<div class="page_lich-chonghe-tutorial-item-title">
					Ghế trung bình
				</div>
			</div>
			<div class="page_lich-chonghe-tutorial-item">


				<div class="page_lich-chonghe-tutorial-item-color seat-select" style="position: relative;">
					<span style="position: absolute;top:-5px;left: 5px">x</span>
				</div>
				<div class="page_lich-chonghe-tutorial-item-title">
					Ghế đã có người chọn	
				</div>
			</div>
			
		</div>
	</div>