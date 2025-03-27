<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_idx = $_SESSION['user_idx'];
    $goods_idx = $_POST['goods_idx'];
    
    try {
        $sql = "INSERT INTO spc (user_idx, goods_idx) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_idx, $goods_idx]);

        $response = [
            "message" => "장바구니 담김!",
            "success" => true
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit;
    } catch(PDOException $e) {
        $response = [
            "message" => "데이터베이스 오류 ",
            "success" => false,
            "error" => $e->getMessage()
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
