<?php
include("verifica_login.php");
include("conexao.php");

if($_POST){
    $titulo = $_POST['titulo'];
    $texto = $_POST['noticia'];
    $autor = $_SESSION['usuario'];

    $img = "imagens/" . $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], $img);

    $sql = "INSERT INTO noticias (titulo,noticia,autor,imagem)
    VALUES ('$titulo','$texto','$autor','$img')";

    mysqli_query($conn,$sql);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novas noticias</title>
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
      
<form method="POST" enctype="multipart/form-data">
    
   
<input name="titulo" required>
<textarea name="noticia" required></textarea>
<input type="file" name="imagem" required>
<p>Adicione uma imagem e descreva sua noticia, obrigatoriamente!
<br>Para q possa adicionar sua nova noticia.</p>
<button onclick="history.back()" class="btn-voltar">⬅ Voltar</button>
<button>Publicar</button>
</form>
    </div>
    
</body>
</html>
