<!DOCTYPE html>
<html>
<head>
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Perfil do Usuário</h2>
    <?php
    session_start();
    if (isset($_SESSION["user_id"])) {
        // Conecte-se ao banco de dados
        $pdo = new PDO("mysql:host=localhost;dbname=estacionamento3", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta SQL para obter informações do usuário
        $query = "SELECT Nome, Email FROM Usuarios WHERE ID = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_SESSION["user_id"]]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "<p><strong>Nome de Usuário:</strong> " . $user["Nome"] . "</p>";
            echo "<p><strong>Email:</strong> " . $user["Email"] . "</p>";
            echo "<a href='logout.php'>Sair</a>";
        } else {
            echo "Usuário não encontrado.";
        }
    } else {
        header("Location: login.html");
        exit();
    }
    ?>
</body>
</html>