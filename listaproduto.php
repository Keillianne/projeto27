
<?php
#abre conexão com o banco de dados
include("conectadb.php");

#passa a instrução para o bando de dados
#função da instrução: LISTAR TODOS O CONTEÚDO DA TABELA usuarios
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($link, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>LISTA PRODUTOS</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" name="voltahomesistema" value="HOME SISTEMA"></p>
    <div class="container">
        
        <table border="1">
            <tr>
                <th>IDENTIFICAÇÃO</th>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
                <th>ALTERAR DADOS</th>
                <th>STATUS ATIVO</th>
            </tr>
            <?php
                while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><?= $tbl[3]?></td>
                        <td><?= $tbl[4]?></td> 
                        <!---<td><?= $check=($tbl[3]=="s")?"SIM":"NÃO"?></td>--->
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>
</html>