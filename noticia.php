<?php
include("conexao.php");


$id = intval($_GET['id']); // segurança

$sql = "SELECT noticias.*, usuarios.nome 
FROM noticias 
JOIN usuarios ON noticias.autor = usuarios.id
WHERE noticias.id=$id";

$res = mysqli_query($conn, $sql);
$n = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Noticias</title>
</head>
<body>
<section class="buscar-card">
    <img src="<?php echo $n['imagem']; ?>">
        <h3><?php echo $n['titulo']; ?></h3>
        <p><?php echo nl2br($n['noticia']); ?></p>
        <small><?php echo $n['nome']; ?></small>
        <button onclick="history.back()" class="btn-voltar">⬅ Voltar</button>

</section>
        
    

</body>
</html>
