<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/gif"
    href="https://s3img.vcdn.vn/123phim/2018/09/459970ce80ca2c762c8c8076b415c06e.png" />
  <title>Index</title>
  <link rel="stylesheet" href="{{asset('src/user/style.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript">
    var link = 'https://www.youtube.com/embed/'
    var path = "{{asset('/')}}"
  </script>
  <style type="text/css">
    #ib{ border:none; }
  </style>
</head>

<body>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="pagehome">
    <header class="header">
      <nav class="header_nav">
        <a href="#"><img class="img_logo" src="https://tix.vn/app/assets/img/icons/web-logo.png" alt="logo"></a>
        <ul class="header_list header_list-menu ">
          <li class="header_item"><a href="#menu_lichchieu">Lịch chiếu</a></li>
          <li class="header_item"><a href="#menu_cumrap">Cụm rạp</a></li>
          <li class="header_item"><a href="#menu_ungdung">Ứng dụng</a></li>
        </ul>
        <ul class="header_list">
          <li class="header_item header_item-left">
            <img class="img_avt" src="{{asset('src/user/avatar1.png')}}" alt="avatar">
          </li>
          @if(!Auth::check())
          <a href="{{route('login')}}">
            <li class="header_item header_item-left header_item-separate ">Đăng nhập</li>
          </a>
          <a href="{{route('register')}}">
            <li class="header_item header_item-left">Đăng ký</li>
          </a>
          @else
          <a href="{{route('user.profile',Auth::id())}}">
            <li class="header_item header_item-left header_item-separate ">{{Auth::user()->name}}</li>
          </a>
          <a href="{{route('logout')}}">
            <li class="header_item header_item-left header_item-separat">Đăng xuất</li>
          </a>
          @endif
        </ul>
      </nav>
    </header>

    <div class="poster">
      <div class="slideshow-container">
        <div class="mySlides " onmouseover="pauseTimer()" onmouseout="activateTimer()">
          <div class="poster_overplay-link"></div>
          <img class="poster_img" src="https://s3img.vcdn.vn/123phim/2020/03/wild-15834618796245.jpg"
            style="width:100%">
          <div class="poster_trailer">
            <img src="https://tix.vn/app/assets/img/icons/play-video.png" alt="play">
          </div>
        </div>

        <div class="mySlides " onmouseover="pauseTimer()" onmouseout="activateTimer()">
          <div class="poster_overplay-link"></div>
          <img class="poster_img" src="https://s3img.vcdn.vn/123phim/2020/03/onward-15840276765820.jpg"
            style="width:100%">
          <div class="poster_trailer">
            <img src="https://tix.vn/app/assets/img/icons/play-video.png" alt="play">
          </div>
        </div>

        <div class="mySlides " onmouseover="pauseTimer()" onmouseout="activateTimer()">
          <div class="poster_overplay-link"></div>
          <img class="poster_img" src="https://s3img.vcdn.vn/123phim/2020/03/can-ho-15840277229265.jpg"
            style="width:100%">
          <div class="poster_trailer">
            <img src="https://tix.vn/app/assets/img/icons/play-video.png" alt="play">
          </div>
        </div>

        <div class="mySlides " onmouseover="pauseTimer()" onmouseout="activateTimer()">
          <div class="poster_overplay-link"></div>
          <img class="poster_img" src="https://s3img.vcdn.vn/123phim/2020/03/sonic-15837387612800.png"
            style="width:100%">
          <div class="poster_trailer">
            <img src="https://tix.vn/app/assets/img/icons/play-video.png" alt="play">
          </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

      </div>
      <div class="all_dot">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>

      </div>
    </div>

    <div id="menu_lichchieu">
    </div>

    <div class="booking">
      <ul class="booking_list">
        <input type="text" name="" value="" class="form-control" style="width: 100%;font-size: 13px" id='ib' placeholder="Tìm kiếm">
        <li>
          <!-- <select class="booking_list_item-phim" name="" id="">
            <option disabled selected value="">Phim</option>
            @foreach ($films as $film)
            <option>{{$film->name}}</option>
            @endforeach
          </select> -->
        </li>
        <li class="booking_list_ctn">
          <select class="booking_list_item" name="" id="">
            <option disabled selected value="">Rạp</option>
          </select>
        </li>
        <li class="booking_list_ctn">
          <select class="booking_list_item" name="" id="">
            <option disabled selected value="">Ngày xem</option>
          </select>
        </li>
        <li class="booking_list_ctn">
          <select class="booking_list_item" name="" id="">
            <option disabled selected value="">Suất chiếu</option>
            @foreach ($showtimes as $show)
            <option>{{$show->start}} ~ {{$show->end}}</option>
            @endforeach
          </select>
        </li>
        <li class="booking_list_ctn">
          <div class="booking_list_item">
            <button class="booking_list_item_btn" style="background-color: red">MUA VÉ NGAY</button>            
          </div>
        </li>
      </ul>

    </div>

    <div class="phim">
      <ul class="phim_title">
        <li class="phim_title_text showfilm phim_title_text-active" id='showing'>Đang Chiếu</li>
        <li class="phim_title_text showfilm" id='commingsoon'>Sắp Chiếu</li>
      </ul>

      <!-- danh sach phim -->
      <div class="load-film">
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
      </div>
    </div>

    <div id="menu_cumrap">
    </div>
    <!-- lich chieu -->
    <div class="lichchieu">
      <div class="back_new">
      </div>
      <div class="lichchieu_content">
        <div class="lichchieu_rap">
          <div class="lichchieu_rap-item">
            <img class="lichchieu_rap-img"
              src="https://s3img.vcdn.vn/123phim/2018/09/cgv-saigonres-nguyen-xi-15380174680358.jpg" alt="rap">
            <div class="lichchieu_rap-title">
              <span class="lichchieu_rap-title-name">CGV Saigonres Nguyễn Xí</span>
              <span class="lichchieu_rap-title-diachi">Tầng 4-5, Saigonres Plaza, 79/81 Nguyễn Xí,Tầng 4-5, Saigonres
                Plaza, 79/81 Nguyễn Xí, P 26, Q Bình Thạnh</span>
            </div>
          </div>
          <div class="lichchieu_rap-item lichchieu_rap-item-active">
            <img class="lichchieu_rap-img"
              src="https://s3img.vcdn.vn/123phim/2018/09/cgv-saigonres-nguyen-xi-15380174680358.jpg" alt="rap">
            <div class="lichchieu_rap-title">
              <span class="lichchieu_rap-title-name">
                Lotte Cinema Nam Sài Gòn
              </span>
              <span class="lichchieu_rap-title-diachi">Tầng 4-5, Saigonres Plaza, 79/81 Nguyễn Xí, P 26, Q Bình
                Thạnh</span>
            </div>
          </div>
          <div class="lichchieu_rap-item">
            <img class="lichchieu_rap-img"
              src="https://s3img.vcdn.vn/123phim/2018/09/cgv-saigonres-nguyen-xi-15380174680358.jpg" alt="rap">
            <div class="lichchieu_rap-title">
              <span class="lichchieu_rap-title-name">CGV IMC Trần Quang Khải</span>
              <span class="lichchieu_rap-title-diachi">Tầng 4-5, Saigonres Plaza, 79/81 Nguyễn Xí, P 26, Q Bình
                Thạnh</span>
            </div>
          </div>
        </div>
        <div class="lichchieu_xuatchieu">
          <div class="lichchieu_xuatchieu-item">
            <div class="lichchieu_xuatchieu_phim">
              <div class="lichchieu_xuatchieu-img">
                <img src="1.jpg" alt="phim">
              </div>
              <div class="lichchieu_xuatchieu-title">
                <div class="lichchieu_xuatchieu-title-header">
                  <span class="lichchieu_xuatchieu-title-dinhdang">C16</span>
                  <span class="lichchieu_xuatchieu-title-name">Nắng 3: Lời Hứa Của ChaNắng 3</span>
                </div>
                <span class="lichchieu_xuatchieu-title-thoiluong">109 phút - TIX 7.9 - IMDb 0</span>
              </div>
            </div>
            <div class="lichchieu_xuatchieu-title-time">
              <div class="lichchieu_xuatchieu-title-time-item">
                <span class="lichchieu_xuatchieu-title-time-formto">
                  <span class="lichchieu_xuatchieu-title-time-start">22:20</span> ~ 23:05</span>
              </div>
            </div>
          </div>
          <div class="lichchieu_xuatchieu-item">
            <div class="lichchieu_xuatchieu_phim">
              <div class="lichchieu_xuatchieu-img">
                <img src="6.jpg" alt="phim">
              </div>
              <div class="lichchieu_xuatchieu-title">
                <div class="lichchieu_xuatchieu-title-header">
                  <span class="lichchieu_xuatchieu-title-dinhdang lichchieu_xuatchieu-title-dinhdang-p">P</span>
                  <span class="lichchieu_xuatchieu-title-name">Nắng 3: Lời Hứa Của Cha</span>
                </div>
                <span class="lichchieu_xuatchieu-title-thoiluong">109 phút - TIX 7.9 - IMDb 0</span>
              </div>
            </div>
            <div class="lichchieu_xuatchieu-title-time">
              <div class="lichchieu_xuatchieu-title-time-item">
                <span class="lichchieu_xuatchieu-title-time-formto">
                  <span class="lichchieu_xuatchieu-title-time-start">22:20</span> ~ 23:05</span>
              </div>
              <div class="lichchieu_xuatchieu-title-time-item">
                <span class="lichchieu_xuatchieu-title-time-formto">
                  <span class="lichchieu_xuatchieu-title-time-start">22:20</span> ~ 23:05</span>
              </div>
              <div class="lichchieu_xuatchieu-title-time-item">
                <span class="lichchieu_xuatchieu-title-time-formto">
                  <span class="lichchieu_xuatchieu-title-time-start">22:20</span> ~ 23:05</span>
              </div>


            </div>
          </div>

          <div class="lichchieu_xuatchieu-item">
            <a href="http://localhost/RapChieuPhim/phim/TG34334">
              <div class="lichchieu_xuatchieu_phim">
                <div class="lichchieu_xuatchieu-img">
                  <img src="2.jpg" alt="phim">
                </div>
                <div class="lichchieu_xuatchieu-title">
                  <div class="lichchieu_xuatchieu-title-header">
                    <span class="lichchieu_xuatchieu-title-dinhdang">C16</span>
                    <span class="lichchieu_xuatchieu-title-name">Nắng 2: Lời Hứa Của Cha</span>
                  </div>
                  <span class="lichchieu_xuatchieu-title-thoiluong">109 phút - TIX 7.9 - IMDb 0</span>
                </div>
              </div>
            </a>
            <div class="lichchieu_xuatchieu-title-time">
              <div class="lichchieu_xuatchieu-title-time-item">
                <span class="lichchieu_xuatchieu-title-time-formto">
                  <span class="lichchieu_xuatchieu-title-time-start">22:20</span> ~ 23:05</span>
              </div>
            </div>
          </div>
          <div class="lichchieu_xuatchieu-item">
            <div class="lichchieu_xuatchieu_phim">
              <div class="lichchieu_xuatchieu-img">
                <img src="2.jpg" alt="phim">
              </div>
              <div class="lichchieu_xuatchieu-title">
                <div class="lichchieu_xuatchieu-title-header">
                  <span class="lichchieu_xuatchieu-title-dinhdang">C16</span>
                  <span class="lichchieu_xuatchieu-title-name">Nắng 3: Lời Hứa Của Cha</span>
                </div>
                <span class="lichchieu_xuatchieu-title-thoiluong">109 phút - TIX 7.9 - IMDb 0</span>
              </div>
            </div>
            <div class="lichchieu_xuatchieu-title-time">
              <div class="lichchieu_xuatchieu-title-time-item">
                <span class="lichchieu_xuatchieu-title-time-formto">
                  <span class="lichchieu_xuatchieu-title-time-start">22:20</span> ~ 23:05</span>
              </div>
            </div>
          </div>
          <div class="lichchieu_xuatchieu-item">
            <div class="lichchieu_xuatchieu_phim">
              <div class="lichchieu_xuatchieu-img">
                <img src="2.jpg" alt="phim">
              </div>
              <div class="lichchieu_xuatchieu-title">
                <div class="lichchieu_xuatchieu-title-header">
                  <span class="lichchieu_xuatchieu-title-dinhdang">C16</span>
                  <span class="lichchieu_xuatchieu-title-name">Nắng 3: Lời Hứa Của Cha</span>
                </div>
                <span class="lichchieu_xuatchieu-title-thoiluong">109 phút - TIX 7.9 - IMDb 0</span>
              </div>
            </div>
            <div class="lichchieu_xuatchieu-title-time">
              <div class="lichchieu_xuatchieu-title-time-item">
                <span class="lichchieu_xuatchieu-title-time-formto">
                  <span class="lichchieu_xuatchieu-title-time-start">22:20</span> ~ 23:05</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="menu_ungdung"></div>
    <!-- ung dung -->
    <div class="app">
      <div class="app_content">
        <div class="app_content-dst">
          <div class="app_content-dst-title">
            Ứng dụng tiện lợi dành cho người yêu điện ảnh
          </div>
          <div class="app_content-dst-textsmall">
            Không chỉ đặt vé, bạn còn có thể bình luận phim và đổi quà hấp dẫn.
          </div>
          <a class="app_content-dst-btn">
            App miễn phí - Tải về ngay!
          </a>
          <div class="app_content-dst-textapp">
            CTC có hai phiên bản <a>iOS</a> & <a>Android</a>
          </div>

        </div>
        <div class="app_content-smp">
          <img class="app_content-smp-home" src="{{asset('src/user/slide10.jpg')}}" alt="hinh">
        </div>
      </div>
    </div>
    <!-- footer -->
    <div class="footer">
            <div class="footer_content">
                <div class="footer_content-CTC">
                    <img class="footer_content-CTC-logo" src="{{asset('src/user/Logo.PNG')}}" alt="">
                    <div class="footer_content-CTC-lienhe">
                        <div class="foofter_content-CTC-name">
                            CTC – SẢN PHẨM CỦA CÔNG TY CỔ PHẦN CT CINEMA
                        </div>
                        <div class="foofter_content-CTC-diachi">
                            Địa chỉ: K2 Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, Tp. Cần Thơ, Việt Nam.
                        </div>
                        <div class="foofter_content-CTC-sdt">
                            Số Điện Thoại (Hotline): 0366 412 344
                        </div>
                        <div class="foofter_content-CTC-email">
                            Email: <span>support@ctc.vn</span>
                        </div>
                    </div>
                </div>
                <div class="footer_content-app">
                    <span class="footer_content-app-tiitle">MOBILE APP</span>
                    <div class="footer_content-app-icons">
                        <img class="footer_content-app-ios" src="{{asset('src/user/apple-logo.png')}}" alt="">
                        <img class="footer_content-app-android" src="{{asset('src/user/android-logo.png')}}" alt="">
                    </div>
                </div>
                <div class="footer_content-social">
                    <span class="footer_content-social-tiitle">SOCIAL</span>
                    <div class="footer_content-social-icons">
                        <img class="footer_content-social-fb" src="{{asset('src/user/facebook-logo.png')}}" alt="">
                        <img class="footer_content-social-zalo" src="{{asset('src/user/zalo-logo.png')}}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
  <div class="modal" style="display: none;">
    <div class="modal_overlay" style="background-color: black; opacity: 0.8"></div>
    <div class="modal_body">
      <div class="modal_inner">
        <div class="modal_inner-ytb" style="display: flex; justify-content: center;margin-top: 5%">
          <img style="position: absolute;right:200px;" onclick="close1()" class="modal_inner-ytb-exit" src="https://tix.vn/app/assets/img/icons/close.png" alt="exit">
          <div id="trailerytb" class="modal_inner-iframe-ytb">
          <iframe class="iframe-ytb" frameborder="0"  allow="autoplay" allowfullscreen></iframe>
          </div>

        </div>
      </div>
    </div>
  </div>
</body>


<script type="text/javascript">
    $('.phim_title_text').on('click',function(){
      //alert()
      $('.phim_title_text').removeClass('phim_title_text-active');
      $(this).addClass('phim_title_text-active')
      const type = $(this).attr('id')
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: path +'user/commingsoon',
          data : {type:type},
          success : function(data) {
            //alert('ok')
            $('.load-film').html(data)
          },
          error : function(error) {
            alert('error')
          }
        })
      })

    $('#ib').on('change',function(){
      const key = $('#ib').val()

      $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: path +'user/find',
          data : {key:key},
          success : function(data) {
            //alert('ok')
            $('.load-film').html(data)
          },
          error : function(error) {
            alert('error')
          }
        })
    })
    
</script>
<script type="text/javascript">

  function openModal(id){
    $(".iframe-ytb").attr('src',link + id + '?autoplay=1');
    $('.modal').css('display','block')
  }
  function close1(){
   $('.modal').css('display','none')
   $(".iframe-ytb").removeAttr('src');
  }
  
</script>

<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  var f = setInterval(function () {
    plusSlides(1)
  }, 3000);

  function pauseTimer() {
    clearInterval(f)
  }

  function activateTimer() {
    f = setInterval(function () {
      plusSlides(1)
    }, 3000);
  }


  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      // slides[i].style.transition = "3s";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    // slides[slideIndex - 1].style.transition = "width 4s";
    dots[slideIndex - 1].className += " active";
  }

  phimindex = 1;
  showphim(phimindex)

  function plusphim(n) {
  	showphim(phimindex += n);
  }

  function showphim(n) {

  	var phims = document.getElementsByClassName("phim_content-row");

  	if (n > phims.length) { 
  		phimindex = 1 
  	}
  	if (n < 1) { 
  		phimindex = phims.length;
  	}	
  	for (var i = 0; i < phims.length; i++) {
  		phims[i].style.display = "none";
  	}
  	phims[phimindex - 1].style.display = "flex";
  }

  //// function detial film

</script>
</html>