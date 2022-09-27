<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mariana Dircksen">
    <title>Cadastro de Filmes</title>

    <!-- Links Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="estilo_cadastro.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="btn btn-outline-dark btn-sm" href="../INICIO/pagina_inicial_consulta.php">
            Consultar
        </a>
        <a class="btn btn-outline-dark btn-sm" href="cadastro_filmes.php">
            Cadastrar
        </a>
    </nav>

    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
    ?>

    <div>
        <h4>Cadastrar filmes</h4>
        <form method="POST" action="processamento_cadastro.php">
            <div class="form-group">
                <label>Código: </label>
                <input class="form-control" type="text" name="codigo" placeholder="Informe o código" autocomplete="off">
                <br>
                <label>Nome: </label>
                <input class="form-control" type="text" name="nome" placeholder="Informe o nome" autocomplete="off">
                <br>
                <label>Ano: </label>
                <input class="form-control" type="text" name="ano" placeholder="Informe o ano" autocomplete="off">
                <br>
                <label>Resumo: </label>
                <input class="form-control" type="text" name="resumo" placeholder="Informe o resumo" autocomplete="off">
                <br>
                <label>Complementos: </label>
                <input class="form-control" type="text" name="complementos" placeholder="Informe os complementos" autocomplete="off">
                <br>
                <input id="inserir" class="btn btn-outline-dark btn-sm" type="submit" value="Inserir">
            </div>
        </form>    
    </div>
</body>
</html>