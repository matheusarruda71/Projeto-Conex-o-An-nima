<?php
include("../includes/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';
    $type = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';

    if (empty($feedback) || empty($type)) {
        header("Location: ../feedback-status.php?status=erro");
        exit;
    }

    $now = date('Y-m-d H:i:s');
    $stmt = $mysqli->prepare("INSERT INTO feedbacks (feedback, type, created_at, updated_at) VALUES (?, ?, ?, ?)");

    if (!$stmt) {
        header("Location: ../feedback-status.php?status=erro");
        exit;
    }

    $stmt->bind_param("ssss", $feedback, $type, $now, $now);

    if ($stmt->execute()) {
        header("Location: ../feedback-status.php?status=sucesso");
    } else {
        header("Location: ../feedback-status.php?status=erro");
    }

    $stmt->close();
} else {
    header("Location: ../feedback-status.php?status=erro");
}
exit;
