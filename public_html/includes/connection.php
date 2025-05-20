<?php
date_default_timezone_set('America/Sao_Paulo');
$user = 'math6644_safeworkplace';
$psw = 'Ip07Z4d{C6Hw'; 
$database = "math6644_safeworkplace"; 
$host = 'localhost';

$mysqli = new mysqli($host, $user, $psw, $database);

if ($mysqli->error){
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}