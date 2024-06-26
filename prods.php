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

$sql = "SELECT * FROM produtos WHERE visivel = 1 ORDER BY idprod DESC";
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM produtos WHERE visivel = 1 AND (idprod LIKE '%$data%' OR produto LIKE '%$data%' OR prateleira LIKE '%$data%') ORDER BY idprod DESC";
}

$result = $conexao->query($sql);
if (!$result) {
    die("Query failed: " . $conexao->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PRODUTOS</title>
    <style>
        body {
            background-image: linear-gradient(45deg, rgb(85, 0, 105), rgb(157, 0, 255));
            color: white;
            text-align: center;
        }
        .table-bg {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }
        .box-search {
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        .low-quantity {
            background-color: red !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PRODUTOS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php echo "<h1>Bem vindo <u>$logado</u></h1>"; ?>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">produto</th>
                    <th scope="col">quantidade</th>
                    <th scope="col">preco</th>
                    <th scope="col">data_comp</th>
                    <th scope="col">validade</th>
                    <th scope="col">prateleira</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    $row_class = ($user_data['quantidade'] == 0) ? 'low-quantity' : '';
                    echo "<tr class='$row_class'>";
                    echo "<td>".$user_data['idprod']."</td>";
                    echo "<td>".$user_data['produto']."</td>";
                    echo "<td>".$user_data['quantidade']."</td>";
                    echo "<td>".$user_data['preco']."</td>";
                    echo "<td>".$user_data['data_comp']."</td>";
                    echo "<td>".$user_data['validade']."</td>";
                    echo "<td>".$user_data['prateleira']."</td>";
                    echo "<td>
                        <a class='btn btn-sm btn-primary' href='editprod.php?idprod=".$user_data['idprod']."' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                        </a> 
                        <button class='btn btn-sm btn-danger' onclick='hideProduct(".$user_data['idprod'].")' title='Ocultar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash-fill' viewBox='0 0 16 16'>
                                <path d='M14.794 14.794a.5.5 0 0 0 0-.707l-12-12a.5.5 0 0 0-.707 0l-1.5 1.5a.5.5 0 0 0 0 .707l12 12a.5.5 0 0 0 .707 0l1.5-1.5zm-1.007-1.007L2 8.5l2.793-2.793a.5.5 0 0 0-.708-.708L1.293 7.793a.5.5 0 0 0 0 .707l12 12a.5.5 0 0 0 .707 0l1.5-1.5a.5.5 0 0 0 0-.707zM5 7.793L7.793 5 12 9.207l-2.793 2.793z'/>
                            </svg>
                        </button>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <form method="post" action="download.php">
            <button type="submit" name="download_csv" class="btn btn-success">Baixar Planilha</button>
        </form>
        <br>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = 'prods.php?search=' + search.value;
    }

    function hideProduct(idprod) {
        if (confirm("Tem certeza de que deseja ocultar este produto?")) {
            $.ajax({
                url: 'hideproduct.php',
                type: 'POST',
                data: { idprod: idprod },
                success: function(response) {
                    console.log(response); 
                    location.reload(); 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                }
            });
        }
    }
</script>
</html>