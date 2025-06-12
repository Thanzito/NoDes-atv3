<?php
include "conexao.php";

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$funcao = $_POST['funcao'];

$sql = "INSERT INTO usuarios (nome, matricula, funcao) VALUES ('$nome', '$matricula', '$funcao')";

if (mysqli_query($conexao, $sql)) {
    echo "Usuário cadastrado com sucesso!<br><a href='cadastro.html'>Voltar</a>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

$sql = "INSERT INTO usuarios (nome, matricula, funcao) VALUES ('$nome', '$matricula', '$funcao')";

?>
