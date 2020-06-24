 <style type="text/css">
    .haha { display: none }
    .s { display: none; }
 </style>

 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>{{Auth::user()->name}} </a>
                    </li>
                    <li class="menu-title">ADMIN</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.film.list')}}" class='s' data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog "></i>Quản lý phim</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href=>Danh sách</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.genre.index')}}" class='s' data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog "></i>Quản lý thể Loại</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.showtime')}}" class="dropdown-toggle" data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản lý xuất chiếu</a>
                        <!-- <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href=http://localhost:3000/cinema/showtime/>Xuất chiếu</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                        </ul> -->
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.room')}}" class="dropdown-toggle" data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Quản lý phòng</a>
                        <!-- <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul> -->
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.seat')}}" class="dropdown-toggle" data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Ghế</a>
                        <!-- <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul> -->
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.country')}}" class="dropdown-toggle" data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản lý quốc Gia</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.ticket')}}" class="dropdown-toggle" data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản lý vé Đặt</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.account')}}" class="dropdown-toggle" data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tài Khoản</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.statistic')}}" class="dropdown-toggle" data-toggle="dropdow" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Thống kê</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>