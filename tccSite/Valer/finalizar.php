<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Valer/style/partials/finalizar.css">
    <title>Sua compra</title>
</head>
<body>
    <div class="header">
        <img id="logoEm" src="../Valer/assets/ezgif.com-crop (2).gif" alt="Temporizador">
        Temporizador | Ponto Certo
    </div>

    <nav id="nav-landing">
        <ul>
            <!-- <a href="index.php">Login</a> -->
            <a href="index.php">Sair</a>
            <a href="cadastro.php">Cadastro</a>
            <a href="shop.php">Loja</a>
            <!-- <a href="">Conta</a> -->
            <a href="sobre.php">Sobre nós</a>
        </ul>
    </nav>


    <div id="page-content">

        <?php 
        session_start();

        foreach($_SESSION['dados'] as $produtos){
            $conexao = new PDO( 'mysql:host=localhost; dbname=meusprodutos', "root", "");
            $insert = $conexao->prepare("INSERT INTO tb_pedido () VALUES (NULL,?,?,?,?)");
            $insert->bindParam(1,$produtos['id_produto']);
            $insert->bindParam(2,$produtos['quantidade']);
            $insert->bindParam(3,$produtos['preco_produto']);
            $insert->bindParam(4,$produtos['total']);
            $insert->execute();
        }
        ?> 

        <div id="fin-content">
            <h1> Compra realizada com sucesso </h1>
                
            Você comprou <?= $produtos['quantidade']?> Temporizator(res). Total de R$<?= number_format($produtos['total'],2,",",".")?>. <br/><br/>
            <?php
            echo '<a href="remover_finaliza.php?remover_finaliza=shop">Volte ao início</a>';
            ?>

        </div>
        
        <div id="img-content">
            <img class="img img-cook" src="../Valer/assets/Gingerbread man cookies-amico.svg" alt="">
        </div>

    </div>
</body>
</html>