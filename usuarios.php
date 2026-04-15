<?php
include("verifica_login.php");
include("conexao.php");

$sql = "SELECT * FROM usuarios";
$res = mysqli_query($conn,$sql);

while($u = mysqli_fetch_assoc($res)){
echo $u['nome'] . " - " . $u['email'] . "<br>";
}
?>