@extends('admin/layouts/index')
@section('content')
	  
  <style type="text/css">
    .content { font-family: arial;  }
    .badge{
        width: 90px;
    }
    .table-stats{
        font-family: none;
    }
    .background { background-image: url('/images/posters/');
            background-repeat: no-repeat;
            background-size: cover;
            height: 400px;
            width: 25%;
            border-radius: 5px;
            box-shadow: 10px 10px 10px #ddd;
            border: none;
             }
    .background:hover {
        transform: scale(1.01);
        transition: 0.5s;
    }
    .main-content { width: 100%; }
    .th { --box-shadow: 1px 2px 10px #aaa; }
    .tr:hover { transform: scale(1.01);transition: 0.1s; box-shadow: 1px 1px 10px #ddd; color: #618985 }
    .img { width: 100px; height: 150px; }
    table { width: 100%; box-shadow: 10px 10px 10px #ddd; }
    tr { border-bottom: 1px solid #eee; line-height: 40px; }
    .a { cursor: pointer; }
  </style>

    @if($mess = Session::get('success'))
        <div id='showMessage' style="position: fixed;text-align: right;padding-right: 10%;right: 0px;width: 50%;z-index: 1;margin-top: 15px;" class="alert alert-success">
            {{$mess}}
        </div>
    @endif   
    <div class="content">
        <div style="display: flex; width: 100%">
            <div style="width: 25%; font-size: 20px;"><b>Danh Sách Phim</b></div>
            <div style="width: 55%">
                <b> Tổng phim: </b>{{ $count }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b> Đang chiếu:</b> {{$showing}}
            </div>
            <a href="{{route('admin.film.getadd')}}" class="btn btn-info" style="width: 10%">Thêm</a>
        </div>
        <hr>
        <div class="main-content">
            <table class="">
                <tr class="th">
                    <th style="width: 3%;">#</th>
                    <th style="width: 17%;">Hình</th>
                    <th style="width: 10%;">Mã</th>
                    <th style="width: 20%;">Tên</th>
                    <th style="width: 15%;">Thời gian</th>
                    <th style="width: 20%;">Ngày công chiếu</th>
                    <th style="width: 10%;">Trạng thái</th>
                    <th style="width: 10%;"></th>
                </tr>
                @foreach ($films as $index => $film)
                    <tr style="text-align: left;" class="tr" ondblclick='detail({{$film->id}})'>
                        <td style="width: 3%;">{{$index + 1}}</td>
                        <td style="width: 17%;">
                            <img class="img" src="{{asset('img/poster')}}/{{$film->poster}}">
                        </td>
                        <td style="width: 10%;">{{$film->code}}</td>
                        <td style="width: 20%;">{{$film->name}}</td>
                        <td style="width: 15%;">{{$film->runtime}}'</td>
                        <td style="width: 20%;">{{$film->openday}}</td>
                        <td style="width: 10%;">{{$film->status}}</td>
                        <td style="width: 10%;">
                           <a class="a" onclick='del({{$film->id}})'><img style="width: 20px;height: 20px;" src="{{asset('icon/eraser.png')}}"></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br>
        <div style="display: flex; justify-content: center;">{{$films->links()}}</div>
    </div>

        <script type="text/javascript">
             $(document).ready(function(){
            setTimeout(function(){ 
                $('#showMessage').hide()
            }, 3000);
        });

        function detail(id){
            window.location= path+'admin/film/detail/'+id;
        }

        function del(id){
            window.location= path+'admin/film/delete/'+id;   
        }
        </script>
@endsection