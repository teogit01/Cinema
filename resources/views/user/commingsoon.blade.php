<div class="phim_content">
	<div id="home-dsphim" class="phim_content-container">
		<div class="phim_content-row">

			@foreach($films as $key => $film)
			<div class="phim_content-item">
				<div class="phim_content-img">
					<img class="phim_content-poster" src="{{asset('img/poster')}}/{{$film->poster}}" alt="">
					<div class="phim_content-dinhdang">C16</div>
					@if (isset($film->star))
					<div class="phim_content-danhgia">
						<span>{{$film->star}}</span>
						<div class="phim_content-danhgia-sao">
							@for($i=0; $i< round($film->star/2); $i++)
							<img src="https://tix.vn/app/assets/img/icons/star1.png">
							@endfor
						</div>
					</div>
					@endif
					<img style="z-index: 1" onclick="openModal('{{$film->trailer}}')" src="https://tix.vn/app/assets/img/icons/play-video.png" class="phim_content-play-img"
					alt="play">
					<a href="{{route('user.detail',$film->id)}}">
						<div class="phim_content-play">
						</div>
					</a>
				</div>
				<div class="phim_content-lable">
					<span class="phim_content-name">
						{{$film->name}}
					</span>
					<span class="phim_content-time">
						{{$film->runtime}} phút
					</span>
					<div class="phim_content-booking">
						<div class="phim_content-booking-button">MUA VÉ</div>
					</div>
				</div>
			</div>
			@if ($key % 8 == 7)
		</div>
		<div class="phim_content-row">
			@endif
			@endforeach

		</div>
	</div>
	<a onclick="plusphim(-1)" class="phim_prev">&#10094;</a>
	<a onclick="plusphim(1)" class="phim_next">&#10095;</a>

</div>