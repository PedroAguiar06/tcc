<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="pT_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Valer/style/partials/page-cada.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">

    <title>Cadastro | Temporizador</title>
</head>
<body>  
    <div class="header">
        Temporizador | Ponto Certo
    </div>

    <nav id="nav-landing">
        <ul>
            <!-- <a href="index.php">Login</a> -->
            <a href="index.php">Login</a>
            <a href="shop.php">Loja</a>
            <!-- <a href="">Conta</a> -->
            <a href="sobre.php">Sobre nós</a>
        </ul>
    </nav>

    <!-- <div class="notification is-success">
                      <p>Cadastro efetuado!</p>
                      <p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>
                    </div>
                    <div class="notification is-info">
                        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div> -->

      <form  action="Cadastrei.php" method="POST" onsubmit="return valida()">
        <div class="col-3">
              <label for="inputName">Nome: </label>
              <input type="text" class="form-control" id="inputName"  placeholder="Pedro" name="nome">

              <label for="inputEmail">Email: </label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="algumacoisa@gmail.com">

              <label for="inputEnd">Endereço: </label>
              <input type="text" class="form-control" id="inputEnd" name="endere" placeholder="Rua Santo Antônio Damasso">
              
              <label for="inputCity">Cidade: </label>
              <input type="text" class="form-control" id="inputCity" name="cid" placeholder="São Paulo ">
            </div>

          <div class="col-3">
            <label for="inputLast">Sobrenome: </label>
            <input type="text" class="form-control" name="sobrenome" id="inputLast" placeholder="Oliveira de Aguiar ">

            <label for="inputSenha">Senha: </label>
            <input type="password" class="form-control" name="senha" id="inputSenha" placeholder="********">
            
            <div class="early">
              <div class="early-right">
                <label for="inputCPF" id="lb-cpf">CPF: </label>
                <input type="text" class="form-control" id="inputCPF" name="CPF" placeholder="000.000.000.01" maxlength="11" onkeypress='return SomenteNumero(event)'>
              </div>

              <div class="early-left">
                <label for="inputCEP" id="lb-cep">CEP: </label>
                <input type="text" class="form-control" name="CEP" id="inputCEP" placeholder="04936-000" maxlength="9" onkeypress='return SomenteNumero(event)'>
              </div>
            </div> 

            <div class="late">
              <div class="late-left">
              <label for="inputEstado">Estado: </label>
                <select id="inputEstado" class="form-control">
                  <option selected></option>
                  <option>SP</option>
                  <option>SP</option>
                  <option>SP</option>
                  <option>SP</option>
                  <option>SP</option>
                </select>
              </div>
              <div class="late-right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
          </div>

        </div>      
      </form>

    <div class="containerImg">
      <img src="../Valer/assets/Cooking-pana.svg" alt="">
    </div>
    <script language='JavaScript'>
      function SomenteNumero(e){
          var tecla=(window.event)?event.keyCode:e.which;   
          if((tecla>47 && tecla<58)) return true;
          else{
              if (tecla==8 || tecla==0) return true;
          else  return false;
          }
      }
      </script>

</body>
</html>