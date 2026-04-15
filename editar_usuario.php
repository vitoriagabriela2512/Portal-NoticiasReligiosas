<?php
include("verifica_login.php");
include("conexao.php");

$id = $_SESSION['usuario']; // ✅ correto

// BUSCAR DADOS DO USUÁRIO
$sql = "SELECT * FROM usuarios WHERE id='$id'";
$res = mysqli_query($conn, $sql);
$usuario = mysqli_fetch_assoc($res);

// ATUALIZAR
if($_POST){
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios 
    SET nome='$nome', email='$email'
    WHERE id='$id'";

    mysqli_query($conn,$sql);

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
</head>
<body>
    <div class="box">
<form method="POST">
      <link rel="stylesheet" href="style.css">
   
<input name="nome" value="<?php echo $usuario['nome']; ?>" required>
<input name="email" value="<?php echo $usuario['email']; ?>" required>
<button onclick="history.back()" class="btn-voltar">⬅ Voltar</button>
<button>Salvar</button>
</form>
    </div>
    
</body>
</html>
