@extends('admin/layouts/index')
@section('content')
	  
  <style type="text/css">
    .content { font-family: arial; font-size: 15px; }
    .badge{
        width: 90px;
    }
    .main-content { width: 100%; display: flex; }
    .left { width: 60%; box-shadow: 10px 10px 10px #ddd; height: 600px; }
    .right { width: 40%;box-shadow: 10px 10px 10px #ddd;text-align: center; height: 500px;}

    .th { --box-shadow: 1px 2px 10px #aaa; }
    .tr:hover { transform: scale(1.01);transition: 0.1s; box-shadow: 1px 1px 10px #ddd; color: #618985 }
    table { width: 100%; }
    tr { border-bottom: 1px solid #eee; line-height: 40px; }
    th { width: 35% }
    td { width: 65% }
    input { border: none; width: 100%; background-color: #fff }
    input:focus { outline: none;--display: none }
  </style>

    @if($mess = Session::get('success'))
        <div id='showMessage' style="position: fixed;text-align: right;padding-right: 10%;right: 0px;width: 50%;z-index: 1;margin-top: 15px;" class="alert alert-success">
            {{$mess}}
        </div>
    @endif   
    <div class="content">
        <div style="display: flex;">
            <h5 style="width: 80%">Chi tiết phim "{{$film->name}}"</h5>
            <!-- <a href="{{route('admin.film.getadd')}}" class="btn btn-info" style="width: 10%">Thêm</a> -->
        </div>
        <hr>
        <div class="main-content">
          <div class="left">
          	<form action="{{route('admin.film.edit',$film->id)}}" method="post" enctype="multipart/form-data">
			@csrf
          	<table>
          		<tr>
          			<th>Mã</th>
          			<td><input type="text" name="code" placeholder="{{$film->code}}" disabled></td>
          		</tr>
          		<tr>
          			<th>Tên</th>
          			<td><input type="text" name="name" class="open" value="" placeholder="{{$film->name}}" disabled autocomplete="off"></td>
          		</tr>
              <tr>
                <th>Giá vé</th>
                <td><input type="number" name="price" class="open" value="" placeholder="{{number_format($film->price,3,'.','')}}" disabled autocomplete="off"></td>
              </tr>
          		<tr>
          			<th>Đạo diễn</th>
          			<td><input type="text" name="director" class="open" value="" placeholder="{{$film->director}}" disabled autocomplete="off"></td>
          		</tr>
          		<tr>
          			<th>Diễn viên</th>
          			<td><input type="text" name="cast" class="open" value="" placeholder="{{$film->cast}}" disabled autocomplete="off"></td>
          		</tr>
          		<tr>
          			<th>Thời gian</th>
          			<td><input type="number" name="runtime" class="open" value="" placeholder="{{$film->runtime}}" disabled autocomplete="off"></td>
          		</tr>
          		<tr>
          			<th>Ngày công chiếu</th>
          			<td><input type="date" name="openday" class="open" value="{{$film->openday}}" disabled autocomplete="off"></td>
          		</tr>
              <tr>
                <th>Thể loại</th>
                <td>
                  <select class="form-control selectpicker" style="background-color: #aaa " multiple data-size="auto" title="   @foreach($genres as $genre)
                                               {{$genre}}, 
                                              @endforeach"
                                  name="genre[]">
                        
                      @foreach($genres as $genre)
                        <option>{{$genre}}</option>
                      @endforeach
                        <option data-divider="true"></option>
                        @foreach($diffGenre as $dgenre)
                        <option>{{$dgenre}}</option>
                      @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th>Quốc gia</th>
                <td>
                  <select class="form-control selectpicker" style="background-color: #aaa " multiple data-size="auto" title="   @foreach($countrys as $country)
                                               {{$country}}, 
                                              @endforeach"
                                  name="country[]">
                        
                      @foreach($countrys as $country)
                        <option>{{$country}}</option>
                      @endforeach
                        <option data-divider="true"></option>
                      @foreach($diffCountry as $dcountry)
                        <option>{{$dcountry}}</option>
                      @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th>Trailer</th>
                <td><input type="text" name="trailer" class="open" value="" placeholder="{{$film->trailer}}" disabled autocomplete="off" ></td>
              </tr>
          		<tr>
          			<th>Trạng thái</th>
          			<td><input type="number" name="status" class="open" value="" placeholder="{{$film->status}}" disabled autocomplete="off" max="1" min="0"></td>
          		</tr>
          		<tr>
          			<th>Tóm tắt</th>
          			<td>
          				<input id="description" type="text" name="description" class="open" value="" disabled placeholder="{{ $film->description }}" autocomplete="off">
          			</td>
          		</tr>
          		<tr>
          	</table>
          	<br>
          	<div style="display: flex;justify-content: flex-end;align-items:center;margin-right: 10px;">
          		<a href={{route("admin.film.list")}} class="btn btn-secondary" style="width: 20%;margin-left: 10px">Quay lại</a>
          		<a  class="btn btn-info" id='edit' style="width: 20%;margin-left: 10px;color: #fff">Sửa</a>
          		<button class="btn btn-primary" style="width: 20%;margin-left: 10px">Lưu</button>
          	</div>
          </div>
          <div class="right">
          	<img style="width: 70%;height: 80%;" src="{{asset('img/poster')}}/{{$film->poster}}">
          	<br>
          	<br>
          	<input type="file" name="image" class="form-contro" style="text-align: center;width: 60%;">
          </div>
        </div>
       </form>
    </div>

        <script type="text/javascript">
             $(document).ready(function(){
            setTimeout(function(){ 
                $('#showMessage').hide()
            }, 2000);
        });

        function detail(id){
            window.location= path+'admin/film/detail/'+id;
        }
        // edit
        $('#edit').on('click',function(){
        	
        	$('.open').removeAttr('disabled')
            $('.open')[0].focus();
        })

        var trailer = document.getElementById('trailer');
        //alert(trailer.placeholder)
        trailer.placeholder = trailer.placeholder.replace("<p>", "");
        trailer.placeholder = trailer.placeholder.replace("</p>", "");

        </script>
@endsection