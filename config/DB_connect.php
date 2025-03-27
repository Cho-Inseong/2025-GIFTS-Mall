<?php
$host = 'localhost';
$db_name = 'gifts_mall';
$user_name = 'root';
$pw = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user_name, $pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<script>alert('데이터베이스 연결 실패 ". addslashes($e->getMessage())."');</script>";
}
?>