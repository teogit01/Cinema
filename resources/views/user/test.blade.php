<div id="modal" class="modal">
        <div onclick="exitmodal()" class="modal_overlay"></div>
        <div class="modal_body">
            <div class="modal_inner">

                <div class="modal_inner-ytb">
                    <img onclick="exitmodal()" class="modal_inner-ytb-exit" src="./image/userimg/close.png" alt="exit">
                    <div id="trailerytb" class="modal_inner-iframe-ytb">
                    </div>
                </div> 
                <div class="modal_inner-check">
                    <div onclick="exitmodal()" class="modal_inner-exit">
                        <img src="./image/userimg/xController.png" alt="">
                    </div>
                    <div class="modal_inner-check-content">Bạn cần phải đăng nhập.</div>
                    <div onclick="linklogin()" class="modal_inner-check-button">Đăng Nhập</div>
                </div>                   
                <form action="{{route('danhgia')}}" method="post" >
                    <div class="modal_inner-danhgia">
                        <div onclick="exitmodal()" class="modal_inner-exit">
                            <img src="./image/userimg/xController.png" alt="exit">
                        </div>
                        <input value="{{$phim->maphim}}" type="hidden" name="maphim">
                        <input value="5" class="modal_inner-danhgia-diem-input" type="hidden" name="sao">
                        <div class="modal_inner-danhgia-diem">
                            5.0
                        </div>
                        <div class="modal_inner-danhgia-sao">
                            <div onclick="clicksaoinput(1)" onmouseover="hoversaoinput(1)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-left"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(2)" onmouseover="hoversaoinput(2)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-right"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(3)" onmouseover="hoversaoinput(3)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-left"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(4)" onmouseover="hoversaoinput(4)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-right"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(5)" onmouseover="hoversaoinput(5)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-left"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(6)" onmouseover="hoversaoinput(6)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-right"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(7)" onmouseover="hoversaoinput(7)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-left"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(8)" onmouseover="hoversaoinput(8)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-right"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(9)" onmouseover="hoversaoinput(9)" onmouseout="unhoversaoinput()"
                                class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-left"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                            <div onclick="clicksaoinput(10)" onmouseover="hoversaoinput(10)"
                                onmouseout="unhoversaoinput()" class="modal_inner-danhgia-sao-part">
                                <img class="modal_inner-danhgia-sao-right"
                                    src="./image/userimg/StarSelect.png">
                            </div>
                        </div>
                        <div class="modal_inner-danhgia-binhluan">
                            <textarea class="modal_inner-danhgia-binhluan-input" name="binhluan" placeholder="Nói mọi người biết bạn nghĩ gì về phim này..."></textarea>
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