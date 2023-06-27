<?php
include("conectadb.php");

session_start();

#TRAZ DADOS DO BANCO PARA COMPLETAR OS BANCOS
$id = $_GET['id'];
$sql = "SELECT * FROM cliente WHERE cli_id = '$id'";
$retorno = mysqli_query($link, $sql);

#PRENHECHENDO O ARRAY SEMPRE
while ($tbl = mysqli_fetch_array($retorno)) {
    $id = $tbl [0];
    $cpf = $tbl[1];
    $nome = $tbl[2];
    $datanasc = $tbl[3];
    $telefone = $tbl[4];
    $logradouro = $tbl[5];
    $numero = $tbl[6];
    $cidade = $tbl[7];
    $ativo = $tbl[8];
}



#USUARIO CLICA NO BOTÃO SALVAR
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $datanasc = $_POST['datanasc'];
    $telefone = $_POST['telefone'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $ativo = $_POST['ativo'];

    $sql = "UPDATE clientes SET cli_cpf ='$cpf', cli_nome ='$nome', cli_datanasc ='$datanasc', cli_telefone ='$telefone', cli_logradouro ='$logradouro', cli_numero ='$numero', cli_cidade ='$cidade', cli_ativo = '$ativo' WHERE cli_id = $id";

    mysqli_query($link, $sql);

    echo "<script>window.alert('USUARIO ALTERADO COM SUCESSO');</script>";
    echo "<script>window.location.href='admhome.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">

    <title>ALTERA CLIENTE</title>
</head>

<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrausuario.php">CADASTRA USUARIO</a></li>
            <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>
            <li><a href="listausuario.php">LISTA USUARIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="logout.php">SAIR</a></li>
            <li class="menuloja"><a href="./areacliente/loja.php">LOJA</a></li>
        </ul>
    </div>

    <div>
        <form action="alteracliente.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">  
            <br>
            <input type="text" name="cpf" value="<?= $cpf ?>" required>
            <br>
            <input type="text" name="nome" value="<?= $nome ?>" required>
            <br>
            <input type="text" name="datanasc" value="<?= $datanasc ?>" required>
            <br>
            <input type="text" name="telefone" value="<?= $telefone ?>" required>
            <br>
            <input type="text" name="logradouro" value="<?= $logradouro ?>" required>
            <br>
            <input type="text" name="numero" value="<?= $numero ?>" required>
            <br>
            <input type="text" name="cidade" value="<?= $cidade ?>" required>
            <br>
            <input type="radio" name="ativo" value="s" <?= $ativo == "s" ? "checked" : "" ?>>ATIVO>
            <br>
            <input type="radio" name="ativo" value="n" <?= $ativo == "n" ? "checked" : "" ?>>INATIVO>
            <br>
            <input type="submit" name="salvar" value="SALVAR">
        </form>

    </div>




</body>

</html>