<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/gif"
        href="https://s3img.vcdn.vn/123phim/2018/09/459970ce80ca2c762c8c8076b415c06e.png" />
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <title>Index</title>
    <link rel="stylesheet" href="{{asset('src/user/style.css')}}">
    <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('imgavt');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <style type="text/css">
    	.gender { text-decoration: line-through }
    </style>
</head>

<body>
    <div class="pageauth">
        <div class="pageauth_form pageauth_form-dk">
            <a href="{{route('user.home')}}">
                <div class="pageauth_form-exit">
                </div>
            </a>
            <div class="pageauth_form-header">
                <img src="https://tix.vn/app/assets/img/login/group@2x.png" alt="">
            </div>
            <form method="post" action="{{route('register.post')}}" enctype="multipart/form-data">
            	@csrf
            <div class="pageauth_form-body pageauth_form-body-dk">
                <div class="pageauth_form-body-flex">
                    <!-- email -->
                    <div class="pageauth_form-body-group-input">
                        <img class="icon-input" src="{{asset('src/user/password.png')}}" alt="">
                        <input type="text" placeholder="Nhập email" name="email">
                    </div>
                    <div class="pageauth_form-body-noti"></div>
                    <!-- mat khau -->
                    <div class="pageauth_form-body-group-input ">
                        <img class="icon-input" src="{{asset('src/user/key2.png')}}" alt="">
                        <input type="password" placeholder="Nhập mật khẩu" name="password">
                    </div>
                    <div class="pageauth_form-body-noti"></div>
                    <!-- remat khau -->
                    <div class="pageauth_form-body-group-input">
                        <img class="icon-input"  src="{{asset('src/user/key2.png')}}" alt="">
                        <input type="password" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="pageauth_form-body-noti"></div>
                    <!-- avatar -->
                    <div class="pageauth_form-body-group-input ">
                        <img class="icon-input" id="imgavt" src="{{asset('src/user/avatar.png')}}" alt="">
                        <input onchange="preview_image(event)" accept="image/png, image/jpeg"
                            class="pageauth_form-body-group-input-file" type="file" placeholder="Chọn ảnh" name="avatar">
                    </div>

                </div>
                <div class="pageauth_form-body-flex">
                    <!-- ho ten -->
                    <div class="pageauth_form-body-group-input">
                        <img class="icon-input" src="{{asset('src/user/user.png')}}" alt="">
                        <input type="text" placeholder="Nhập họ tên" name='name'>
                    </div>
                    <div class="pageauth_form-body-noti"></div>
                    <!-- sdt -->
                    <div class="pageauth_form-body-group-input">
                        <img class="icon-input" src="{{asset('src/user/phone1.png')}}" alt="">
                        <input type="text" placeholder="Nhập số điện thoại" name='phone'>
                    </div>
                    <div class="pageauth_form-body-noti"></div>
                    <!-- ngay sinh -->
                    <div class="pageauth_form-body-group-input">
                        <img class="icon-input" src="{{asset('src/user/event.png')}}" alt="">
                        <input value="{{date('Y-m-d')}}" type="date" placeholder="Nhập ngày sinh" name='birthday'>
                    </div>
                    <div class="pageauth_form-body-noti"></div>
                    <!-- gioi tinh -->
                    <div class="pageauth_form-body-group-radio">
                        <label class="pageauth_form-body-radio" >
                            <input type="radio" name="gender" id="male" value="male">
                            <img class="icon-input icon-input-radio" onclick="remo('gender1','gender2')" src="{{asset('src/user/sex.png')}}" alt="">
                            <span class="gender" id='gender1'>Nam</span>
                        </label>
                        <label class="pageauth_form-body-radio" >
                            <input type="radio" class="gender" name="gender" id="female" value="female">
                            <img class="icon-input icon-input-radio" onclick="remo('gender2','gender1')" src="{{asset('src/user/sex1.png')}}" alt="">
                            <span class="gender" id='gender2'>Nữ</span>
                        </label>
                    </div>

                    <div class="pageauth_form-body-group-button">
                        <button class="pageauth_form-body-button">Đăng Nhập</button>
                        <button class="pageauth_form-body-button pageauth_form-body-button-active">
                            Đăng Ký
                        </button>
                    </div>
                </div>
            </div>
        	</form>
        </div>
    </div>

   	<script type="text/javascript">
   		
   		function remo(id1,id2){
   			$('#'+id1).removeClass('gender')
   			$('#'+id2).removeClass('gender')
   			$('#'+id2).addClass('gender')
   			//alert(id)
   		}
   	</script>
</body>

</html>