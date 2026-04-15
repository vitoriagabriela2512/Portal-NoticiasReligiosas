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
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Consciência News</title>
    <link rel="stylesheet" href="style.css">
   
</head>

<body>

<header>
    <div class="logo-area">
        <img src="imagens/logotipo.jpeg">
        <h1>Consciência News</h1>
    </div>
      <section class="container-menu">   <nav>
        <a href="#sobre">Sobre nós</a>
        <a href="#Mundo">Mundo</a>
        <a href="#Brasil">Brasil</a>
        <a href="#Astrologia">Astrologia</a>
        <a href="#Novas noticias">Novas noticias</a>
    </nav>

    <div class="menu">
  <?php if(isset($_SESSION['usuario']) && isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'autor'){ ?>
    <a href="dashboard.php">Painel</a>
    <a href="logout.php">Sair</a>
            
        <?php } else { ?>
            <a href="login.php">Login</a>
            <a href="cadastro.php">Cadastro</a>
        <?php } ?>
    </div>

</section>

   
    <button onclick="toggleDarkMode()" class="dark-btn">🌙</button>
    
</header>

<!-- CLIMA -->
<div id="tempo"></div>

<!-- DESTAQUE -->
<section class="destaque">
    <img src="imagens/logotipo.jpeg">

    <div class="texto">
        <h2>Portal Consciência News</h2>
        <p>Sejam bem-vindos, ao portal de noticias religiosas Consciência News.</p>
    </div>
</section>

<!-- CLIMA -->
  <div class="clima-container">

    <div class="clima-texto">
      <h3>🌤️ Como está o tempo hoje?</h3>
      <p>Confira a previsão antes de sair de casa.</p>
    </div>

    <div class="clima-box">
      <input type="text" id="cidadeInput" placeholder="Digite sua cidade">
      <button onclick="buscarClima()" class="btn-clima">
        Ver previsão
      </button>

      <div class="resultado-clima">
        <p id="temperatura"></p>
        <p id="descricao"></p>
      </div>
    </div>

  </div>

</section>

<section id="sobre">
    <h2> Sobre Nós</h2>

    <div class="card">
    <p>   O Consciência News é um portal independente criado com o objetivo de informar 
de forma clara, consciente e respeitosa sobre os principais acontecimentos do mundo.
</p>

<p>
Nosso foco é trazer notícias sobre religião, espiritualidade, cultura e atualidades,
valorizando a diversidade e promovendo o respeito entre diferentes crenças.
</p>

        <p>Nosso site aborda temas como:</p>

        <ul>
            <li>Notícias do Brasil</li>
            <li>Notícias Internacionais</li>
            <li>Astrologia e espiritualidade</li>
        </ul>

        <p>Nosso compromisso é levar informação com qualidade, clareza e responsabilidade.</p>
    </div>
</section>


<section id="Brasil" class ="Noticias BR">
    <h2>Notícias do Brasil</h2>
     <div class="grid">

    <div class="card">
        <img src="imagens/Brasil1.jpg">
        <h3>Crescimento de eventos religiosos no Brasil</h3>
        <p>Eventos religiosos vêm crescendo em diversas regiões do país, reunindo milhares de pessoas em encontros de fé e espiritualidade.</p>
    </div>
     <div class="card">
        <img src="imagens/Brasil2.jpg">
        <h3>Impacto social das igrejas nas comunidades</h3>
        <p>Instituições religiosas têm atuado diretamente em ações sociais, auxiliando famílias em situação de vulnerabilidade.</p>
    </div>
    
    <div class="card">
        <img src="imagens/Brasil3.jpeg">
        <h3>Intolerância Religiosa</h3>
        <p>O preconceito contra religiões de matriz africana, como Candomblé e Umbanda, é uma forma de racismo religioso enraizada historicamente no Brasil, manifestando-se por meio de perseguições, demonização de crenças, depredação de terreiros e violência física. Ameaças aumentaram 81% entre 2023 e 2024, afetando majoritariamente fiéis negros.</p>
    </div>

     </div>
    

</section>

<!-- NOTÍCIAS FIXAS -->
 <section id ="Mundo"class="Noticias do mundo">
 <h2>Noticias do Mundo</h2>

<div class="grid">

    <div class="card">
        <img src="imagens/noticia1.jpeg">
        <h3>Crise no Santo Sepulcro</h3>
        <p>Bloqueio no Domingo de Ramos gera tensão internacional.</p>
    </div>

    <div class="card">
        <img src="imagens/noticia2.jpeg">
        <h3>Primeira Arcebispa</h3>
        <p>Igreja Anglicana faz história com liderança feminina.</p>
    </div>

    <div class="card">
        <img src="imagens/noticia4.jpeg">
        <h3>União Religiosa Global</h3>
        <p>Ramadã, Quaresma e Ano Novo Lunar se alinham.</p>
    </div>

    <div class="card">
        <img src="imagens/noticia5.jpeg">
        <h3>Ano Novo Budista</h3>
        <p>Festival Songkran celebra renovação espiritual.</p>
    </div>

    <div class="card">
        <img src="imagens/noticia6.jpeg">
        <h3>Vandalismo Religioso</h3>
        <p>Terreiros sofrem ataques e destruição de símbolos.</p>
    </div>

</div>

<form onsubmit="return false;">
    <input type="text" id="busca" placeholder="Buscar notícias...">
        <button type="button" class="btn-voltar" id="btnVoltar">⬅ Voltar</button>
   <button type="button" onclick="buscarNoticias()">Buscar</button>
</form>

 </section>
 
<section id="Astrologia" class="container-astro">

    <h2>🔮 Astrologia - Descubra seu signo</h2>

    <div class="Signo">

        <input type="date" id="dataNascimento">

        <button onclick="
        let d=document.getElementById('dataNascimento').value;
        if(!d){alert('Escolha uma data');return;}
        let data=new Date(d);
        let dia=data.getDate(), mes=data.getMonth()+1;
        let s='';
        if((mes==3&&dia>=21)||(mes==4&&dia<=19))s='Áries ♈';
        else if((mes==4&&dia>=20)||(mes==5&&dia<=20))s='Touro ♉';
        else if((mes==5&&dia>=21)||(mes==6&&dia<=20))s='Gêmeos ♊';
        else if((mes==6&&dia>=21)||(mes==7&&dia<=22))s='Câncer ♋';
        else if((mes==7&&dia>=23)||(mes==8&&dia<=22))s='Leão ♌';
        else if((mes==8&&dia>=23)||(mes==9&&dia<=22))s='Virgem ♍';
        else if((mes==9&&dia>=23)||(mes==10&&dia<=22))s='Libra ♎';
        else if((mes==10&&dia>=23)||(mes==11&&dia<=21))s='Escorpião ♏';
        else if((mes==11&&dia>=22)||(mes==12&&dia<=21))s='Sagitário ♐';
        else if((mes==12&&dia>=22)||(mes==1&&dia<=19))s='Capricórnio ♑';
        else if((mes==1&&dia>=20)||(mes==2&&dia<=18))s='Aquário ♒';
        else s='Peixes ♓';
        document.getElementById('resultado').innerHTML='✨ Seu signo é: <strong>'+s+'</strong>';
        ">Descobrir meu signo</button>

        <!-- 🔥 FALTAVA ISSO -->
        <p id="resultado"></p>

    </div>

    <hr>

    <hr>
    <div class="signos">

        <div class="card">
            <h3>♈ Áries (21/03 – 19/04)</h3>
            <p>Impulsivo, corajoso, líder e competitivo.</p>
        </div>

        <div class="card">
            <h3>♉ Touro (20/04 – 20/05)</h3>
            <p>Determinado, teimoso, calmo e apegado.</p>
        </div>

        <div class="card">
            <h3>♊ Gêmeos (21/05 – 20/06)</h3>
            <p>Comunicativo, curioso, inteligente e sociável.</p>
        </div>

        <div class="card">
            <h3>♋ Câncer (21/06 – 22/07)</h3>
            <p>Sensível, emocional, protetor e intuitivo.</p>
        </div>

        <div class="card">
            <h3>♌ Leão (23/07 – 22/08)</h3>
            <p>Confiante, vaidoso, líder e generoso.</p>
        </div>

        <div class="card">
            <h3>♍ Virgem (23/08 – 22/09)</h3>
            <p>Perfeccionista, organizado, crítico e detalhista.</p>
        </div>

        <div class="card">
            <h3>♎ Libra (23/09 – 22/10)</h3>
            <p>Justo, charmoso, sociável e diplomático.</p>
        </div>

        <div class="card">
            <h3>♏ Escorpião (23/10 – 21/11)</h3>
            <p>Intenso, misterioso, determinado e profundo.</p>
        </div>

        <div class="card">
            <h3>♐ Sagitário (22/11 – 21/12)</h3>
            <p>Aventureiro, sincero, livre e otimista.</p>
        </div>

        <div class="card">
            <h3>♑ Capricórnio (22/12 – 19/01)</h3>
            <p>Responsável, ambicioso, disciplinado e focado.</p>
        </div>

        <div class="card">
            <h3>♒ Aquário (20/01 – 18/02)</h3>
            <p>Criativo, independente, inteligente e diferente.</p>
        </div>

        <div class="card">
            <h3>♓ Peixes (19/02 – 20/03)</h3>
            <p>Sonhador, sensível, empático e criativo.</p>
        </div>

    </div>
</section>

<!-- NOTÍCIAS DO BANCO -->
 <section id = "Novas noticias"class="titulo">
    <h2>Notícias Recentes</h2>

<div class="grid">

<?php
$sql = "SELECT noticias.*, usuarios.nome 
        FROM noticias 
        JOIN usuarios ON noticias.autor=usuarios.id 
        ORDER BY data DESC";

        

$res = mysqli_query($conn, $sql);




while($n = mysqli_fetch_assoc($res)){
?>

    <div class="card">
        <img src="<?php echo $n['imagem']; ?>">
        <h3><?php echo $n['titulo']; ?></h3>
        <p><?php echo substr($n['noticia'],0,100); ?>...</p>
        <small><?php echo $n['nome']; ?></small>
        <a href="noticia.php?id=<?php echo $n['id']; ?>" class="btn-ler">Ler mais</a>
    </div>

<?php } ?>
</div>
 </section>

<footer class="rodape">
    <p>© 2026 Portal News - Todos os direitos reservados</p>
    <p>Desenvolvido por Vitória Gabriela Fernandes da Luz</p>
</footer>
 <script src="script.js" defer></script>
</body>
</html>
