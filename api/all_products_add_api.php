<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
    $category = $_POST['category'];

    // 선택된 카테고리에 해당하는 상품 조회
    $stmt = $pdo->prepare("SELECT * FROM goods WHERE goods_category = :category");
    $stmt->bindParam(':category', $category);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 인기 상품과 일반 상품을 분리
    $popular_products = [];
    $normal_products = [];

    foreach ($products as $product) {
        if ($product['goods_popular'] === '인기') {
            $popular_products[] = $product;
        } else {
            $normal_products[] = $product;
        }
    }

    // 인기 상품을 출력
    $popular_html = '';
    foreach ($popular_products as $product) {
        $popular_html .= "<div class='popular' id='". $product['goods_idx']."'>";
        $popular_html .= "<img src='" . $product['goods_img'] . "' alt=''>";
        $popular_html .= "<div class='p-box'>";
        $popular_html .= "<p>" . $product['goods_title'] . "</p>";
        $popular_html .= "<p>" . number_format($product['goods_price']) . "원</p>";
        $popular_html .= "<div class='d-flex justify-content-center'>";
        $popular_html .= "<button class='btn btn-success mr-2'>구매하기</button>";
        $popular_html .= "<button class='btn btn-primary' onclick='s_p_c_a(". $product['goods_idx'].")''>장바구니 담기</button>";
        $popular_html .= "</div>";
        $popular_html .= "</div>";
        $popular_html .= "</div>";
    }

    // 일반 상품을 출력
    $normal_html = '';
    foreach ($normal_products as $product) {
        $normal_html .= "<div class='box' id='". $product['goods_idx']."'>";
        $normal_html .= "<img src='" . $product['goods_img'] . "' alt=''>";
        $normal_html .= "<p class='text-center mt-2'>" . $product['goods_title'] . "</p>";
        $normal_html .= "<p class='text-center'>" . number_format($product['goods_price']) . "원</p>";
        $normal_html .= "<div class='d-flex justify-content-center'>";
        $normal_html .= "<button class='btn btn-success mr-2'>구매하기</button>";
        $normal_html .= "<button class='btn btn-primary' onclick='s_p_c_a(". $product['goods_idx'].")'>장바구니 담기</button>";
        $normal_html .= "</div>";
        $normal_html .= "</div>";
    }

    // 인기 상품 HTML과 일반 상품 HTML을 JSON 형식으로 반환
    echo json_encode([
        'popular' => $popular_html,
        'normal' => $normal_html
    ]);
}
