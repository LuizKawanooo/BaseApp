<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // ajuste para o seu domínio em produção
header('Access-Control-Allow-Methods: POST');

$host = "localhost";
$user = "ionic_perfil_bd";
$password = "{[UOLluiz2019";
$dbname = "tccappionic_bd";

// Conectar
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
  echo json_encode(['success' => false, 'message' => 'Erro ao conectar ao banco']);
  exit();
}

// Receber dados do app
$data = json_decode(file_get_contents("php://input"));
$email = $conn->real_escape_string($data->email);
$password = $conn->real_escape_string($data->password);

// Verificar no banco
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo json_encode(['success' => true, 'message' => 'Login bem-sucedido']);
} else {
  echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos']);
}

$conn->close();
?>
