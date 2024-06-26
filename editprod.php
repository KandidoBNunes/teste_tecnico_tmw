<?php
include_once('config.php');

if (!empty($_GET['idprod'])) {
    $id = $_GET['idprod'];
    $sqlSelect = "SELECT * FROM produtos WHERE idprod=$id";
    $result = $conexao->query($sqlSelect);
    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $produto = $user_data['produto'];
            $preco = $user_data['preco'];
            $quantidade = $user_data['quantidade'];
            $prateleira = $user_data['prateleira'];
            $data_comp = $user_data['data_comp'];
            $validade = $user_data['validade'];
        }
    } else {
        header('Location: prods.php');
        exit;
    }
} else {
    header('Location: prods.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PROD</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(45deg, rgb(85, 0, 105), rgb(157, 0, 255));
    }
    .box {
        color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.6);
        padding: 15px;
        border-radius: 15px;
        width: 20%;
    }
    fieldset {
        border: 3px solid #af8cc5;
        border-radius: 10px;
        padding: 10px;
    }
    legend {
        border: 1px solid #af8cc5;
        padding: 10px;
        text-align: center;
        background-color: #af8cc5;
        border-radius: 8px;
    }
    .inputBox {
        position: relative;
    }
    .inputUser {
        background: none;
        border: none;
        border-bottom: 1px solid white;
        outline: none;
        color: white;
        font-size: 15px;
        width: 100%;
        letter-spacing: 2px;
    }
    .labelInput {
        position: absolute;
        top: 0px;
        left: 0px;
        pointer-events: none;
        transition: .5s;
    }
    .inputUser:focus ~ .labelInput,
    .inputUser:valid ~ .labelInput {
        top: -20px;
        font-size: 12px;
        color: #af8cc5;
    }
    #data_nascimento {
        border: none;
        padding: 8px;
        border-radius: 10px;
        outline: none;
        font-size: 15px;
    }
    #submit {
        background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
        width: 100%;
        border: none;
        padding: 15px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        border-radius: 10px;
    }
    #submit:hover {
        background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
    }
</style>

</head>
<body>
    <a href="prods.php">Voltar</a>
    <div class="box">
        <form action="saveprod.php" method="POST">
            <fieldset>
                <legend><b>Editar produto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="produto" id="produto" class="inputUser" value="<?php echo $produto; ?>" required>
                    <label for="produto" class="labelInput">Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="preco" id="preco" class="inputUser" value="<?php echo $preco; ?>" required>
                    <label for="preco" class="labelInput">Preço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="quantidade" id="quantidade" class="inputUser" value="<?php echo $quantidade; ?>" required>
                    <label for="quantidade" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="prateleira" id="prateleira" class="inputUser" value="<?php echo $prateleira; ?>" required>
                    <label for="prateleira" class="labelInput">Prateleira</label>
                </div>
                <br><br>
                <label for="data_comp"><b>Data de compra:</b></label>
                <input type="date" name="data_comp" id="data_comp" value="<?php echo $data_comp; ?>" required>
                <br><br><br>
                <label for="validade"><b>Data de validade:</b></label>
                <input type="date" name="validade" id="validade" value="<?php echo $validade; ?>" required>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
