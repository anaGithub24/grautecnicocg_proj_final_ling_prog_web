


<?php

require_once 'conexao.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $pdo_conexao->prepare("DELETE FROM reservas WHERE id = ?")->execute([$id]);
}
header('Location: index.php');
exit;
?>