<!-- 회원가입 모달 -->
<div class="modal fade" id="sign_up_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center w-100">회원가입</h3>
            </div>
            <div class="modal-body">
                <p>아이디</p>
                <div class="input-group mb-2">
                    <input type="text"  class="form-control" id="user_id" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <p>비밀번호</p>
                <div class="input-group mb-2">
                    <input type="password" class="form-control" id="user_pw" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <p>이름</p>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="user_name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <p>이메일</p>
                <div class="input-group mb-2">
                    <input type="email" class="form-control" id="user_email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
                <button type="button" class="btn btn-primary" onclick="sign_up()">회원가입</button>
            </div>
        </div>
    </div>
</div>
<!-- 로그인 -->
<div class="modal fade" id="sign_in_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center w-100">로그인</h3>
            </div>
            <div class="modal-body">
                <p>아이디</p>
                <div class="input-group mb-2">
                    <input type="text"  class="form-control" id="user_id_in" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <p>비밀번호</p>
                <div class="input-group mb-2">
                    <input type="password" class="form-control" id="user_pw_in" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
                <button type="button" class="btn btn-primary" onclick="sign_in()">로그인</button>
            </div>
        </div>
    </div>
</div>