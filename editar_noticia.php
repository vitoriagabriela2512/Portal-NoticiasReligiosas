<?php

include("verifica_login.php");
include("conexao.php");

$id = $_GET['id'];
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM noticias WHERE id=$id AND autor=$usuario";
$res = mysqli_query($conn,$sql);
$n = mysqli_fetch_assoc($res);

if($_POST){
$titulo = $_POST['titulo'];
$texto = $_POST['noticia'];

$sql = "UPDATE noticias 
SET titulo='$titulo', noticia='$texto'
WHERE id=$id AND autor=$usuario";

mysqli_query($conn,$sql);
header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>editar_noticia</title>
      <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="box">

<form method="POST">
      
   
<input name="titulo" value="<?php echo $n['titulo']; ?>">
<textarea name="noticia"><?php echo $n['noticia']; ?></textarea>
<button onclick="history.back()" class="btn-voltar">⬅ Voltar</button>
<button>Salvar</button>
</form>
 </div>
      
</body>
</html>
