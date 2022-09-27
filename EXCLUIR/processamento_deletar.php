<?php
session_start();
include_once("../DADOS/conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
    $result_filmes = "DELETE FROM filmes WHERE codigo='$id'";
    $resultado_filmes = mysqli_query($conn, $result_filmes);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<em style='color: green;'> &nbsp;&nbsp; Filme deletado com sucesso!</em>";
        header("Location: ../INICIO/pagina_inicial_consultar.php");
    } else{
        $_SESSION['msg'] = "<em style='color: red;'> &nbsp;&nbsp; Ocorreram erros ao apagar o filme!</em>";
        header("Location: ../INICIO/pagina_inicial_consultar.php");
    }

} else{
    $_SESSION['msg'] = "<em style='color: red;'> &nbsp;&nbsp; Necesário selecionar um filme!</em>";
    header("Location: ../INICIO/pagina_inicial_consultar.php");
}
