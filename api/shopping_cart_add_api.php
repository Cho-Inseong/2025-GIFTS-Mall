<?php
try {
    $user_idx = $_SESSION['user_idx'];
    $sql = "SELECT g.goods_idx, g.goods_img, g.goods_title, g.goods_price, s.spc_stock FROM spc s JOIN goods g ON s.goods_idx = g.goods_idx WHERE s.user_idx = :user_idx";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user_idx", $user_idx);
    $stmt->execute();
    $cart_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
} catch (PDOException $e) {
    
}
?>