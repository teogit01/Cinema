<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/gif"
        href="https://s3img.vcdn.vn/123phim/2018/09/459970ce80ca2c762c8c8076b415c06e.png" />
    <title>Index</title>
    <link rel="stylesheet" href="{{asset('src/user/style1.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">
        var path = "{{asset('/')}}";
    </script>

</head>


<body>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="page_phim">
        <header class="header">
            <nav class="header_nav">
                <a href="#"><img class="img_logo" src="https://tix.vn/app/assets/img/icons/web-logo.png" alt="logo"></a>
                <ul class="header_list header_list-menu ">
                    <li class="header_item"><a href="{{route('user.home')}}">Trang chủ</a></li>
                    <li class="header_item"><a href="#menu_cumrap">Cụm rạp</a></li>
                    <li class="header_item"><a href="#menu_ungdung">Ứng dụng</a></li>
                </ul>
                <ul class="header_list">
                    @if(!Auth::check())
                    <a href="{{route('login')}}">
                      <li class="header_item header_item-left header_item-separate ">Đăng nhập</li>
                    </a>
                    <a href="{{route('register')}}">
                      <li class="header_item header_item-left">Đăng ký</li>
                    </a>
                    @else
                    <li class="header_item header_item-left">
                        <img class="img_avt" src="https://tix.vn/app/assets/img/avatar.png" alt="avatar">
                        <a href="{{route('user.profile',Auth::id())}}" style="color: #111">
                        <li class="header_item header_item-left header_item-separate">    {{Auth::user()->name}}</li>
                      </a>
                    </li>
                    <a href="{{route('logout')}}">
                      <li class="header_item header_item-left header_item-separat">Đăng xuất</li>
                    </a>
                    @endif
                </ul>
            </nav>
        </header>
        <div class="page_phim_container">
            <img class="page_phim_container-background"
                src="https://s3img.vcdn.vn/123phim/2020/03/can-ho-15840277229265.jpg" alt="">
            <div class="page_phim_container-small">
                <div class="page_phim_container-content">
                    <div class="page_phim_container-content-left">
                        <div class="page_phim_container-content-left-img">
                            <div class="page_phim_container-content-left-play">
                                <img src="https://tix.vn/app/assets/img/icons/play-video.png" alt="play">
                            </div>
                            <img src="{{asset('img/poster')}}/{{$film->poster}}"
                                alt="">
                        </div>
                        <input type="text" name="id_film" value="{{$film->id}}" style="display: none;" id='id_film'>
                        <div class="page_phim_container-content-left-phim">
                            <div class="page_phim_container-content-left-khoichieu">
                              <?php
                                $date=date_create($film->openday);
                                echo date_format($date,"d-m-Y");
                              ?>
                            </div>
                            <div class="page_phim_container-content-left-body">
                                <div class="page_phim_container-content-left-name">
                                    <span class="page_phim_container-content-left-dinhdang">C18+</span>
                                    {{$film->name}}
                                </div>
                                <div class="page_phim_container-content-left-thoiluong">
                                    {{$film->runtime}} phút
                                </div>
                                
                                <a href="#ticket"><div class="page_phim_container-content-left-button">
                                    Mua vé
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="page_phim_container-content-right">
                        <div class="page_phim_container-content-right-diem">
                            <span> {{$film->star ? $film->star : 0}} </span>
                        </div>
                        <div class="page_phim_container-content-right-sao">
                          @if (isset($film->star))

                            <span>{{$film->star}}</span>
                            <div class="phim_content-danhgia-sao">
                            @for($i=0; $i< round($film->star/2); $i++)
                              <img src="https://tix.vn/app/assets/img/icons/star1.png">
                            @endfor
                            </div>
                          @endif
                        </div>
                        <div class="page_phim_container-content-right-soluong"  id='ticket'>
                            {{$rate}} người đánh giá
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page_phim_body">
            <ul class="page_phim_body-title">
                <li class="page_phim_body-title-item" onclick="showDetail(1)">Lịch Chiếu</li>
                <li class="page_phim_body-title-item page_phim_body-title-item-active" onclick="showDetail(2)">Thông Tin</li>
                <li class="page_phim_body-title-item" onclick="showDetail(3)">Đánh Giá</li>
            </ul>
            <div class="page_phim_body-content">
                <div class="page_phim_body-content-lichchieu">
                    <div class="page_phim_body-content-lichchieu-ngay">


                      @for($i = 0; $i < count($dates); $i++)
                        <div data-day='{{$dates[$i]}}' class="page_phim_body-content-lichchieu-ngay-item page_phim_body-content-lichchieu-ngay-item lichchieu" id='{{$i}}'>
                            <span class="page_phim_body-content-lichchieu-ngay-item-thu">
                              @switch($i)
                                @case(0)
                                  Chủ Nhật
                                  @break
                                @case(1)
                                  Thứ Hai
                                  @break
                                @case(2)
                                  Thứ Ba
                                  @break
                                @case(3)
                                  Thứ Tư
                                  @break
                                @case(4)
                                  Thứ Năm
                                  @break
                                @case(5)
                                  Thứ Sáu
                                  @break
                                @default
                                Thứ Bảy
                              @endswitch
                            </span> 
                            <span class="page_phim_body-content-lichchieu-ngay-item-ngay">
                            <?php
                                $date=date_create($dates[$i]);
                                echo date_format($date,"d");
                              ?>
                            </span>                       
                        </div>
                      @endfor
                      
                    </div>
                    <div class="page_phim_body-content-lichchieu-right load-showtime">
                          <div class="page_phim_body-content-lichchieu-right-item">
                            <div class="page_phim_body-content-lichchieu-right-rap">
                              <div class="page_phim_body-content-lichchieu-right-img">
                               
                              </div>
                              <div class="page_phim_body-content-lichchieu-right-title"s>
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
                                  <span class="page_phim_body-content-lichchieu-right-time-start" onclick="test()">{{$showM->start}}</span> ~ {{$showM->end}}</span>
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
                              <div class="page_phim_body-content-lichchieu-right-time-item" >
                                <span class="page_phim_body-content-lichchieu-right-time-formto"onclick="checkout({{$showE->id}})" >
                                  <span class="page_phim_body-content-lichchieu-right-time-start">{{$showE->start}}</span> ~ {{$showE->end}}</span>
                              </div>
                              @endforeach
                            </div>
                          </div>
                    </div>
                </div>
                <div class="page_phim_body-content-thongtin">
                    <div class="page_phim_body-content-thongtin-left">
                        <div class="page_phim_body-content-thongtin-item">
                            <div class="page_phim_body-content-thongtin-item-header">
                                Ngày phát hành:
                            </div>
                            <div class="page_phim_body-content-thongtin-item-body">
                              <?php
                                $date=date_create($film->openday);
                                echo date_format($date,"d-m-Y");
                              ?>
                            </div>
                        </div>
                        <div class="page_phim_body-content-thongtin-item">
                            <div class="page_phim_body-content-thongtin-item-header">
                                Đạo diễn:
                            </div>
                            <div class="page_phim_body-content-thongtin-item-body">
                                {{$film->director}}
                            </div>
                        </div>
                        <div class="page_phim_body-content-thongtin-item">
                            <div class="page_phim_body-content-thongtin-item-header">
                                Diễn viên:
                            </div>
                            <div class="page_phim_body-content-thongtin-item-body">
                                {{$film->cast}}
                            </div>
                        </div>
                        <div class="page_phim_body-content-thongtin-item">
                            <div class="page_phim_body-content-thongtin-item-header">
                                Thể Loại:
                            </div>
                            <div class="page_phim_body-content-thongtin-item-body">
                                @foreach($film_genre as $key => $genre)
                                  @if ($key == $film_genre->count()-1)
                                    {{$genre->genre->name}}
                                  @else
                                    {{$genre->genre->name}}, 
                                  @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="page_phim_body-content-thongtin-item">
                            <div class="page_phim_body-content-thongtin-item-header">
                                Quốc Gia SX:
                            </div>
                            <div class="page_phim_body-content-thongtin-item-body">
                                @foreach($film_country as $key => $country)
                                  @if ($key == $film_country->count()-1)
                                    {{$country->country->name}}
                                  @else
                                    {{$country->country->name}}, 
                                  @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="page_phim_body-content-thongtin-noidung">
                        <div class="page_phim_body-content-thongtin-noidung-header">
                            Nội dung
                        </div>
                        <div class="page_phim_body-content-thongtin-noidung-body">
                            {!! $film->trailer !!}
                            Bộ phim kể về một nhân viên bảo vệ ngân hàng bị cuốn vào cuộc mưu sát tổng thống của 
                            bọn khủng bố. Mặc dù là nhân viên bảo vệ ngân hàng, nhưng anh từng là một cựu đặc vụ 
                            với những kĩ năng chiến đấu cực kỳ ấn tượng nên anh đã cứu tổng thống và rơi vào tầm ngắm 
                            của bọn khủng bố. Một cuộc truy đuổi bắt đầu.
                        </div>
                    </div>
                </div>
                <div class="page_phim_body-content-danhgia">
                    <div class="page_phim_body-content-danhgia-ct" onclick="danhgiasao()">
                        <img class="page_phim_body-content-danhgia-ct-avt"
                            src="https://tix.vn/app/assets/img/avatar.png" alt="">
                        <div class="page_phim_body-content-danhgia-ct-cmt">
                            Bạn nghĩ gì về phim này?
                        </div>
                        <div class="page_phim_body-content-danhgia-ct-sao">
                            <img src="https://tix.vn/app/assets/img/icons/star1.png">
                            <img src="https://tix.vn/app/assets/img/icons/star1.png">
                            <img src="https://tix.vn/app/assets/img/icons/star1.png">
                            <img src="https://tix.vn/app/assets/img/icons/star1.png">
                            <img src="https://tix.vn/app/assets/img/icons/star1.png">
                        </div>

                    </div>
                    <div class="page_phim_body-content-danhgia-mn">
                      @foreach($rates as $rate )

                        <div class="page_phim_body-content-danhgia-mn-item">
                            <div class="page_phim_body-content-danhgia-mn-header">
                              @if(!$rate->user->avatar)
                                <img class="page_phim_body-content-danhgia-mn-avt"
                                    src="https://tix.vn/app/assets/img/avatar.png"
                                    alt="avt">
                              @else
                              <img class="page_phim_body-content-danhgia-mn-avt"
                                    src="{{asset('img/avatar')}}/{{$rate->user->avatar}}"
                                    alt="avt">
                              @endif
                                <div class="page_phim_body-content-danhgia-mn-left">
                                    <div class="page_phim_body-content-danhgia-mn-left-name">
                                        {{$rate->user->name}}
                                    </div>
                                    <div class="page_phim_body-content-danhgia-mn-left-time">
                                        {{$rate->created_at}}
                                    </div>
                                </div>
                                <div class="page_phim_body-content-danhgia-mn-right">
                                    <div class="page_phim_body-content-danhgia-mn-right-diem">
                                        7
                                    </div>
                                    <div class="page_phim_body-content-danhgia-mn-right-sao">
                                        <img src="https://tix.vn/app/assets/img/icons/star1.png">
                                        <img src="https://tix.vn/app/assets/img/icons/star1.png">
                                        <img src="https://tix.vn/app/assets/img/icons/star1.png">
                                    </div>
                                </div>
                            </div>
                            <div class="page_phim_body-content-danhgia-mn-cmt">
                                {{$rate->comment}}
                            </div>
                        </div>

                      @endforeach
                        <div class="page_phim_body-content-danhgia-mn-xemthem">Xem Thêm</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer_content">
                <div class="footer_content-CTC">
                    <img class="footer_content-CTC-logo" src="Logo.PNG" alt="">
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
    <div id="modal" class="modal">
        <div onclick="exitmodal()" class="modal_overlay"></div>
        <div class="modal_body">
            <div class="modal_inner">

                <div class="modal_inner-ytb">
                    <img onclick="exitmodal()" class="modal_inner-ytb-exit" src="./image/userimg/close.png" alt="exit">
                    <div id="trailerytb" class="modal_inner-iframe-ytb">
                    </div>
                </div> 
                <!-- <div class="modal_inner-check">
                    <div onclick="exitmodal()" class="modal_inner-exit">
                        <img src="./image/userimg/xController.png" alt="">
                    </div>
                    <div class="modal_inner-check-content">Bạn cần phải đăng nhập.</div>
                    <div onclick="linklogin()" class="modal_inner-check-button">Đăng Nhập</div>
                </div>   -->                 
                <form action="{{route('user.rate')}}" method="post" >
                    <div class="modal_inner-danhgia">
                        <div onclick="exitmodal()" class="modal_inner-exit">
                            <img src="https://tix.vn/app/assets/img/icons/xController.png" alt="exit">
                        </div>
                        <input value="{{$film->id}}" type="hidden" name="id_film">
                        <input value="0" class="modal_inner-danhgia-diem-input" type="hidden" name="star">
                        <div class="modal_inner-danhgia-diem">
                            1.0
                        </div>
                        <div class="modal_inner-danhgia-sao">
                          @for($i=0; $i<10; $i++)
                            @if ($i % 2 == 0)
                            <div onclick="clicksaoinput({{$i}})" id='{{$i}}' onmouseover="hoversaoinput({{$i}})" onmouseout="unhoversaoinput({{$i}})"
                                class="modal_inner-danhgia-sao-part star-left">
                                <img class="modal_inner-danhgia-sao-left"
                                    src="https://tix.vn/app/assets/libs/star-rating/StarSelect.png">
                            </div>
                            @else
                            <div onclick="clicksaoinput({{$i}})" id='{{$i}}' onmouseover="hoversaoinput({{$i}})" onmouseout="unhoversaoinput({{$i}})"
                                class="modal_inner-danhgia-sao-part star-right">
                                <img class="modal_inner-danhgia-sao-right"
                                    src="https://tix.vn/app/assets/libs/star-rating/StarSelect.png">
                            </div>
                            @endif
                            @endfor
                        </div>
                        <div class="modal_inner-danhgia-binhluan">
                            <textarea class="modal_inner-danhgia-binhluan-input" name="comment" placeholder="Nói mọi người biết bạn nghĩ gì về phim này..."></textarea>
                        </div>
                        <div class="modal_inner-danhgia-button">
                            <button>ĐĂNG</button>
                        </div>
                    </div>                         
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
</body>
<script>

    var inputvalue = 1
    clicksaoinput(inputvalue);

    function clicksaoinput(num) {
        var input = document.getElementsByClassName('modal_inner-danhgia-diem-input');
        var diem = document.getElementsByClassName('modal_inner-danhgia-diem');
        inputvalue = num;
        input[0].value = num;
        if (num == 10) {
            diem[0].innerHTML = num;
        } else {
            diem[0].innerHTML = num + '.0';
        }
        hoversaoinput(num);
    }

    function hoversaoinput(num) {
        alert(num)
        var saopart = document.getElementsByClassName('modal_inner-danhgia-sao-part');
        for (var i = 0; i < saopart.length; i++) {
            saopart[i].style.opacity = '0.4';
        }
        var saopart = document.getElementsByClassName('modal_inner-danhgia-sao-part');
        for (var i = 0; i < num; i++) {
            saopart[i].style.opacity = '1';
        }
    }

    function unhoversaoinput() {
        clicksaoinput(inputvalue);
    }


  /// show info film

  showDetail(1)
  
  function showDetail(number){
    var lichchieu = document.getElementsByClassName('page_phim_body-content-lichchieu')[0]
    var danhgia = document.getElementsByClassName('page_phim_body-content-danhgia')[0]
    var thongtin = document.getElementsByClassName('page_phim_body-content-thongtin')[0]
    var title = document.getElementsByClassName('page_phim_body-title-item')
    for (i=0; i<3; i++){
      title[i].className = title[i].className.replace(' page_phim_body-title-item-active','') 
    }
    title[number-1].className+= ' page_phim_body-title-item-active' 
    switch (number){
      case 1:
        lichchieu.style.display = 'flex'
        danhgia.style.display = 'none'
        thongtin.style.display = 'none'
        break;
      case 3:
        lichchieu.style.display = 'none'
        danhgia.style.display = 'flex'
        thongtin.style.display = 'none'
        break;
      case 2:
        lichchieu.style.display = 'none'
        danhgia.style.display = 'none'
        thongtin.style.display = 'flex'
        break;
    }
  }

  // get today
  $(document).ready(function(){
    const today = new Date().getDay();
    $('#'+today).addClass('page_phim_body-content-lichchieu-ngay-item-active')
  })

  //load lich chieu
  $('.lichchieu').on('click',function(){
    $('.lichchieu').removeClass('page_phim_body-content-lichchieu-ngay-item-active')
    $(this).addClass('page_phim_body-content-lichchieu-ngay-item-active')
    
    const day = $(this).attr('data-day')
    const id_film = {{$film->id}}
    
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: path +'user/showtime/find',
        data : {day:day,id_film:id_film},
        success : function(data) {
          //alert('ok')
          $('.load-showtime').html(data)
        },
        error : function(error) {
          alert('error')
        }
      })
  })


  //  ddanh gia sao
  function danhgiasao(){    
        clicksaoinput({{round($film->star)}});        
        document.getElementsByClassName("modal_inner-danhgia-binhluan-input")[0].value='';
        document.getElementsByClassName("modal_inner-danhgia")[0].style.display='flex';
        document.getElementById("modal").style.display='flex';

  }

  function clicksaoinput(num) {
      var input = document.getElementsByClassName('modal_inner-danhgia-diem-input');
      var diem = document.getElementsByClassName('modal_inner-danhgia-diem');
      inputvalue = num;
      input[0].value = num;
      if (num == 10) {
        diem[0].innerHTML = num;
      } else {
        diem[0].innerHTML = num + '.0';
      }
      hoversaoinput(num);
  }

  function hoversaoinput(num) {
      var saopart = document.getElementsByClassName('modal_inner-danhgia-sao-part');
      for (var i = 0; i < saopart.length; i++) {
        saopart[i].style.opacity = '0.4';
      }
      var saopart = document.getElementsByClassName('modal_inner-danhgia-sao-part');
      for (var i = 0; i < num; i++) {
        saopart[i].style.opacity = '1';
      }

  }

  function unhoversaoinput() {
    clicksaoinput(inputvalue);
  }
   
  function exitmodal(){ 
    document.getElementById("trailerytb").innerHTML= '';
    document.getElementById("modal").style.display='none';
    document.getElementsByClassName("modal_inner-ytb")[0].style.display='none';
    document.getElementsByClassName("modal_inner-check")[0].style.display='none';        
    document.getElementsByClassName("modal_inner-danhgia")[0].style.display='none';

  }

</script>
<script type="text/javascript">
   function checkout(id_showtime){
    const id_film = $('#id_film').val();
    //alert()
    window.location = path+'user/checkout/'+{{Auth::id()}}+'/'+id_film+'/'+id_showtime;
  }
</script>

</html>