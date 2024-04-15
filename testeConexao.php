<?php
// Inclua o arquivo config.php
include 'config.php';

// Tenta estabelecer a conexão com o banco de dados
if ($conn) {
    echo "Conexão bem-sucedida!";
} else {
    echo "Falha na conexão: " . mysqli_connect_error();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
