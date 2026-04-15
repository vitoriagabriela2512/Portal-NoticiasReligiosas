<?php
include("conexao.php");

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$erro = "";

if($_POST){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) > 0){

        $usuario = mysqli_fetch_assoc($res);

        if(password_verify($senha, $usuario['senha'])){

            $_SESSION['usuario'] = $usuario['id'];
            $_SESSION['tipo'] = $usuario['tipo'];

            // COOKIE
            if(isset($_POST['lembrar'])){
                setcookie("usuario", $usuario['id'], time() + (86400 * 30), "/", "", false, true);
            }

            if($usuario['tipo'] == 'autor'){
                header("Location: dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit;

        } else {
            $erro = "Senha incorreta";
        }

    } else {
        $erro = "Usuário não encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-wrapper">



<?php if($erro != ""){ ?>
<p class="erro"><?php echo $erro; ?></p>
<?php } ?>

<form class="box" method="POST">
    <h2>Login</h2>
  
   
<input type="email" name="email" placeholder="Email" required>

<input type="password" name="senha" placeholder="Senha" required>

<button onclick="history.back()" class="btn-voltar">⬅ Voltar</button>

<button type="submit">Entrar</button>
<p>
Não tem conta? <a href="cadastro.php">Cadastrar</a>
</p>


</form>


</div>

</body>
</html>