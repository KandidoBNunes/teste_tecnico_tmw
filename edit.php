<?php
include_once('config.php');

if (!empty($_GET['idnew_table'])) {
    $id = $_GET['idnew_table'];
    $sqlSelect = "SELECT * FROM new_table WHERE idnew_table=$id";
    $result = $conexao->query($sqlSelect);
    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['nome'];
            $senha = $user_data['senha'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['sexo'];
            $data_nasc = $user_data['data_nasc'];
            $permission = $user_data['permission'];
            $estado = $user_data['estado'];
        }
    } else {
        header('Location: sistema.php');
        exit;
    }
} else {
    header('Location: sistema.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT LOGIN</title>
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
            border: 3px solid dodgerblue;
        }
        legend {
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
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
            color: dodgerblue;
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
    <a href="sistema.php">Voltar</a>
    <div class="box">
        <form action="saveedit.php" method="POST">
            <fieldset>
                <legend><b>Editar Cliente</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome; ?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email; ?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone; ?>" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : ''; ?> required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : ''; ?> required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : ''; ?> required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nasc; ?>" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" value="<?php echo $senha; ?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <p>Estado</p>
                <input type="radio" id="inativo" name="estado" value="inativo" <?php echo ($estado == 'inativo') ? 'checked' : ''; ?> required>
                <label for="inativo">Inativo</label>
                <br>
                <input type="radio" id="ativo" name="estado" value="ativo" <?php echo ($estado == 'ativo') ? 'checked' : ''; ?> required>
                <label for="ativo">Ativo</label>
                <br><br>
                <p>Permissão</p>
                <input type="radio" id="comum" name="permission" value="comum" <?php echo ($permission == 'comum') ? 'checked' : ''; ?> required>
                <label for="comum">Comum</label>
                <br>
                <input type="radio" id="especial" name="permission" value="especial" <?php echo ($permission == 'especial') ? 'checked' : ''; ?> required>
                <label for="especial">Especial</label>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>