<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Carros</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Cadastro de Carros</h2>
    <form action="processa_cadastro_carro.php" method="post">
        <label for="modelo">Modelo do Carro:</label>
        <input type="text" name="modelo" id="modelo" required><br>

        <label for="placa">Placa do Carro:</label>
        <input type="text" name="placa" id="placa" required><br>

        <input type="submit" value="Cadastrar Carro">
    </form>
</body>
</html>