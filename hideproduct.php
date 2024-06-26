<?php
session_start();
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idprod = $_POST['idprod'];
    $funcionario_deletou = $_SESSION['email'];
    $data_hora_delecao = date('Y-m-d H:i:s');

    // Ocultar o produto
    $sql = "UPDATE produtos 
            SET visivel = 0, 
                funcionario_deletou = '$funcionario_deletou', 
                data_hora_delecao = '$data_hora_delecao' 
            WHERE idprod = $idprod";

    if ($conexao->query($sql) === TRUE) {
        // Gerar log (opcional)
        $logMessage = "Produto ID $idprod ocultado por $funcionario_deletou em $data_hora_delecao";
        file_put_contents('logs.txt', $logMessage . PHP_EOL, FILE_APPEND);

        echo "Produto ocultado com sucesso";
    } else {
        echo "Erro ao ocultar produto: " . $conexao->error;
    }
}
?>

