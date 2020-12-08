<?php
session_start();
$conexao = new PDO('mysql:host=localhost;dbname=meusprodutos', "root", "");
$select = $conexao -> prepare ("SELECT * FROM tb_Produtos");
$select -> execute();
$fetch = $select -> fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Valer/style/partials/shop1.css">
    
    <title>Loja</title> 
</head>
<body>
    <div class="navbar">
        <ul>
            <img id="logo" src="../valer/assets/logo.gif" alt="">
            <li><a href="carrinho.php"><img id="cesta" src="../valer/assets/cesta_decompra.png" alt="Seu Carrinho"></a></li>
            <!-- <li><a href="#"><img id="user" src="../valer/assets/user-id-icon_34334.png" alt=""></a></li> -->
            <li><a href="../valer/index.php"><img id="saida" src="../valer/assets/icons8-sign-out-90.png" alt="Sair"></a></li>
            <li id="litemp">Temporizador | Ponto Certo</li>
        </ul>
    </div>
    
    
<?php

foreach($fetch as $produto){?>
    
    <div id="page-content">
            <div id="descricao-content">
                <h3>Descrição do Produto</h3>
                <p>Usado para configurar o tempo em que deseja a evasão do gás de cozinha.
                </p>
                <p>Tensão Elétrica: 110v<br/><br/>
                <strong>Passo a passo de uso</strong><br/><br/>
                1° Baixe o App Ponto Certo<br/>
                2° Ative o bluetooth do seu celular<br/>
                3° Quando logar pela primeira vez, utilize o email:
                teste@teste.com e a senha: 1234<br/>
                4° Pareie o seu bluetooth com o do produto<br/>
                5° Cronometre o tempo que desejar
                </p>
            </div>
            <div id="fotos">
                <h2>Conjunto de 5 válvulas</h2>
                <!-- <h2>Temporizador de Gás</h2> -->
                <div class="foto">
                <!-- foto do produto -->
                <img id="fotinha" src="../Valer/assets/valvulafinalf.png" alt="">
                
                </div>
                <p id="pFoto">Imagem ilustrativa</p>
            </div>

            <div class="page-comp">

                <form action="" class="compra">
                    <div id="labels">
                    
                        <h2 class="titulo" for="">Produto: <?= $produto['nome_produto']?></h2> <br/>
                        <label for="">Por apenas</label>
                        <label class="preco" for="">R$<?= number_format($produto['preco_produto'],2,",",".")?></label> <br/> <!-- aqui vc pode fazer com echo -->
                        
                        
                    </div>
                    
                    <h3 class="estoqueV">Produtos em estoque: <strong> <?=$produto['quantidade']?></strong></h3><br/>
                    <hr/>


                    <label class="pague" for=""><strong>Pague em: </strong></label>
                    <input type="" list="parcelas" name="parcela" id="parcela">
                    <datalist id="parcelas">
                        <option value="1x R$<?= number_format($produto['preco_produto'],2,",",".")?>">
                        <option value="2x R$<?= number_format(($produto['preco_produto']/2),2,",",".")?>">
                        <option value="3x R$<?= number_format(($produto['preco_produto']/3),2,",",".")?>">
                        <option value="4x R$<?= number_format(($produto['preco_produto']/4),2,",",".")?>">
                        <option value="5x R$<?= number_format(($produto['preco_produto']/5),2,",",".")?>">
                        <option value="6x R$<?= number_format(($produto['preco_produto']/6),2,",",".")?>">
                        <option value="7x R$<?= number_format(($produto['preco_produto']/7),2,",",".")?>">
                        <option value="8x R$<?= number_format(($produto['preco_produto']/8),2,",",".")?>">
                        <option value="9x R$<?= number_format(($produto['preco_produto']/9),2,",",".")?>">
                        <option value="10x R$<?= number_format(($produto['preco_produto']/10),2,",",".")?>">
                    </datalist><br/>
            <div class="cep-content">
            </div>
            
            <hr>
            <?php } ?>

            <?php echo '<a class="botaoADD" href="carrinho.php?add=carrinho&id_produto='.$produto['id_produto'].'"> Adicionar ao carrinho</a> <br/>' ?>
        
    </div> <!-- término da 1° div -->
</body>
</html>