<?php
session_start();
include('Banco.php');
print_r($_POST);
var_dump(($_POST));


$nome = $_POST['nome'];
$email = $_POST['email'];
$end = $_POST['endere'];
$cidade = $_POST['cid'];
$sobrenome =  $_POST['sobrenome'];
$CPF = $_POST['CPF'];
$CEP = $_POST['CEP'];
$senha = $_POST['senha'];
$estado = $_POST['estado'];

$query = "SELECT email_Usuario FROM tb_Usuario WHERE email_Usuario = '$email'";
//$select = mysql_query($conexao,$query_select);
$result= mysqli_query($conexao,$query);
$array = mysqli_fetch_array($result);
$logarray = $array['inputEmail'];


  ## Validação

  if($email == "" || $nome == "" || $end == "" || $cidade == "" || $sobrenome == "" || $CPF == ""|| $CEP == "" || $senha == "" ){
    echo"<script language='javascript' type='text/javascript'>
    alert('Existem campos em Branco !');window.location.
    href='cadastro.php'</script>";

    
  }

  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.php';</script>";

    }else{
      if($logarray == $email){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.php';</script>";
        die();

      }else{
        $query = "INSERT INTO tb_usuario (nome_Usuario,email_Usuario,senha_Usuario,enderec_Usuario,cpf_Usuario,cidade_Usuario,cep_Usuario,Estado) VALUES ('$nome','$email',md5('$senha'),'$end','$CPF','$cidade','$CEP','$estado')";
        $insert = mysqli_query($conexao,$query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.php'</script>";
        }
      }
    }
?>
