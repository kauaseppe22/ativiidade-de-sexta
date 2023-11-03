<!DOCTYPE html>
<html>
<head>
    <title>Reserva de Vagas de Estacionamento</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Reserva de Vagas de Estacionamento</h2>
    <form action="processa_reserva.php" method="post">
        <label for="vaga">Selecione uma vaga:</label>
        <select name="vaga" id="vaga">
            <option value="Vaga 1">Vaga 1</option>
            <option value="Vaga 2">Vaga 2</option>
            <option value="Vaga 3">Vaga 3</option>
            <!-- Adicione mais opções conforme necessário -->
        </select><br>

        <input type="submit" value="Reservar Vaga">
    </form>

    <h3>Vaga Selecionada:</h3>
    <div id="vaga_selecionada">
        <!-- O JavaScript irá preencher esta área com a vaga selecionada -->
    </div>

    <script>
        // JavaScript para exibir a vaga selecionada após a reserva
        const form = document.querySelector('form');
        const vagaSelecionada = document.getElementById('vaga_selecionada');

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const vaga = form.vaga.value;
            vagaSelecionada.innerHTML = Você selecionou a vaga: <strong>${vaga}</strong>;
        });
    </script>
</body>
</html>