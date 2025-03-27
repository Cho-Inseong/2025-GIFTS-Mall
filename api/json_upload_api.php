<?php
$jsondata = file_get_contents('./products_data.json');
$data = json_decode($jsondata, true);

try {
    $sql = "INSERT INTO goods (goods_title, goods_price, goods_img, goods_popular, goods_category) VALUES (:title, :price, :img, 0, :category)";
    $stmt = $pdo->prepare($sql);

    foreach ($data['data'] as $category) {
        foreach ($category['detail'] as $item) {
            $stmt->execute([
                ':title' => $item['title'],
                ':price' => str_replace(',', '', $item['price']), // 가격에서 콤마 제거
                ':img' => $item['img'],
                ':category' => $category['category']
            ]);
        };
    };
    
} catch (PDOException $e) {
 
}
?>