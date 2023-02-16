<?php
#Coleta as variáveis do name do html e abre a conexão com Banco
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    include("conectadb.php");

    $sql = "SELECT COUNT(pro_id) from produtos WHERE pro_nome = '$nome' AND pro_descricao = '$descricao' AND pro_quantidade = '$quantidade' AND pro_preco = '$preco'";
    $resultado = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($resultado)) {
        $cont = $tbl[0];
    }
    #Verificação visual se usuario existe ou não.
    if ($cont == 1) {
        echo "<script>window.alert('PRODUTO JÁ CADASTRADO!');</script>";
    } else {
        $sql = "INSERT INTO produtos (pro_nome, pro_descricao, pro_quantidade, pro_preco) VALUES('$nome', '$descricao', '$quantidade', '$preco')";
        mysqli_query($link, $sql); #linha com erro
        header("Location: listaproduto.php");
    }
}
    ?>

    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>CADASTRAR PRODUTOS</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" name="voltahomesistema" value="HOME SISTEMA"></p></a>
        <form action="cadastraproduto.php" method="post">
        <h1>CADASTRO DE PRODUTOS</h1>
        <input type="text" name="nome" id="nome" placeholder="NOME" required>
        <p></p>
        <input type="text" name="descricao" id="descricao" placeholder="DESCRIÇÃO" required>
        <p></p>
        <input type="number" name="quantidade" id="quantidade" placeholder="QUANTIDADE" required>
        <p></p>
        <input type="number" name="preco" id="preco" placeholder="PREÇO" required>
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
    </form>
</body>
</html>