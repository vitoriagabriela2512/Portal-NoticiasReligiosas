<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

include("conexao.php");

$codigo_secreto = "123456";

if($_POST){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    $codigo = $_POST['codigo'];

    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    if($tipo == "autor"){
        if(empty($codigo)){
            echo "Digite o código!";
            exit;
        }

        if($codigo != $codigo_secreto){
            echo "Código de autor inválido!";
            exit;
        }
    }

    $sql_check = "SELECT * FROM usuarios WHERE email='$email'";
    $res_check = mysqli_query($conn, $sql_check);

    if(mysqli_num_rows($res_check) > 0){
        echo "Email já cadastrado!";
    } else {

    
        $sql = "INSERT INTO usuarios (nome, email, senha, tipo)
        VALUES ('$nome', '$email', '$senha', '$tipo')";

        if(mysqli_query($conn, $sql)){
            header("Location: login.php");
            exit;
        } else {
            echo "Erro ao cadastrar";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="form-wrapper">
        
<form class="box" method="POST">
<h2>Cadastro</h2>
   
<input name="nome" placeholder="Nome" required>
<input name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>

<select name="tipo" required>
    <option value="">Selecione</option>
    <option value="leitor">Leitor</option>
    <option value="autor">Autor</option>
</select>

<input name="codigo" placeholder="Código (apenas autor)">
<button onclick="history.back()" class="btn-voltar">⬅ Voltar</button>
<button>Cadastrar</button>
</form>

    </div>
</body>
</html>

