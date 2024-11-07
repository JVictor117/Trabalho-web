<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "teste";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $conteudo = $_POST["conteudo"];
    $autor = $_POST["autor"];
    $status = $_POST["status"];

    $sql = "INSERT INTO noticias (titulo, conteudo, autor, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $titulo, $conteudo, $autor, $status);

    if ($stmt->execute()) {
        echo "<p>Notícia cadastrada com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar notícia: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

