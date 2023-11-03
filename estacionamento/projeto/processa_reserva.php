<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $vagaSelecionada = $_POST["vaga"]; // Vaga selecionada pelo usuário

    // Conecte-se ao banco de dados
    $pdo = new PDO("mysql:host=localhost;dbname=estacionamento3", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifique a disponibilidade da vaga selecionada
    $query = "SELECT ID, Disponivel FROM VagasEstacionamento WHERE NumeroVaga = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$vagaSelecionada]);
    $vaga = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($vaga && $vaga["Disponivel"]) {
        // A vaga está disponível, portanto, pode ser reservada
        // Marque a vaga como indisponível no banco de dados
        $query = "UPDATE VagasEstacionamento SET Disponivel = 0 WHERE NumeroVaga = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$vagaSelecionada]);

        // Você deve armazenar informações adicionais da reserva, como o ID do usuário, a data e a hora da reserva, na tabela de Reservas

        // Redirecione o usuário para uma página de confirmação ou perfil
        header("Location: confirmacao.php");
        exit();
    } else {
        echo "A vaga selecionada não está disponível. Por favor, escolha outra vaga.";
    }
}
?>