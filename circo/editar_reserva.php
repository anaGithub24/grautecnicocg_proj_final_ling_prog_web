<?php
require_once 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $expectador = $_POST['expectador'];
    $assento = $_POST['assento'];
    $horario = $_POST['horario'];

    $stmt = $pdo_conexao->prepare("UPDATE reservas SET expectador = ?, assento = ?, horario = ? WHERE id = ?");
    $stmt->execute([$expectador, $assento, $horario, $id]);
    header('Location: index.php');
    exit;
}
$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo_conexao->prepare("SELECT * FROM reservas WHERE id = ?");
    $stmt->execute([$id]);
    $reserva = $stmt->fetch();
    if (!$reserva) {
        echo "Reserva não encontrada.";
        exit;
    }
} else {
    echo "ID inválido.";
    exit;
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Reserva</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <h1>Editar Reserva</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">

        <label for="expectador">Expectador:</label>
        <input type="text" id="expectador" name="expectador" value="<?php echo $reserva['expectador']; ?>" required>

        <label for="assento">Assento:</label>
        <input type="text" id="assento" name="assento" value="<?php echo $reserva['assento']; ?>" required>

        <label for="horario">Horário:</label>
        <input type="datetime-local" id="horario" name="horario" value="<?php echo date('Y-m-d\TH:i', strtotime($reserva['horario'])); ?>" required>
        
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>

</html>