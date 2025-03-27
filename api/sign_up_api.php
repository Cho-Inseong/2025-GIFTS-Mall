<?php
header("Content-Type: application/json");
date_default_timezone_set('Asia/Seoul');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $time = date("Y-m-d H:i:s");

    try {
        $salt = bin2hex(random_bytes(16));
        $hashed_pw = hash("sha256", $salt . $user_pw);

        $sql = "INSERT INTO users (user_id, user_name, user_pw, user_email, pw_salt, sign_up_date) VALUE (?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $user_name, $hashed_pw, $user_email, $salt, $time]);

        $response = [
            "message" => "회원가입이 완료되었습니다!",
            "success" => true
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    } catch (PDOException $e) {
        $response = [
            "message" => "데이터베이스 오류 발생",
            "success" => false,
            "error" => $e->getMessage()
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    };
}
