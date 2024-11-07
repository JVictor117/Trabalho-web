<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "teste";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}


$sql = "SELECT * FROM noticias WHERE status = 'ativa' ORDER BY data_publicacao DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes News</title>
    <link rel="stylesheet" href="style5.css">
    <header class="cabecalho">
        <div class="header"></div>
        <h1 id="Titulo">Filmes News</h1>
        <nav>
            <ul class="menu">
                <li><a href="#home">Home</a></li>
                <li><a href="noticias.php">Notícias</a></li> 
                <li><a href="Sobre.html">Sobre</a></li>
                <li><a href="Contato.html">Contato</a></li> 
                <li><a href="cadastro.html">Cadastro</a></li>    
                      
            </ul>
        </nav> 
    </header>   
</head>
<body>
    <h1>Notícias</h1>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["titulo"] . "</h2>";
            echo "<p>" . $row["conteudo"] . "</p>";
            echo "<small>Publicado em: " . $row["data_publicacao"] . " por " . $row["autor"] . "</small><hr>";
        }
    } else {
        echo "<p>Nenhuma notícia ativa no momento.</p>";
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
