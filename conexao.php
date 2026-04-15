<?php
$conn = mysqli_connect("localhost", "root", "", "portaldenoticias");

if(!$conn){
    die("Erro na conexão: " . mysqli_connect_error());
}
?>