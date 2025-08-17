<?php

try {
    $dsn = '';
    $host = '127.0.0.1';
    $port = '3306';
    $usuario = 'root';
    $senha = '';
    $database = 'circo';

    $dsn = "mysql:host=$host;port=$port;dbname=$database";
    $pdo_conexao = new PDO($dsn, $usuario, $senha);

    echo 'Conexão com sucesso! <br> ';
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
