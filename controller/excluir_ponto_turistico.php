<?php require '../conexao/conexao.php';

//RECEIVE VALUES INPUT
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = $_GET['nome'];
$dir = "../uploads/" . $nome;

$ps = $pdo->prepare('DELETE FROM ponto_turistico WHERE id=?');

if (!unlink($dir)) {
    echo("Erro ao deletar $dir");
}else {
    if ($ps->execute([$id])) {
        echo "Excluido com sucesso";
        header("Location: ../administrativo.php");
    }
}
