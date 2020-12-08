<?php

require

// EXIBE O CARRINHO

// se o carrinho estiver vazio, faça
if(count($_SESSION['itens']) == 0) {
    echo 'Carrinho Vazio<br><a href="index.php">Adicionar itens</a>';
} else{
    $conexao = new PDO(
        'mysql:host=localhost;
        dbname=meusprodutos',
        "root", 
        "");
        
    foreach($_SESSION['itens'] as $idProduto => $quantidade)
    {
        $select = $conexao -> prepare ("SELECT * FROM produtos WHERE produto_id=?");
        $select -> bindParam(1, $idProduto);
        $select -> execute();
        $produtos = $select -> fetchAll();
        $total = $quantidade * $produtos[0]["produto_preco"];

        echo 
            'Nome do produto: '.$produtos[0]["produto_nome"].'<br/>
            Preço do produto: '.number_format($produtos[0]["produto_preco"], 2,",",".") .'<br/>
            Quantidade: '.$quantidade.'<br/>
            Total: ' .number_format($total,2,",",".").'<br/>
            <a href="remover.php?remover=carrinho&produto_id='.$idProduto.'">Remover</a>
            <hr>
            ';
    }
}

}

