<?php
include("./config/DB_connect.php");
session_start();
//URI 꼭 기억해라 METHOD 아니다
$request = $_SERVER['REQUEST_URI'];
$path = explode("?", $request);
$path[1] = isset($path[1]) ? $path[1] : null;
$resource = explode("/", $path[0]);

$pages = '';
switch($resource[1]) {
    // 페이지 라우터
    case '':
        $pages = './page/index.php';
        break;
    case 'all_products':
        $pages = './page/all_products.php';
        break;
    case 'introduce':
        $pages = './page/introduce.php';
        break;
    case 'popular':
        $pages = './page/popular.php';
        break;
    case 'shopping_cart':
        $pages = './page/shopping_cart.php';
        break;
    // case 'test':
    //     $pages = './test.php';
    //     break;
    // api 라우터
    case 'sign_up':
        include('./api/sign_up_api.php');
        exit();
        break;
    case 'sign_in':
        include('./api/sign_in_api.php');
        exit();
        break;
    case 'logout':
        include('./api/logout_api.php');
        exit();
        break;
    // case 'json_upload':
    //     include('./api/json_upload_api.php');
    //     exit();
    //     break;
    case 'all_products_add_api':
        include('./api/all_products_add_api.php');
        exit();
        break;
        // 전체상품을 장바구니에 넣는 api
    case 'add_shopping_cart_api':
        include('./api/add_shopping_cart_api.php');
        exit();
        break;
        // 장바구니에서 수량 조절 업데이트 api
    case 'stock_update_api':
        include('./api/stock_update_api.php');
        exit();
        break;
    // default 
    default:
        echo "경로 ㅈ됨";
        exit;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIFTS-Mall</title>
    <link rel="stylesheet" href="./[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/공통/bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php include("./page/components/loading.php")?>
    <?php include("./page/components/header.php")?>
    <?php include($pages)?>
    <?php include("./page/components/footer.php")?>
    <?php include("./page/components/sign_in_up.php")?>

    <script src="./[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/공통/jquery-3.4.1.min.js"></script>
    <script src="./[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/공통/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="./app.js"></script>
</body>
</html>