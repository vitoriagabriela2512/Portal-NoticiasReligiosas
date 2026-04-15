<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

include("conexao.php");

// COOKIE → RECRIAR SESSÃO
if(!isset($_SESSION['usuario']) && isset($_COOKIE['usuario'])){
    $id = $_COOKIE['usuario'];

    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) > 0){
        $usuario = mysqli_fetch_assoc($res);

        $_SESSION['usuario'] = $usuario['id'];
        $_SESSION['tipo'] = $usuario['tipo'];
    }
}

// BLOQUEIO
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}
?>