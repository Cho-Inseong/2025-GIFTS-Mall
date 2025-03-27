<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $spc_stock = $_POST['spc_stock'];
    $goods_idx = $_POST['goods_idx'];
    
    try {
        $sql = "UPDATE spc SET spc_stock = :spc_stock WHERE goods_idx = :goods_idx";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':spc_stock',$spc_stock);
        $stmt->bindParam(':goods_idx',$goods_idx);
        $stmt->execute();

        $response = [
            "message" => "올라감",
            "success" => true
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>