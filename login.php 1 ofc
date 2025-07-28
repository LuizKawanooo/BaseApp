<?php
require 'db.php'; // Conexão com o banco
$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->execute([$email, $password]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo json_encode(["success" => true, "user_id" => $user['id'], "email" => $user['email']]);
} else {
    echo json_encode(["success" => false, "message" => "Credenciais inválidas"]);
}
