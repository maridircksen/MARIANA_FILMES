<?php
session_start();
include_once("../DADOS/conexao.php");

$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
$resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_STRING);
$complementos = filter_input(INPUT_POST, 'complementos', FILTER_SANITIZE_STRING);


$result_filmes = "INSERT INTO filmes (codigo, nome, ano, resumo, complementos) VALUES ('$codigo', '$nome', '$ano', '$resumo', '$complementos')";
$resultado_filmes = mysqli_query($conn, $result_filmes);

if (mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<em style='color: green;;'> &nbsp;&nbsp Filme cadastrado com sucesso!</em>";
    header("Location: cadastro_filmes.php");
} else{
    $_SESSION['msg'] = "<em style='color: red;'> &nbsp;&nbsp Ocorreram problemas no cadastro do filme!</em>";
    header("Location: cadastro_filmes.php");
}