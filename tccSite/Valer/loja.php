<?php
$conexao = new PDO('mysql:host=localhost;dbname=meusprodutos', "root", "");
// setinha -> acessar método, a seguir, o nome do metodo
$select = $conexao -> prepare ("SELECT * FROM produtos");
$select->execute();
// featchall - retorna dados
$fetch = $select->fetchAll();

//os itens que estão na var fetch em uma var produto

// var_dump($fetch);

foreach($fetch as $produto) {

    // esse ponto . é para concatenar a string do Echo e a variavel
    // esse $produto é uma var que dentro dela está uma coluna da tabela do BD
    echo 'Nome do produto: '.$produto['produto_nome']. ' &nbsp; 
    Quantidade: ' .$produto['produto_quant']. ' &nbsp;
    Preço: R$' .number_format($produto['produto_preco'],2,",","."). '
    
    <a href="carrinho.php?add=carrinho&produto_id=' .$produto['produto_id']. '"> Adicionar ao carrinho</a> 
    <br/>';
}
?>

<!-- //#<a href="carrinho.php?add=carrinho&id=' .$produto['produto_id']. '"> Adicionar ao carrinho</a> 
    <br/>'; # /*  -->