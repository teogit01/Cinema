<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/gif"
        href="https://s3img.vcdn.vn/123phim/2018/09/459970ce80ca2c762c8c8076b415c06e.png" />
    <title>Index</title>
    <link rel="stylesheet" href="{{asset('src/user/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <style type="text/css">

        .seat3 { background-color: darkgoldenrod; }
        .select-seat{ --background-color: red; }
    </style>
</head>


<body>
    <div class="page_lichchieu">
        <header class="page_lich-header">
            <nav class="page_lich-header-nav">
                <div class="page_lich-header-nav-left">
                    <!-- <div onclick="chon(1)" class="page_lich-header-nav-left-item page_lich-header-nav-left-item-active">
                        <div class="page_lich-header-nav-left-item-num">
                            01
                        </div>
                        <div class="page_lich-header-nav-left-item-text">
                            Loại giá vé
                        </div>
                    </div> -->
                    <div onclick="chon(2)" class="page_lich-header-nav-left-item page_lich-header-nav-left-item-active">
                        <div class="page_lich-header-nav-left-item-num">
                            01
                        </div>
                        <div class="page_lich-header-nav-left-item-text">
                            Chọn ghế & thanh toán
                        </div>
                    </div>
                    <!-- <div class="page_lich-header-nav-left-item">
                        <div class="page_lich-header-nav-left-item-num">
                            02
                        </div>
                        <div class="page_lich-header-nav-left-item-text">
                            Kết quả đặt vé
                        </div>
                    </div> -->
                </div>
                <ul class="header_list page_lich-header-nav-right">
                	@if (Auth::check())
                    <li class="header_item header_item-left">
                        <img class="img_avt" src="{{asset('img/avatar')}}/{{Auth::user()->avatar}}" alt="avatar">
                    </li>
                    @else
                    <li class="header_item header_item-left">
                        <img class="img_avt" src="https://tix.vn/app/assets/img/avatar.png" alt="avatar">
                    </li>
                    @endif
                    <li class="header_item header_item-left ">{{Auth::user()->name}}</li>
                    <div class="header_item-logout">
                        Đăng xuất
                    </div>
                </ul>
            </nav>
        </header>
        <!-- <div class="page_lich-sl">
            <div class="page_lich-sl-container">
                <div class="page_lich-sl-poster">
                    <img src="{{asset('img/poster')}}/{{$film->poster}}"
                        alt="" class="page_lich-sl-poster-img">
                    <div class="page_lich-sl-poster-modal">
                        <div class="page_lich-sl-poster-modal-top">
                             <?php
                                $date=date_create($film->openday);
                                echo date_format($date,"d-m-Y");
                              ?>
                        </div>
                        <div class="page_lich-sl-poster-modal-mid">
                            <span class="page_lich-sl-poster-modal-mid-dinhdang">
                                C16
                            </span>
                            <span class="page_lich-sl-poster-modal-mid-name" style="font-size: 30px">
                                {{$film->name}}
                            </span>
                        </div>
                        <div class="page_lich-sl-poster-modal-bottom">
                            {{$film->runtime}} phút 
                        </div>

                    </div>
                </div>
                <div class="page_lich-sl-select">
                    <div class="page_lich-sl-select-top">
                        <div class="page_lich-sl-select-top-name">
                            CTC Hùng Vương
                        </div>
                        <div class="page_lich-sl-select-top-time">
                            <?php
                                $date=date_create($showtime->date);
                                	echo date_format($date,"d/m/Y");
                              ?> - {{$showtime->start}} ~ {{$showtime->end}} - {{$showtime->room->name}}
                        </div>
                    </div>
                    <div class="page_lich-sl-select-mid">
                        <div class="page_lich-sl-select-mid-item">
                            <div class="page_lich-sl-select-mid-loai">
                                Vé Thường
                            </div>
                            <div class="tongtien page_lich-sl-select-mid-gia">
                            </div>
                            <div class="page_lich-sl-select-mid-button">
                                <div class="page_lich-sl-select-mid-button-prev">
                                    -
                                </div>
                                <div class="page_lich-sl-select-mid-button-text">
                                    10
                                </div>
                                <div class="page_lich-sl-select-mid-button-plus">
                                    +
                                </div>
                            </div>
                        </div>
                        <div class="page_lich-sl-select-mid-item">
                            <div class="page_lich-sl-select-mid-loai">
                                Vé Vip
                            </div>
                            <div class="page_lich-sl-select-mid-gia">
                                100,000 đ
                            </div>
                            <div class="page_lich-sl-select-mid-button">
                                <div class="page_lich-sl-select-mid-button-prev">
                                    -
                                </div>
                                <div class="page_lich-sl-select-mid-button-text">
                                    1
                                </div>
                                <div class="page_lich-sl-select-mid-button-plus">
                                    +
                                </div>
                            </div>
                        </div>

                        

                    </div>
                    <div class="page_lich-sl-select-bottom">
                        <div class="page_lich-sl-select-bottom-tg">
                            <div class="page_lich-sl-select-bottom-tg-title">
                                TỔNG TIỀN
                            </div>
                            <div class="page_lich-sl-select-bottom-tg-price">
                                125,000 đ
                            </div>
                        </div>
                        <div onclick="chon(2)" class="page_lich-sl-select-bottom-button">
                            CHỌN GHẾ
                        </div>
                    </div>
                    <div class="page_lich-sl-select-footer">
                        Lưu ý bạn không thể hủy hoặc thay đổi xuất chiếu cho vé đã mua.
                    </div>
                </div>

            </div>
        </div> -->
        <div class="page_lich-chonghe">

            <div class="page_lich-chonghe-content">
                <div class="page_lich-chonghe-content-manhinh">
                    Màn hình
                </div>
                <div class="page_lich-chonghe-content-ghe">
                   <div class="page_lich-chonghe-content-ghe">

                            @foreach($rows as $key => $row)
                            <div class="page_lich-chonghe-content-ghe-hang">
                                
                                <div class="page_lich-chonghe-content-ghe-tencot">{{$key}}</div>
                                
                                    @for($i=1; $i<13; $i++)
                                        @if(isset($row[$i]))
                                            @if($key=='A' || $key == 'B' || $key == 'C' || $key =='D')
                                                @if ($row[$i]->status == 1)
                                                <div class=" page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title"style="background-color: #aaa">
                                                    <span style="font-size: 20px;">X</span>
                                                </div>
                                                @else
                                                <div data-id-seat="{{$row[$i]->id}}" data-name="{{$row[$i]->name}}" data-select='0' data-color='seat' class="select page_lich-chonghe-content-ghe-item seat">
                                                    <span style="font-size: 20px;color: #bbb">{{$i}}</span>
                                                </div>
                                                @endif
                                            @elseif($key =='E' || $key =='F' || $key =='G' || $key =='H')   
                                                @if ($row[$i]->status == 1)
                                                    <div class=" page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title" style="background-color: #aaa">
                                                    <span style="font-size: 20px;">X</span>
                                                    </div>
                                                @else
                                                    <div data-id-seat="{{$row[$i]->id}}" data-name="{{$row[$i]->name}}" data-select='0' data-color='seat2' class="select page_lich-chonghe-content-ghe-item seat2 " style="background-color: forestgreen">
                                                        <span style="font-size: 20px;color: #bbb">{{$i}}</span>
                                                    </div>
                                                @endif
                                            @else
                                            @if ($row[$i]->status == 1)
                                                <div class=" page_lich-chonghe-content-ghe-item seat-select page_lich-chonghe-tutorial-item-title">
                                                <span style="font-size: 20px;">X</span>
                                                </div>
                                                @else
                                                <div data-id-seat="{{$row[$i]->id}}" data-name="{{$row[$i]->name}}" data-select='0' data-color='seat3' class="select page_lich-chonghe-content-ghe-item seat3 select-seat">
                                                    <span style="font-size: 20px;color: #bbb">{{$i}}</span>
                                                </div>
                                                @endif
                                            @endif
                                        @else
                                            <div class="page_lich-chonghe-content-ghe-item-stt"></div>  
                                        @endif
                                    @endfor
                            </div>
                            @endforeach 
                            
                    </div>
                    <br>
                </div>
                <br>
                <div class="page_lich-chonghe-tutorial" style="width: 100%">
                    <div class="page_lich-chonghe-tutorial-item">
                        <div class="page_lich-chonghe-tutorial-item-color">
                        </div>
                        <div class="page_lich-chonghe-tutorial-item-title">
                            Ghế Vip ({{$showtime->film->price + 20}}k)
                        </div>
                    </div>
                    <div class="page_lich-chonghe-tutorial-item">
                        <div class="page_lich-chonghe-tutorial-item-color">
                        </div>
                        <div class="page_lich-chonghe-tutorial-item-title">
                            Ghế thường ({{$showtime->film->price - 10}}k)
                        </div>
                    </div>
                    <div class="page_lich-chonghe-tutorial-item">
                        <div class="page_lich-chonghe-tutorial-item-color">
                        </div>
                        <div class="page_lich-chonghe-tutorial-item-title">
                            Ghế trung bình ({{$showtime->film->price}}k)
                        </div>
                    </div>
                    <div class="page_lich-chonghe-tutorial-item">


                        <div class="page_lich-chonghe-tutorial-item-color seat-select" style="position: relative; background-color: #aaa">
                            <span style="position: absolute;text-outline: 0;px;left: 5px">X</span>
                        </div>
                        <div class="page_lich-chonghe-tutorial-item-title">
                            Ghế đã có người chọn    
                        </div>
                    </div>
                    
                </div>
                </div>

            </div>
            
        </div>
        <form method="post" action="{{route('user.checkout.post',[Auth::id(),$film->id,$showtime->id])}}">
            @csrf
            <div class="page_lich-hoadon">
            <div class="page_lich-hoadon-content">
                <div class="page_lich-hoadon-content-gia">
                    <div id='total'>0</div>
                    <input type="text" name="total" value="0" style="display: none;" id='total_value'>
                </div>
                <div class="page_lich-hoadon-content-info">
                    <div class="page_lich-hoadon-content-name">
                        <span class="page_lich-hoadon-content-dinhdang">C16</span>
                        {{$film->name}}
                    </div>
                    <div class="page_lich-hoadon-content-rap">
                        CTC Hùng Vương
                    </div>
                    <div class="page_lich-hoadon-content-time">
                        <?php
                            $date=date_create($film->openday);
                            echo date_format($date,"d/m/Y");
                        ?> - {{$showtime->start}}~{{$showtime->end}} - {{$showtime->room->name}}
                    </div>
                </div>
                <div class="page_lich-hoadon-content-ghe">
                    <div class="page_lich-hoadon-content-ghe-name">
                        Ghế:
                    </div>
                    <div class="page_lich-hoadon-content-ghe-chitiet">
                        <div id='seat-select'></div>
                        <input type="text" name="seat" value="" id='seat-select_value' style="display: none">
                        <input type="text" name="seat_value" value="" id='seat_value' style="display: none">
                    </div>
                </div>
                <div class="page_lich-hoadon-content-thanhtoan">
                    <div class="page_lich-hoadon-content-thanhtoan-title">
                        Hình thức thanh toán:
                    </div>
                    <label class="page_lich-hoadon-content-thanhtoan-radio">
                        <input checked type="radio" name="thanhtoan" value="visa">
                        <div class="page_lich-hoadon-content-thanhtoan-radio-tick"></div>
                        <img class="page_lich-hoadon-content-thanhtoan-icon"
                            src="https://stcgateway.zalopay.vn/image/icon-visa.svg" alt="">
                        <img class="page_lich-hoadon-content-thanhtoan-icon"
                            src="https://stcgateway.zalopay.vn/image/icon-master.svg" alt="">
                        <img class="page_lich-hoadon-content-thanhtoan-icon"
                            src="https://stcgateway.zalopay.vn/image/icon-jcb.svg" alt="">
                    </label>
                    <label class="page_lich-hoadon-content-thanhtoan-radio">
                        <input type="radio" name="thanhtoan" value="zalopay">
                        <div class="page_lich-hoadon-content-thanhtoan-radio-tick"></div>
                        <img class="page_lich-hoadon-content-thanhtoan-icon"
                            src="https://stcgateway.zalopay.vn/image/icon-zpapp.svg" alt="">
                        <span>ZaloPay</span>
                    </label>
                    <label class="page_lich-hoadon-content-thanhtoan-radio">
                        <input type="radio" name="thanhtoan" value="vietcombank">
                        <div class="page_lich-hoadon-content-thanhtoan-radio-tick"></div>
                        <img class="page_lich-hoadon-content-thanhtoan-icon"
                            src="https://stcgateway.zalopay.vn/image/banks/bank-vcb.svg" alt="">
                        <span>Vietcombank</span>
                    </label>
                    <label class="page_lich-hoadon-content-thanhtoan-radio">
                        <input type="radio" name="thanhtoan" value="sacombank">
                        <div class="page_lich-hoadon-content-thanhtoan-radio-tick"></div>
                        <img class="page_lich-hoadon-content-thanhtoan-icon"
                            src="https://stcgateway.zalopay.vn/image/banks/bank-sacom.svg" alt="">
                        <span>Sacombank</span>
                    </label>

                </div>

            </div>
            <div class="page_lich-hoadon-note">
                <div class="page_lich-hoadon-note-text">
                    <div class="page_lich-hoadon-note-tick">!</div> Vé đã mua không thể đổi hoặc hoàn tiền
                </div>
                <div class="page_lich-hoadon-note-text">
                    Mã vé sẽ được gửi qua <span>Email</span> đã đăng ký.
                </div>


            </div>
            <label for='sb'>
                <div class="page_lich-hoadon-button">
                    Đặt Vé
                    <input type="submit" id='sb' name="" style="display: none;">
                </div>
            </label>
            </div>
        </form>
    </div>
    <div class="modal">
        <div class="modal_overlay"></div>
        <div class="modal_body">
            <div class="modal_inner">
                <!-- <div class="modal_inner-tt-zalo">
                    <div class="modal_inner-exit">
                        <img src="https://tix.vn/app/assets/img/icons/xController.png" alt="">
                    </div>
                    <div class="modal_inner-tt-zalo-title">
                        Thanh toán Bằng Zalo Pay
                    </div>
                    <div class="modal_inner-tt-zalo-img">
                        <div class="modal_inner-tt-zalo-img-border">
                            <img src="qrzalo.png" alt="">
                        </div>
                    </div>
                    <button class="modal_inner-tt-zalo-button">Quét mã</button>
                </div> -->
                <!-- <div class="modal_inner-tt-bank">
                    <div class="modal_inner-exit">
                        <img src="https://tix.vn/app/assets/img/icons/xController.png" alt="">
                    </div>
                    <div class="modal_inner-tt-bank-title">
                        Thanh toán Bằng Sacombank
                    </div>
                    <div class="modal_inner-tt-bank-content">
                        Bạn cần chuyển sang trang Sacombank để thanh toán.
                    </div>
                    <button class="modal_inner-tt-bank-button">Chuyển trang</button>
                </div> -->
            </div>
        </div>
    </div>
</body>
<script>
    var price = 0;
    var seat = '';
    var seat_value = '';
    $('.select').on('click',function(){
        // alert($(this).attr('data-select'))
        const status = $(this).attr('data-select')
            
        if (status == '0'){
            $(this).attr('data-select','1')
            // $(this).css('backgroundColor','#553D36')
            $(this).css('opacity','0.4')
            seat = seat+ ' ' + $(this).attr('data-name')
            seat_value = seat_value+ ' ' + $(this).attr('data-id-seat')
            if( $(this).attr('data-color') == 'seat2') {
                price = price + {{$showtime->film->price}}
            }
            else 
                if ( $(this).attr('data-color') =='seat3'){
                    price = price + {{$showtime->film->price}} + 20
                } 
                else{
                    price = price + {{$showtime->film->price}} - 10
                }
            $('#total').html(price+' K')
            $('#total_value').val(price)
            $('#seat-select').html(seat)
            $('#seat_value').val(seat_value)
            $('#seat-select_value').val(seat)
        } else {
            $(this).attr('data-select','0')
            $(this).css('opacity','1')
            seat = seat.replace($(this).attr('data-name'),'');
            seat_value = seat_value.replace($(this).attr('data-id-seat'),'');
            //seat = seat+ ' ' + $(this).attr('data-name')
            if( $(this).attr('data-color') == 'seat2') 
                price = price - {{$showtime->film->price}}
            else 
                if ( $(this).attr('data-color') =='seat3') 
                    price = price - {{$showtime->film->price}} - 20
                else
                    price = price - {{$showtime->film->price}} + 10
            $('#total').html(price+' K')
            $('#total_value').val(price)
            $('#seat-select').html(seat)
            $('#seat_value').val(seat_value)
            $('#seat-select_value').val(seat)
        }
        //alert($(this).attr('data-select'))
    })
    chonghe()
    function chon(num) {
        if (num == 1) {

            document.getElementsByClassName('page_lich-hoadon')[0].style.transform = 'translateX(100%)';
            document.getElementsByClassName('page_lich-chonghe')[0].style.left = '100%';
            document.getElementsByClassName('page_lich-sl')[0].style.transform = 'translateX(0%)';
            document.getElementsByClassName('page_lich-header')[0].style.width = '100%';
        }
        else {
            chonghe();
        }
        var item = document.getElementsByClassName('page_lich-header-nav-left-item');
        for (var i = 0; i < item.length; i++) {
            item[i].className = item[i].className.replace("page_lich-header-nav-left-item-active", " ");
        }
        item[num - 1].className += (" page_lich-header-nav-left-item-active");
    }

    function chonghe() {
        document.getElementsByClassName('page_lich-hoadon')[0].style.transform = 'translateX(0%)';
        document.getElementsByClassName('page_lich-chonghe')[0].style.left = '0%';
        document.getElementsByClassName('page_lich-sl')[0].style.transform = 'translateX(-100%)';
        document.getElementsByClassName('page_lich-header')[0].style.width = '75%';
    }


    //select ticket
    
</script>

</html>