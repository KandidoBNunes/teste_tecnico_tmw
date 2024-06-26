<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('config.php'); 

    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);

    $sql = "SELECT * FROM new_table WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result && $result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        if ($usuario['estado'] == 'ativo') {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            if ($usuario['permission'] == 'especial') {
                header('Location: hub.html');
                exit;
            } else {
                header('Location: hubc.html');
                exit;
            }
        } else {
            // Usuário inativo
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php?error=inativo');
            exit;
        }
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php?error=credenciais');
        exit;
    }
} else {
    header('Location: login.php?error=formulario');
    exit;
}
?>