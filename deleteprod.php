<?php
session_start();
include_once('config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit;
}
$logado = $_SESSION['email'];

// Consulta para selecionar os itens deletados (visivel = 0)
$sql = "SELECT idprod, produto, funcionario_deletou, data_hora_delecao FROM produtos WHERE visivel = 0 ORDER BY idprod DESC";

$result = $conexao->query($sql);
if (!$result) {
    die("Query failed: " . $conexao->error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens Deletados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            color: white; /* Define a cor do texto para branco */
            background: rgb(85, 0, 105);
            padding: 20px;
        }
        .navbar-brand,
        .btn {
            color: white !important; /* Cor branca para texto nos links e botões */
        }
        .navbar-dark .navbar-toggler-icon {
            background-color: white; /* Ícone do toggler com fundo branco */
        }
        .table-bg {
            color: white; /* Cor branca para o texto na tabela */
            background: rgb(85, 0, 105);
            border-radius: 15px 15px 0 0;
        }
        th,
        td {
            color: white; /* Cor branca para texto nas células da tabela */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ITENS DELETADOS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php echo "<h1>Bem-vindo <u>$logado</u></h1>"; ?>
    <br>
    <div class="m-5">
        <table class="table table-striped table-bordered table-hover text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Funcionário que Deletou</th>
                    <th scope="col">Data/Hora da Deleção</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['idprod']."</td>";
                    echo "<td>".$row['produto']."</td>";
                    echo "<td>".$row['funcionario_deletou']."</td>";
                    echo "<td>".$row['data_hora_delecao']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
