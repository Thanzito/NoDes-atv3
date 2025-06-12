<?php
$host = "localhost";
$user = "root";
$senha = "";
$banco = "cadastro_usuarios";

$conexao = mysqli_connect($host, $user, $senha, $banco);

if (!$conexao) {
    die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
}
?>
