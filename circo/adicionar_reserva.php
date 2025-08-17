<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expectador = $_POST['expectador'];
    $assento = $_POST['assento'];
    $horario = $_POST['horario'];

    $stmt = $pdo_conexao->prepare("INSERT INTO reservas (expectador, assento, horario) VALUES (?, ?, ?)");
    $stmt->execute([$expectador, $assento, $horario]);

    header('Location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Reserva</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <h1>Adicionar Reserva</h1>
    <form method="POST" action="">
        <label for="expectador">Expectador:</label>
        <input type="text" id="expectador" name="expectador" required>

        <label for="assento">Assento:</label>
        <input type="text" id="assento" name="assento" required>

        <label for="horario">Horário:</label>
        <input type="datetime-local" id="horario" name="horario" required>
        <button type="submit">Reservar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>

</html>