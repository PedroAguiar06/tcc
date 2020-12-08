
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Valer/style/partials/carrinho1.css">
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
            <a href="index.php">Login</a>
            <a href="cadastro.php">Cadastro</a>
            <a href="shop.php">Loja</a>
            <!-- <a href="">Conta</a> -->
            <a href="sobre.php">Sobre nós</a>
        </ul>
    </nav>

    <div class="page-content">

    
        <div id="detalhes">

            <h4>Informações da compra</h4>
            <?php
            session_start();
            if(!isset($_SESSION['itens']))
            {
                $_SESSION['itens'] = array();
            }
            //isset -> se EXISTIR
            if(isset($_GET['add']) && $_GET['add'] == "carrinho"){

                // ADICIONA AO CARRINHO
                $idProduto = $_GET['id_produto'];
                // exclamação é não, ou seja, na linha de baixo, Se NÃO EXISTIR a sessão itens, coloca a var de produto
                //se não tiver nenhum produto com aquele x id adicionado, atribui o valor de 1, se não, se já tiver o produto, aumenta a quantidade
                if(!isset($_SESSION['itens'][$idProduto]))
                {
                    $_SESSION['itens'][$idProduto] = 1;
                } else{
                    $_SESSION['itens'][$idProduto] += 1;
                }
            }

            // EXIBE O CARRINHO

            // se o carrinho estiver vazio, faça
            if(count($_SESSION['itens']) == 0) {
                echo '
                <h2 class="seucar"> Seu carrinho </h2>
                Carrinho Vazio<br><a class="addItems" href="shop.php">Adicionar itens</a>';
            } else{
                $conexao = new PDO(
                    'mysql:host=localhost;
                    dbname=meusprodutos',
                    "root", 
                    "");

                    $_SESSION['dados'] = array();
                        
                    foreach($_SESSION['itens'] as $idProduto => $quantidade)
                    {
                        $select = $conexao -> prepare ("SELECT * FROM tb_Produtos WHERE id_produto=?");
                        $select -> bindParam(1, $idProduto);
                        $select -> execute();
                        $produtos = $select -> fetchAll();
                        $total = $quantidade * $produtos[0]["preco_produto"];

                        echo 
                            'Nome do produto: '.$produtos[0]["nome_produto"].'<br/>
                            Preço do produto: '.number_format($produtos[0]["preco_produto"], 2,",",".") .'<br/>
                            Quantidade: '.$quantidade.'<br/>
                            Total: '.number_format($total,2,",",".").'<hr class="hr">';

                            ?>    
                                <label class="pague" for=""><strong>Pague em: </strong></label>
                                <input type="" list="parcelas" name="parcela" id="parcela">
                                <datalist id="parcelas">
                                <option value="1x R$<?= number_format($total,2,",",".")?>">
                                <option value="2x R$<?= number_format($total/2,2,",",".")?>">
                                <option value="3x R$<?= number_format($total/3,2,",",".")?>">
                                <option value="4x R$<?= number_format($total/4,2,",",".")?>">
                                <option value="5x R$<?= number_format($total/5,2,",",".")?>">
                                <option value="6x R$<?= number_format($total/6,2,",",".")?>">
                                <option value="7x R$<?= number_format($total/7,2,",",".")?>">
                                <option value="8x R$<?= number_format($total/8,2,",",".")?>">
                                <option value="9x R$<?= number_format($total/9,2,",",".")?>">
                                <option value="10x R$<?= number_format($total/10,2,",",".")?>">
                                </datalist><br/>
                            <?php
                            
                            echo '';

                        array_push($_SESSION['dados'],
                        array(
                        'id_produto'=>$idProduto, 
                        'quantidade'=> $quantidade,
                        'preco_produto' =>$produtos[0]["preco_produto"],
                        'total' => $total
                        )
                    );
                }
                echo '<div id="btns" > 
                        <a class="btn btn-fin" href="finalizar.php">Finalizar Pedido</a>

                        <a class=" btn btn-rem" href="remover.php?remover=carrinho&id_produto='.$idProduto.'">Remover</a>
                
                         <a class="btn btn-volt" href="shop.php?shop=carrinho&id_produto='.$idProduto.'">Voltar</a>
                     </div> ';
            }

            ?>
        </div>
        <div id="page-car">

            <h4> Informações do Cartão de Crédito</h4>

            <div class="car-content">
                <div class="coluna1">
                    <label for="">Nome no cartão</label>
                    <input type="text" id="txtTest" oninput="handleInput(event)" />

                    <label for="">Número do cartão</label>
                    <input class="" type='text' maxlength="16" value='' onkeypress='return SomenteNumero(event)'>
                    <!-- <input class="modalIn" type="text" id="card" maxlength="16" pattern="([0-9]{16})"> -->
                </div>
                <div class="coluna2">
                    <label for="">Data de Expedição</label>
                    <input class="modalIn" type="month">

                    <label for="">CVV</label>
                    <!-- <input class="modalIn cvv" id="field" type="text" maxlength="3" pattern="([0-9]{3})"/> -->
                    <input class="cvv" type='text' maxlength="3" value='' onkeypress='return SomenteNumero(event)'>
                </div>

            </div>

        </div>

        

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

   // input letra maiúscula
    function handleInput(e) {
        var ss = e.target.selectionStart;
        var se = e.target.selectionEnd;
        e.target.value = e.target.value.toUpperCase();
        e.target.selectionStart = ss;
        e.target.selectionEnd = se;
}
    </script>
</body>
</html>