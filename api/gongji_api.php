<?php
try {
    $sql = "SELECT * FROM gongji ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $gongs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>