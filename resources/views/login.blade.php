<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/gif"
        href="https://s3img.vcdn.vn/123phim/2018/09/459970ce80ca2c762c8c8076b415c06e.png" />
    <title>Index</title>
    <link rel="stylesheet" href="{{asset('src/user/style.css')}}">
</head>
<body>
    <form method="post" action="{{route('login.post')}}">
        @csrf
    <div class="pageauth">
        <div class="pageauth_form">
            <a href="{{route('user.home')}}">
                <div class="pageauth_form-exit">
                </div>
            </a>
            <div class="pageauth_form-header">
                <img src="https://tix.vn/app/assets/img/login/group@2x.png" alt="">
            </div>
            <div class="pageauth_form-body">
                    <!-- <div class="pageauth_form-body-noti">
                        Email hoặc mật khẩu không tồn tại.
                    </div> -->
                    <div class="pageauth_form-body-group-input">
                        <img class="icon-input" src="{{asset('src/user/password.png')}}" alt="">
                        <input type="text" placeholder="Email" name="email">
                    </div>
                    <div class="pageauth_form-body-noti"></div>
                    <div class="pageauth_form-body-group-input">
                        <img class="icon-input" src="{{asset('src/user/key2.png')}}" alt="">
                        <input type="password" placeholder="Mật Khẩu" name="password">
                    </div>
                    <div class="pageauth_form-body-group-button">                    
                    <a href="{{route('register')}}" class="pageauth_form-body-button" style="text-align: center;color: #fff">Đăng Ký</a>
                    <button type='submit' class="pageauth_form-body-button pageauth_form-body-button-active">
                    Đăng Nhập
                    </button>

                    </div>
            </div>

        </div>
    </div>
    </form>
</body>

</html>