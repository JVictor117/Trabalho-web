<?php

$servidor = "localhost";
$usuario = "root"; 
$senha = ""; 
$banco = "filmes"; 


$conn = new mysqli($servidor, $usuario, $senha, $banco);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$nome = $conn->real_escape_string($_POST['Nome']);
$email = $conn->real_escape_string($_POST['Email']);


$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";


if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
