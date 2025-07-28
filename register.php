<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;

$stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
try {
    $stmt->execute([$email, $password]);
    echo json_encode(["success" => true]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro ao registrar"]);
}
