<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];

    try {
        $sql = "SELECT user_id, user_pw, pw_salt, user_tier, user_idx FROM users WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $response = [
                "message" => "아이디가 존재하지 않습니다.",
                "success" => false,
            ];

            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            exit;
        }

        $hashed_pw = hash("sha256", $user['pw_salt'] . $user_pw);
        if ($hashed_pw === $user['user_pw']) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_idx'] = $user['user_idx'];
            $_SESSION['user_tier'] = $user['user_tier'];

            $response = [
                "message" => "로그인 완료되었습니다.",
                "success" => true,
            ];

            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            exit;

        } else {
            $response = [
                "message" => "로그인 실패하셨습니다.",
                "success" => false,
            ];

            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            exit;
        }

    } catch (PDOException $e) {
        $response = [
            "message" => "데이터베이스 오류",
            "success" => false,
            "error" => $e->getMessage()
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit;
    };
}
