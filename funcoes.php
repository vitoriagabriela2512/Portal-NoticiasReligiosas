<?php
session_start();

function verificarLogin(){
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
    }
}

function limpar($dados){
    return htmlspecialchars(trim($dados));
}
?>