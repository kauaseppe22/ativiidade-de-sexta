<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Conecte-se ao banco de dados
    $pdo = new PDO("mysql:host=localhost;dbname=estacionamento3", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obter o usuário com o nome de usuário fornecido
    $query = "SELECT ID, Senha FROM Usuarios WHERE Nome = ? LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["Senha"])) {
        // Iniciar a sessão
        session_start();

        // Armazenar informações do usuário na sessão
        $_SESSION["user_id"] = $user["ID"];

        // Redirecionar para a página de perfil ou outra página protegida
        header("Location: perfil.php");
        exit();
    } else {
        echo "Nome de usuário ou senha incorretos. Tente novamente.";
    }
}
?>