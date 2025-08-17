<?php
require_once 'conexao.php';

$reservas = $pdo_conexao->query("SELECT * FROM reservas ORDER BY horario")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>CIRCO ENCANTUS</title>
        <link rel="stylesheet" href="estilo.css">
    </head>

    <body>
        <h1>CIRCO ENCANTUS: Reservas</h1>
        <a href="adicionar_reserva.php" class="reservar-btn">Reservar</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Expectador</th>
                    <th>Assento</th>
                    <th>Horario</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                    <tr>
                        <td><?php echo $reserva['id'] ?></td>
                        <td><?php echo $reserva['expectador'] ?></td>
                        <td><?php echo $reserva['assento'] ?></td>
                        <td><?php echo $reserva['horario'] ?></td>
                        <td>
                            <a href="editar_reserva.php?id=<?php echo $reserva['id'] ?>">Editar</a>
                            <a href="excluir_reserva.php?id=<?php echo $reserva['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</
>