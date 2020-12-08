<?php 
session_start();
include('Banco.php');

/*if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}*/

$usuario = mysqli_real_escape_string($conexao,$_POST['login']);
$senha =mysqli_real_escape_string($conexao,$_POST['senha']);

$query = "select email_Usuario from tb_usuario where email_Usuario = '$usuario' ";

$result= mysqli_query($conexao,$query);

$row= mysqli_num_rows($result);

if($row==1){
    $_SESSION ['login']= $usuario;
    // header('Location: painel.php');
    header('Location: shop.php');
}else{
    $_SESSION['não autenticado'] = true;
    header('Location: index.php');
};

?>