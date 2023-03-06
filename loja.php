<?php
#abre conexão com o banco de dados
include("conectadb.php");

#passa a instrução para o bando de dados
#função da instrução: LISTAR TODOS O CONTEÚDO DA TABELA usuarios
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($link, $sql);
$ativo="s";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>LOJA DO PROJETO</title>
</head>
<body>
    <form action="loja.php" method="post"> </form>
    <div class="container">
        
        <table border="1">
        <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>QUANTIDADE</th>
                    <th>PRECO</th>
                    <th>ADICIONAR AO CARRINHO</th>
            </tr>
            <?php
                #Preenchimento da tabela com os dados do banco
                while($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><input type="number" name="quantidade" id="quantidade"></td>
                        <!-- linha abaixo converte formato da $tbl[3] usando 2 casas após a virgula e aplicando , ao lugar de ponto -->
                        <td>R$ <?= number_format($tbl[3],2,',','.')?></td>
                        <td>R$ <?= number format
                        <td><div><img src=
                        <td><a href="addcarrinho.php?id=<?= $tbl[0] && $quantidade?>"><input type="button" value="ADICIONAR PRODUTO"></a></td>
                        <!-- tbl[5] verifica se é s que está vindo do banco de dados, se sim. Escreva SIM senão escreva NÃO -->
                        <td><?= $check = ($tbl[5] == 's')?"SIM":"NÃO"?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>
</html>