<?php
#abre conexão com o banco de dados
include("conectadb.php");

#passa a instrução para o bando de dados
#função da instrução: LISTAR TODOS O CONTEÚDO DA TABELA usuarios
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA USUARIOS</title>
    <link rel="stylesheet" href="estilo.css">

</head>

<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div class="container">
        
        <table border="1">
            <tr>
                <th>NOME</th>
                <th>ALTERAR DADOS</th>
                <th>STATUS ATIVO</th>
            </tr>
            <?php
                while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[1]?></td> <!-- traz somente a coluna nome para apresentar na tabela-->
                        <!-- Ao clicar no botão ele já trará o id do usuario para a página do alterar -->
                        <td><a href="alterarusuario.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERAR"></a></td>
                         <!-- Ao clicar no botão ele já trará o id do usuario para a página do excluir -->
                        <!-- <td><a href="excluiusuario.php?id=<//?=$tbl[0]?>"><input type="button" value="EXCLUIR"></a></td> -->
                        <td><?= $check=($tbl[3]=="s")?"SIM":"NÃO"?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>

</html>