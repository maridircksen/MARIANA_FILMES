<?php
session_start();
include_once("../DADOS/conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filmes = "SELECT * FROM filmes WHERE codigo = '$id'";
$resultado_filmes = mysqli_query($conn, $result_filmes);
$row_filme = mysqli_fetch_assoc($resultado_filmes);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mariana Dircksen">
    <title>Alterar filmes</title>

    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo_modificar.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="btn btn-outline-dark btn-sm" href="../INICIO/pagina_inicial_consulta.php">
            Consultar
        </a>
        <a class="btn btn-outline-dark btn-sm" href="../INICIO/pagina_inicial_consulta.php">
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
        <h4>Alterar filmes</h4>
        <form method="POST" action="processamento_modificacao.php">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $row_filme['codigo']; ?>">

                <label>Código: </label>
                <input class="form-control" type="text" name="codigo" value="<?php echo $row_filme['codigo'];?>" autocomplete="off" readonly>
                <br>
                <label>Nome: </label>
                <input class="form-control" type="text" name="nome" placeholder="Informe o nome" value="<?php echo $row_filme['nome']; ?>" autocomplete="off">
                <br>
                <label>Ano: </label>
                <input class="form-control" type="text" name="ano" placeholder="Informe o ano" value="<?php echo $row_filme['ano']; ?>" autocomplete="off">
                <br>
                <label>Resumo: </label>
                <input class="form-control" type="text" name="resumo" placeholder="Informe o resumo" value="<?php echo $row_filme['resumo']; ?>" autocomplete="off">
                <br>
                <label>Complementos: </label>
                <input class="form-control" type="text" name="complementos" placeholder="Informe os complementos" value="<?php echo $row_filme['complementos']; ?>" autocomplete="off">
                <br>
                <input id="alterar" class="btn btn-outline-dark btn-sm" type="submit" value="Alterar">
            </div>
        </form>    
    </div>
</body>
</html>