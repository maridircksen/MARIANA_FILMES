<?php
    session_start();
    include_once("../DADOS/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mariana Dircksen">
    <title>Consultar Filmes</title>

    <!-- Links Utilizar Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="pagina_inicial.css">
</head>
<body>
    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="btn btn-outline-dark btn-sm" href="pagina_inicial_consulta.php">
            Consultar
        </a>
        <a class="btn btn-outline-dark btn-sm" href="../INICIO/pagina_inicial_consultar.php">
            Cadastrar
        </a>
    </nav>
-->
    <table class="table table-dark table-hover">
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            echo
            "<h4>Filmes</h4>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Ano</th>
                    <th>Resumo</th>
                    <th>Complementos</th>
                    <th colspan='2'>Opções</th>
                </tr>
            </thead>
            <tbody>";

                //Receber o número da página
                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                //Setar a quantidade de itens por página
                $qnt_result_pg = 10;

                //Calcular inicio da visualização
                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                $result_filmes = "SELECT * FROM filmes LIMIT $inicio, $qnt_result_pg";
                $resultado_filmes = mysqli_query($conn, $result_filmes);
                
                while($row_filme = mysqli_fetch_assoc($resultado_filmes)){
                    extract($row_filme);
                    echo 
                    "<tr>
                        <td>
                            $codigo
                        </td>
                        <td>
                            $nome
                        </td>
                        <td>
                            $ano
                        </td>
                        <td>
                            $resumo
                        </td>
                        <td>
                            $complementos
                        </td>
                        <td>
                            <a class='btn btn-outline-dark btn-sm' href='../MODIFICAR/modificar_lista_filmes.php?id=" . $row_filme['codigo'] . "'>Alterar</a>    
                        </td>
                        <td>
                            <a class='btn btn-outline-dark btn-sm' href='../EXCLUIR/processamento_deletar.php?id=" . $row_filme['codigo'] . "'>Deletar</a>    
                        </td>
                    </tr>";
                }

            "</tbody>"
        ?>
    </table>
    <div>
        <?php
        
            //Paginação
            $result_paginacao = "SELECT COUNT(codigo) AS num_result FROM filmes";
            $resultado_paginacao = mysqli_query($conn, $result_paginacao);
            $row_paginacao = mysqli_fetch_assoc($resultado_paginacao);
            $quantidade_pagina = ceil($row_paginacao['num_result'] / $qnt_result_pg);
            $max_links = 2;
            
            echo "<a class='btn btn-outline-dark btn-sm' href='pagina_inicial_consulta.php?pagina=1'>Primeira</a>";

            for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1 ){
                    echo "<a class='btn btn-outline-dark btn-sm' href='pagina_inicial_consulta.php?pagina=$pag_ant'>$pag_ant</a>";
                }
            }

            echo "<a class='btn btn-outline-dark btn-sm' href='pagina_inicial_consulta.php?pagina=$pagina'>$pagina</a>";

            for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $quantidade_pagina){
                    echo "<a class='btn btn-outline-dark btn-sm' href='pagina_inicial_consulta.php?pagina=$pag_dep'>$pag_dep</a>";
                }
            }            

            echo "<a class='btn btn-outline-dark btn-sm' href='pagina_inicial_consulta.php?pagina=$quantidade_pagina'>Última</a>";
        ?>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-outline-dark" href="../CADASTRO/cadastro_filmes.php">Cadastrar</a>
        <a class="btn btn-outline-dark" href="../INICIO/pagina_inicial_consulta.php">Recarregar Consulta</a>
    </div>
</body>
</html>