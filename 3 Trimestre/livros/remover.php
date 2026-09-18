<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="remover.php" method="POST">
        <label>Selecione por que índice o livro deve ser excluído:</label><br>
        <select name="excluir">
            <option value="id">ID</option>
            <option value="au">Autor(a)</option>
            <option value="ea">Editora</option>
            <option value="es">Estoque</option>
            <option value="eo">Edição</option>
            <option value="no">Nome</option>
        </select>
        <label>ID</label>
        <input type="text" name="valor"></input>
        <label>Autor(a)</label>
        <input type="text" name="valor"></input>
        <label>Editora</label>
        <input type="text" name="valor"></input>
        <label>Estoque</label>
        <input type="text" name="valor"></input>
        <label>Edição</label>
        <input type="text" name="valor"></input>
        <label>Nome</label>
        <input type="text" name="valor"></input>
    </form>
    <?php
  require_once '../includes/auth.php';
  require_once '../includes/funcoes.php';
  $indice = trim($_POST['excluir']);
  $qual = trim($_POST['valor']);
  $livros = lerArquivo("livros.txt");
  $manter = [];
  foreach($livros as $pos => $v){
    if($indice == "id"){
        if($v[0] !== $qual){
            array_push($manter, $v);
        }
    }
    else if($indice == "au"){
        if($v[4] !== $qual){
            array_push($manter, $v);
        }
    }
    else if($indice == "ea"){
        if($v[2] !== $qual){
            array_push($manter, $v);
        }
  }
    else if($indice == "es"){
        if($v[5] !== $qual){
        array_push($manter, $v);
    }}
    else if($indice == "eo"){
            if($v[3] !== $qual){
                array_push($manter, $v);
            }}
    else if($indice == "na"){
        if($v[1] !== $qual){
                    array_push($manter, $v);
                }}
            }
            salvarArquivo("data/livros.txt",$manter);
  ?>
</body>
</html>