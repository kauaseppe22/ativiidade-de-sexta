<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $modelo = $_POST["modelo"];
    $placa = $_POST["placa"];

    // Conecte-se ao banco de dados
    $pdo = new PDO("mysql:host=localhost;dbname=estacionamento3", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para inserir um novo carro na tabela
    $query = "INSERT INTO Carros (Modelo, Placa, DonoID) VALUES (?, ?, ?)";

    // Você deve obter o ID do usuário atualmente logado ou armazenar essa informação na sessão
    $user_id = 1; // Substitua pelo ID do usuário atual

    // Prepare a consulta
    $stmt = $pdo->prepare($query);

    // Execute a consulta com os parâmetros
    $stmt->execute([$modelo, $placa, $user_id]);

    // Redirecione de volta para a página de perfil do usuário ou outra página apropriada
    header("Location: perfil.php");
    exit();
}
?>