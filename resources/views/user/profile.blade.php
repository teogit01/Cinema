<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/gif"
    href="https://s3img.vcdn.vn/123phim/2018/09/459970ce80ca2c762c8c8076b415c06e.png" />
  <title>Index</title>
  <link rel="stylesheet" href="{{asset('src/user/style.css')}}">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <style type="text/css">
    table { width: 100%;text-align: left; padding-left: 10%}
    th,td { border-bottom: 1px solid #ddd; line-height: 35px;padding-left: 5% }
    th { width: 25%; text-align: right; }
    td { padding-left: 15% }
    button, label { width: 90px; height: 30px;border-radius: 5px; border: none; }
    input { width: 100%;border: none; background-color: #fff }
    input:focus { outline: none }
    .div:hover { cursor: pointer; }
    button:hover { cursor: pointer; }
  </style>
</head>

<body>
  <div class="pagehome">
    <header class="header">
      <nav class="header_nav">
        <a href="#"><img class="img_logo" src="https://tix.vn/app/assets/img/icons/web-logo.png" alt="logo"></a>
        <ul class="header_list header_list-menu ">
          <li class="header_item"><a href="{{route('user.home')}}">Trang chủ</a></li>
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

    <div style="width: 100%;height: 500px;margin-top: 5%;padding-top:90px;--background-color: red">
     @if($message = Session::get('success'))
     <div id='showMessage'
     style="background-color: #6494AA;border-radius: 5px;color: white;position: fixed;width: 50%;padding: 7px; padding-left: 50px;right: 0;top: 10%;z-index: 1">
     <span>{{$message}}</span>
   </div>
   @endif
      <form method="post" action="{{route('user.profile.edit')}}" enctype="multipart/form-data">
            @csrf
      <div style="width: 100%;display: flex;">
        <div style="width: 30%;">
          @if ($user->avatar == null)
          <div style="margin-left: 40%;margin-top: 7%;">
            <img src="https://via.placeholder.com/200x250">
          </div>
          @else
          <div style="margin-left: 40%;margin-top: 7%;">
            <img style="width: 200px; height: 270px" src="{{asset('img/avatar')}}/{{$user->avatar}}">
          </div>
          @endif
          <div style="width: 100%; margin-left: 40%;margin-top: 7%;">
            <input type="file" name="avatar">
          </div>
        </div>
        <div style="width: 70%;">
          <table>
            <tr>
              <th>Mã:</th>
              <td><input type="text" name='' placeholder='{{$user->code}}' autocomplete="off" disabled></td>
            </tr>
            <tr>
              <th>Tên:</th>
              <td><input type="text" name='name' placeholder='{{$user->name}}' autocomplete="off" disabled class="open"></td>
            </tr>
            <tr>
              <th>Sđt:</th>
              <td><input type="text" name='phone' placeholder='{{$user->phone}}' autocomplete="off" disabled class="open"></td>
            </tr>
            <tr>
              <th>Email:</th>
              <td><input type="text" name='email' placeholder='{{$user->email}}' autocomplete="off" disabled class=""></td>
            </tr>
            <tr>
              <th>Ngày sinh:</th>
              <td><input type="date" name='birthday' style="width: 50%" value='{{$user->birthday}}' disabled class="open"></td>
            </tr>
            <tr>
              <th>Địa chỉ:</th>
              <td><input type="text" name='address' placeholder='{{$user->address}}' autocomplete="off" disabled class="open"></td>
            </tr>
            <tr>
              <th>Điểm:</th>
              <td><input type="text" name='point' placeholder='{{$user->point}}' disabled ></td>
            </tr>
          </table>
          <br>
          <div style="width: 100%;display:flex;justify-content: center;">
            <div class="div" id='edit' style="background-color: #53917E; width: 90px; height: 30px;border-radius: 5px; border: none;text-align: center;padding-top: 6px;font-size: 14px;">Sửa</div>&nbsp;&nbsp;
            <button type="submit" style="background-color: #6494AA">Lưu</button>
          </div>
        </div>
      </div>
      </form>
      
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
          <img class="footer_content-CTC-logo" src="{{asset('src/user/Logo.png')}}" alt="">
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
            <img class="footer_content-app-ios" src="apple-logo.png" alt="">
            <img class="footer_content-app-android" src="android-logo.png" alt="">
          </div>
        </div>
        <div class="footer_content-social">
          <span class="footer_content-social-tiitle">SOCIAL</span>
          <div class="footer_content-social-icons">
            <img class="footer_content-social-fb" src="facebook-logo.png" alt="">
            <img class="footer_content-social-zalo" src="zalo-logo.png" alt="">
          </div>
        </div>

      </div>
    </div>
  </div>
</body>


<script type="text/javascript">
  $(document).ready(function(){
    setTimeout(function(){
      $('#showMessage').hide()            
    },2000)
  })

  $('#edit').on('click',function(){
    $('.open').removeAttr("disabled");
    $('.open')[0].focus();
  })

</script>
</html>