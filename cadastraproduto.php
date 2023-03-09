<?php
#Coleta as variáveis do name do html e abre a conexão com Banco
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    
    #criptografar a foto para o banco de dados
    
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error']===UPLOAD_ERR_OK){
        $imagem_temp= $_FILES['imagem']['tmp_name'];
        $imagem= file_get_contents($imagem_temp);
        $imagem_base64=base64_encode($imagem);
    }

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
        $sql = "INSERT INTO produtos (pro_nome, pro_descricao, pro_quantidade, pro_preco, imagem1) VALUES('$nome', '$descricao', '$quantidade', '$preco', '$imagem_base64')";
        mysqli_query($link, $sql);
        
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
        <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
        <div>
            <form action="cadastraproduto.php" method="post" enctype="multipart/form-data">
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
                <input type="file" name="imagem" id="img1"> 
                

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