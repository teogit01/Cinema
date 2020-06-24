@extends('admin/layouts/index')
@section('content')
  <style type="text/css">
    .content { font-size: 15px; }
    .force{
    	color: red;
    }
	::placeholder {
  		color: red;
	}	
  </style>
    
    @if($mess = Session::get('success'))
        <div id='showMessage' style="position: fixed;text-align: right;padding-right: 10%;right: 0px;width: 50%;z-index: 1;margin-top: 15px;" class="alert alert-success">
            {{$mess}}
        </div>
    @endif   
  <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <h2>Thêm Phim</h2>
                        <hr>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-fiv">
                                    <div class="stat-content">
                                        <form action="{{route('admin.film.add')}}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">

                                            	<div class="col-sm-12 row">
                                            		<div class="col-sm-2" >
                                                		<label class="">Tên</label><span class="force">*</span>
                                                	</div>
                                                	
                                                	<input type="text" name="name" class="form-control col-sm-10" placeholder="Nhập tên" autocomplete="off">
                                                </div>
												<br>
                                                <div class="col-sm-12 row">
                                            		<div class="col-sm-2" >
                                                		<label>Thời lượng</label><span class="force">*</span>
                                                	</div>                                                	
                                                	<input type="number" name="runtime" class="form-control col-sm-10"autocomplete="off" placeholder="Thời lượng" >
                                                </div>
												<br>
                                                <div class="col-sm-12 row">
                                            		<div class="col-sm-2" >
                                                		<label>Đạo diễn</label><span class="force">*</span>
                                                	</div>                                                	
                                                	<input type="text" name="director" class="form-control col-sm-10" placeholder="Đạo diễn" autocomplete="off" >
                                                </div>	

                                                <br>
                                                <div class="col-sm-12 row">
                                            		<div class="col-sm-2" >
                                                		<label>Diễn viên</label><span class="force">*</span>
                                                	</div>                                                	
                                                	<input type="text" name="cast" class="form-control col-sm-10" placeholder="Diễn viên" >
                                                </div>	
                                                <br>
                                                <div class="col-sm-12 row">
                                                    <div class="col-sm-2" >
                                                        <label for=''>Giá vé</label><span class="force">*</span>
                                                    </div>                                                  
                                                    <input type="number" id="" name="price" class="form-control col-sm-6" placeholder="55.000" autocomplete='off' value="">
                                                </div>      

                                                <br>
                                                <div class="col-sm-12 row">
                                            		<div class="col-sm-2" >
                                                		<label for='day'>Ngày chiếu</label><span class="force">*</span>
                                                	</div>                                                	
                                                	<input type="date" id="day" name="openday" class="form-control col-sm-6" placeholder="Ngày công chiếu" autocomplete='off' value="{{date('Y-m-d')}}">
                                                </div>	
                                                        
                                                <br>
                                                <div class="col-sm-12 row">
                                            		<div class="col-sm-2" >
                                                		<label>Thể loại</label><span class="force">*</span>
                                                	</div>                                                	
                                                	<select data-style="btn-outline" style="background-color: #fff" title="Thể Loại" name="genre[]" class="form-control col-sm-6 selectpicker"multiple data-selected-text-format="">
                                                    	@foreach($genres as $genre)
                                                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                                                        @endforeach
                                                	</select>
                                                </div>	                                       
                                                <br>
                                                <div class="col-sm-12 row">
                                            		<div class="col-sm-2" >
                                                		<label>Quốc gia</label><span class="force">*</span>
                                                	</div>
                                                	<select data-style="btn-outline"title="Quốc gia"  name="country[]" class="form-control col-sm-6 selectpicker"multiple data-selected-text-format="">
                                                		@foreach($countrys as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                	</select>
                                                </div>	

                                                <br>
                                                <div class="col-sm-12 row">
                                                    <div class="col-sm-2" >
                                                        <label>poster</label><span class="force">*</span>
                                                    </div>                                                  
                                                    <input type="file" name="poster" multiple class="form-control col-sm-10" >
                                                </div>  
                                                <br>
                                                <div class="col-sm-12 row">
                                                    <div class="col-sm-2" >
                                                        <label>Trailer</label><span class="force"></span>
                                                    </div>                                                  
                                                    <input type="text" name="trailer" class="form-control col-sm-10" >
                                                </div>  

                                                <br>
                                                <div class="col-sm-12 row">
                                            		<div class="col-sm-2" >
                                                		 <label>Tóm tắt</label><span class="force">*</span>
                                                	</div>
                                                	<div class="col-sm-10" style="padding:0">                                                	
                                                		<textarea class="form-control" name="description"id="trailer"></textarea>
                                                	</div>
                                                </div>	
                                            </div>
                                            <div class="">
                                            	<button style="width: 10%;float:right;margin-right: 10%" class="btn btn-primary">Lưu</button>
                                            	<a style="width: 10%;float:right;margin-right: 10px" class="btn btn-info">Huỷ</a>
                                            	<a href="{{route('admin.film.list')}}" style="width: 10%;float:right; margin-right: 10px;" class="btn btn-outline-secondary">Quay Lại</a>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Widgets -->
            </div>
            <!-- .animated -->
        </div>
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){ 
                $('#showMessage').hide()
            }, 2000);
        });

        $('#openday').datepicker({
            //showAnim: 'drop',
            //dateFormat: 'dd/mm/yy',
            format: "dd/mm/yyyy",
            todayHighlight: true,
            autoclose: true,
            clearBtn: true,
            
        });
        CKEDITOR.replace( 'trailer' );

    </script>    

@endsection