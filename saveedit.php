<?php
include_once('config.php');
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $permission = $_POST['permission'];
    $estado = $_POST['estado'];
    
    $sqlInsert = "UPDATE new_table 
    SET nome='$nome', senha='$senha', email='$email', telefone='$telefone', sexo='$sexo', data_nasc='$data_nasc', permission='$permission', estado='$estado'
    WHERE idnew_table=$id";
    $result = $conexao->query($sqlInsert);

    if ($result) {
        echo "Update successful!";
    } else {
        echo "Error: " . $conexao->error;
    }
}
header('Location: sistema.php');
exit;
?>
