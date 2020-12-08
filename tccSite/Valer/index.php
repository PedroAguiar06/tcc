<?php
session_start()

?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Valer/style/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Valer/scripts/index.js">
    
    <link rel="stylesheet" href="../Valer/style/partials/page-landing.css">
    
    <title>Ponto Certo | Temporizator </title>
</head>
<body id="back-landing">
    <!-- <nav id="navi">
        <ul class="active">
            <li><a id="navL" href="index.html"><img src="./assets/logo.jpeg" alt=""></a></li>
            <li><a href="#">Quem somos</a></li>
            <li><a href="#">Nossos Produtos</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </nav> -->
    <div id="page-landing" class="first-section">
        <div id="container">
            <div class="logo-container">
                <img id="logoEm" src="../Valer/assets/ezgif.com-crop (2).gif" alt="Temporizador"> <h1>| Temporizador</h1>
                <!-- <h2>Bem-Vindo ao site Ponto Certo</h2> -->
            </div>
            <h2 class="titulo">Bem-Vindo ao site Ponto Certo</h2>
        </div>

        <p class="description">O produto certo para trazer segurança para sua casa e para sua família,
             se encontra aqui! Logue para fazer a sua compra agora!</p>
        <div class="buttons-container">
            <a href="#">
                <button id="btnFunc" class="login">
                    <img src="../Valer/assets/login.png" alt="Logar">
                    Logar
                </button>
            </a>
            <a href="cadastro.php">
                <button class="cadastro">
                    <img src="../Valer/assets/cadastro.png" alt="Cadastro">
                    Cadastre-se
                </button>
            </a>
        </div>
    </div>
    <div id="right-landing" class="first-section">
        <!-- <p class="description2">Acabe com a entrada de gás na hora e no local que desejar com apenas um toque!</p> -->
        <p class="description2">Cozinhe sem se preocupar! Mostre a sua arte para sua família, faça os seus pratos, use as panelas, ponha mão na massa e, não se esqueça de ativar
            no seu app, Ponto Certo, o tempo que você deseja que a entrada de gás fique aberta, protegendo dessa forma, você, sua casa e família!
        </p>
        <div class="img-svg">
            <img class="fogao-svg" src="../Valer/assets/Cooking-cuate (1).svg" alt="">
            
        </div>
    </div>
      <?php
         if(isset($_SESSION['não autenticado'])):
            echo "<script type='text/javascript'>
                alert('Login incorreto');
                window.location.href='index.php'
            </script>"
         ?>
         <!-- <div class="notification is-danger">
         <p> Error: Usuário ou senha inválidos </p> -->
         <div>
         <?php
         endif;
         unset($_SESSION['não autenticado']);
      ?>   
    
   <div id="myModal" class="modal">
    <form method="POST" action="login.php" id="ok">

            <div class="modal-content">
                  <span class="close">&times;</span>
                  <h2>Logue agora!</h2>
                     <label for="login" >E-mail: </label>
                     <input type="text" name="login"  id="login" placeholder="Ex: pedroLindao@gmail.com">
                     <label for="senha" >Senha: </label>
                     <input type="password"  name="senha" id="senha" placeholder="Ex: ****** ">
                     
                  <input type="submit" value="Logar">
                  
                  <div class="container" style="background-color:#f1f1f1">
                     <button type="button" onclick="document.getElementByClassName('cancelbtn').style.display='none'" class="cancelbtn">Cancel</button>
                     <span class="psw">Esqueceu a sua <a href="#">senha?</a></span>
                  </div>
            </div>
      </form>
   </div>
    
 <script src="../Valer/scripts/index.js"></script>
</body>
</html>