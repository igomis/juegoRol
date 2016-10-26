<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=juegoRol', 'root', '1234');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("SET NAMES 'utf8'");
}
 catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}
 

