<?php
include("verifica_login.php");
include("conexao.php");

$id = $_GET['id'];
$usuario = $_SESSION['usuario']; // ✅ CORRETO

// SEGURANÇA: só exclui se for o autor
$sql = "DELETE FROM noticias WHERE id='$id' AND autor='$usuario'";

mysqli_query($conn,$sql);

header("Location: dashboard.php");
exit;
?>