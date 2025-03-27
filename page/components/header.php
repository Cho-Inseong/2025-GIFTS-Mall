<!-- 헤더 -->
<header>
    <div id="header_logo_and_nav">
        <img id="header_logo" src="./logo.png" alt="logo" title="logo">
        <ul>
            <li><a href="introduce">소개</a></li>
            <ul class="menu">
                <li>
                    <a href="all_products">판매상품</a>
                    <ul class="depth_1">
                        <li><a href="all_products">전체상품</a></li>
                        <li><a href="popular">인기상품</a></li>
                    </ul>
                </li>
            </ul>
            <li><a href="#">가맹점</a></li>
            <li><a href="shopping_cart">장바구니</a></li>
        </ul>
    </div>
    <ul>
        <?php
        if (isset($_SESSION['user_tier'])) {
            if ($_SESSION['user_tier'] == "일반회원") {
                echo '
                <li style="color: white;"><a href="logout">로그아웃</a></li>
                ';
            } else {
                echo '
                <li style="color: white;"><a href="logout">로그아웃</a></li>
                <ul class="menu">
                <li>
                    <a href="">관리자</a>
                    <ul class="depth_1">
                        <li><a href="">공지사항관리</a></li>
                        <li><a href="">판매상품관리</a></li>
                    </ul>
                </li>
            </ul>
                ';
            }
        } else {
            echo '
            <li style="color: white;" onclick="show_sign_in_modal()">로그인</li>
            <li style="color: white;" onclick="show_sign_up_modal()">회원가입</li>
            ';
        }
        ?>
    </ul>
</header>