<?php
#Coleta as variáveis do name do html e abre a conexão com Banco
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $foto1=$_POST['foto1'];
    #$foto2=$_POST['foto2'];

    // if ($foto=="") 
    // $img="semfoto.png";

    include("conectadb.php");
    #verifica se o produto está cadastrado

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
        mysqli_query($link, $sql);
        echo($cont);
        header("Location: listaproduto.php");
    }
}
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>CADASTRAR PRODUTOS</title>
</head>
<body>
        <!---<a href="homesistema.html"><input type="button" name="voltahomesistema" value="HOME SISTEMA"></p></a>
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
    </form> --->
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
        <div>
            <form action="cadastraproduto.php" method="post">
                <label>NOME</label>
                <input type="text" name="nome">
                <br></br>
                <label>DESCRIÇÃO</label>
                <input type="text" name="descricao">
                <br></br>
                <label>QUANTIDADE</label>
                <input type="number" name="quantidade">
                <br></br>
                <label>PRECO</label>
                <input type="number" name="preco">
                <br></br>

                <!-- BLOCO DE CÓDIGO NOVO -->
                
                <label>IMAGEM</label>
                <input type="file" name="foto1" id="img1" onchange="foto1()">
                <img src="img/semfoto.png" width="100px" id="foto1a">

                <br>
                <input type="submit" value="CADASTRAR">

            </form>
            <script>
                    function foto1(){
                        document.getElementById("foto1a").src = "img/" (document.getElementById("img1").value).slice(12);
                    }
            </script>
        </div>
</body>
</html>