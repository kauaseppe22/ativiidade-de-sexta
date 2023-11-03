<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Conecte-se ao banco de dados
    $db = new mysqli("localhost", "root", "", "estacionamento3");

    if ($db->connect_error) {
        die("Falha na conexão com o banco de dados: " . $db->connect_error);
    }

    // Consulta SQL para inserir um novo usuário na tabela
    $query = "INSERT INTO Usuarios (Nome, Senha) VALUES (?, ?)";

    // Prepare a declaração SQL
    $stmt = $db->prepare($query);

    if ($stmt) {
        // Hash da senha para segurança
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Vincule os parâmetros
        $stmt->bind_param("ss", $username, $hashedPassword);

        // Execute a consulta
        if ($stmt->execute()) {
            // Registro bem-sucedido, redirecione para a página de login
            header("Location: login.html");
            exit();
        } else {
            echo "Erro ao registrar o usuário. Por favor, tente novamente.";
        }

        // Feche a declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da declaração SQL.";
    }

    // Feche a conexão com o banco de dados
    $db->close();
}
?>