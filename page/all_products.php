<main>
    <div id="container_ap">
        <!-- 비디오 -->
        <div class="position-relative d-inline-block">
            <video class="w-100" id="all_video" src="../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/B-Module/AD.mp4"></video>
            <div class="btn-group">
                <button class="btn btn-primary video-btn" onclick="v_play(this)">재생하기</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">일시정지</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">정지</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">되감기</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">빨리감기</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">감속하기</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">배속하기</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">배속 초기화</button>
                <button class="btn btn-primary video-btn" id="c-h-btn" onclick="v_play(this)">컨트롤러 숨기기</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">반복 켜기</button>
                <button class="btn btn-primary video-btn" onclick="v_play(this)">자동재생 켜기</button>
            </div>
        </div>

        <!-- 전체상품 -->
        <?php include('./api/all_products_add_api.php') ?>
        <div>
            <div class="d-flex justify-content-center w-100" id="category_btn">
                <button class="btn btn-primary mx-3" onclick="category_select(this)">건강식품</button>
                <button class="btn btn-primary mx-3" onclick="category_select(this)">디지털</button>
                <button class="btn btn-primary mx-3" onclick="category_select(this)">팬시</button>
                <button class="btn btn-primary mx-3" onclick="category_select(this)">향수</button>
                <button class="btn btn-primary mx-3" onclick="category_select(this)">헤어케어</button>
            </div>
            <div class="popular"></div>
            <div class='w-100 mt-5 d-flex justify-content-between' id='detail_boxes'></div>
        </div>


        <button class="btn btn-primary" onclick="show_modal()">비회원주문</button>
    </div>
</main>

<!-- 모달 -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-fullSize modal-dialog-scrollable" role="document">
        <div class="modal-content modal-fullSize">
            <div class="modal-header">
                <h5 class="modal-title">비회원 주문하기</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-1">회원정보</p>
                <div class="input-group mb-3">
                    <input readonly type="text" class="form-control" id="random_id" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div>
                    <button class="btn btn-primary" onclick="show_all_products(this)">건강식품</button>
                    <button class="btn btn-primary" onclick="show_all_products(this)">디지털</button>
                    <button class="btn btn-primary" onclick="show_all_products(this)">팬시</button>
                    <button class="btn btn-primary" onclick="show_all_products(this)">향수</button>
                    <button class="btn btn-primary" onclick="show_all_products(this)">헤어케어</button>
                    <div class="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
                <button type="button" class="btn btn-primary">주문하기</button>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function() {
    //     random_id();
    // })
</script>