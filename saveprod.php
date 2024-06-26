<?php
include_once('config.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $prateleira = $_POST['prateleira'];
    $data_comp = $_POST['data_comp'];
    $validade = $_POST['validade'];

    $sqlUpdate = "UPDATE produtos SET produto='$produto', preco='$preco', quantidade='$quantidade', prateleira='$prateleira', data_comp='$data_comp', validade='$validade' WHERE idprod=$id";

    if ($conexao->query($sqlUpdate) === TRUE) {
        header('Location: prods.php');
    } else {
        echo "Erro ao atualizar registro: " . $conexao->error;
    }
}
?>
