<div class="page_phim_body-content-lichchieu-right load-showtime">
	<div class="page_phim_body-content-lichchieu-right-item">
		<div class="page_phim_body-content-lichchieu-right-rap">
			<div class="page_phim_body-content-lichchieu-right-img">
				
			</div>
			<div class="page_phim_body-content-lichchieu-right-title">
				<div class="page_phim_body-content-lichchieu-right-name">
					Buổi Sáng
				</div>
				<div class="page_phim_body-content-lichchieu-right-diachi"></div>
			</div>
		</div>
		<div class="page_phim_body-content-lichchieu-right-time">
			@foreach ($showtimeM as $showM)
			<div class="page_phim_body-content-lichchieu-right-time-item">
				<span class="page_phim_body-content-lichchieu-right-time-formto" onclick="checkout({{$showM->id}})">
					<span class="page_phim_body-content-lichchieu-right-time-start">{{$showM->start}}</span> ~ {{$showM->end}}</span>
				</div>
				@endforeach
			</div>
		</div>

		<div class="page_phim_body-content-lichchieu-right-item">
			<div class="page_phim_body-content-lichchieu-right-rap">
				<div class="page_phim_body-content-lichchieu-right-img">
					
				</div>
				<div class="page_phim_body-content-lichchieu-right-title">
					<div class="page_phim_body-content-lichchieu-right-name">
						Buổi Trưa
					</div>

					<div class="page_phim_body-content-lichchieu-right-diachi"></div>
				</div>
			</div>
			<div class="page_phim_body-content-lichchieu-right-time">
				@foreach ($showtimeA as $showA)
				<div class="page_phim_body-content-lichchieu-right-time-item">
					<span class="page_phim_body-content-lichchieu-right-time-formto" onclick="checkout({{$showA->id}})">
						<span class="page_phim_body-content-lichchieu-right-time-start">{{$showA->start}}</span> ~ {{$showA->end}}</span>
					</div>
					@endforeach
				</div>
			</div>

			<div class="page_phim_body-content-lichchieu-right-item">
				<div class="page_phim_body-content-lichchieu-right-rap">
					<div class="page_phim_body-content-lichchieu-right-img">
						
					</div>
					<div class="page_phim_body-content-lichchieu-right-title">
						<div class="page_phim_body-content-lichchieu-right-name">
							Buổi Tối
						</div>

						<div class="page_phim_body-content-lichchieu-right-diachi"></div>
					</div>
				</div>
				<div class="page_phim_body-content-lichchieu-right-time">
					@foreach ($showtimeE as $showE)
					<div class="page_phim_body-content-lichchieu-right-time-item">
						<span class="page_phim_body-content-lichchieu-right-time-formto" onclick="checkout({{$showE->id}})">
							<span class="page_phim_body-content-lichchieu-right-time-start">{{$showE->start}}</span> ~ {{$showE->end}}</span>
						</div>
						@endforeach
					</div>
				</div>
			</div>