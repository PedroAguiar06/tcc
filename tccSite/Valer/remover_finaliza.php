<?php
    session_start();  
    if(isset($_GET['remover_finaliza']) && $_GET['remover_finaliza'] == "shop"){
        $idProduto = $_GET['id_produto'];
        unset($_SESSION['itens'][$idProduto]);
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=shop.php"/>';
    }
?>