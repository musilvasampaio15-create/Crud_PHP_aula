<?php
    $host = "localhost"; 
    $db = "senac";
    $user = "root";
    $pass = "";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $option =[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try{
        $pdo = new PDO($dsn, $user, $pass, $option);
    }

    catch(PDOException $e){
        die("Erro na conexão com o baco de dados: " . $e ->getMessage());
    };
?>