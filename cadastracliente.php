<?php
#Coleta as variáveis do name do html e abre a conexão com Banco
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $datanasc= $_POST['datanasc'];
    $telefone=$_POST['telefone'];
    $logradouro=$_POST['logradouro'];
    $numero=$_POST['numero'];
    $cidade=$_POST['cidade'];
    $ativo=$_POST['ativo'];

    include("conectadb.php");
    #verifica se o produto está cadastrado
    $sql="SELECT COUNT(cli_id) FROM clientes WHERE cli_cpf='$cpf'";
    $resultado=mysqli_query($link, $sql);

    while ($tbl=mysqli_fetch_array($resultado)) {
        $cont =$tbl[0];
        if($cont==0){
           $sql="INSERT INTO clientes(cli_id, cli_cpf, cli_nome, cli_datanasc, cli_logradouro, cli_numero, cli_cidade, 's') VALUES ('$id', '$cpf', '$nome', '$datanasc', '$telefone', '$logradouro', '$numero', '$cidade')";
           mysqli_query($link, $sql);
           header("Location: listaclientes.php");
           exit();
        }
        else {
            $sql = "INSERT INTO clientes (cli_id, cli_cpf, cli_nome, cli_datanasc, cli_logradouro, cli_numero, cli_cidade, 's') VALUES('$id', '$cpf', '$nome', '$datanasc', '$telefone', '$logradouro', '$numero', '$cidade')";
            mysqli_query($link, $sql);
            echo($cont);
            header("Location: listaclientes.php");
        }
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
    <title>CADASTRAR CLIENTES</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
        <div><!---
        cli_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	cli_cpf BIGINT,
	cli_nome VARCHAR(50),
	cli_datanasc DATE,
	cli_telefone INT,
	cli_logradouro VARCHAR(100),
	cli_numero VARCHAR(10),
	cli_cidade VARCHAR(50),
	cli_ativo CHAR(1)--->
            <form action="cadastracliente.php" method="post">
                <label>CPF</label>
                <input type="number" name="cpf">
                <br></br>
                <label>NOME</label>
                <input type="text" name="nome">
                <br></br>
                <label>DATA DE NASCIMENTO</label>
                <input type="number" name="quantidade">
                <br></br>
                <label>TELEFONE</label>
                <input type="number" name="telefone">
                <label>LOGRADOURO</label>
                <input type="text" name="logradouro">
                <label>NUMERO</label>
                <input type="number" name="numero">
                <label>CIDADE</label>
                <input type="text" name="cidade">
                <br></br>

                <!-- BLOCO DE CÓDIGO NOVO -->
                
                <!---<label>IMAGEM</label>
                <input type="file" name="foto1" id="img1" onchange="foto1()">
                <img src="img/semfoto.png" width="100px" id="foto1a"> --->

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