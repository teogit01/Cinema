<!DOCTYPE html>
<html>
<head>
  @include ('admin/layouts/head')
</head>
<body>

  <div class="main">
    <div>
      
      @include ('admin/layouts/left')

      <div id="right-panel" class="right-panel" style="background-color: white">
  
     	@include ('admin/layouts/header')

        
        <div class="clearfix"></div>
        
    		<!-- <%- include ('layouts/footer') %> -->
        <div  style="width: 100%;">  
          @yield('content')
        </div>
        

      </div>
    

      @include ('admin/layouts/script')
	</div>

</body>
</html>
