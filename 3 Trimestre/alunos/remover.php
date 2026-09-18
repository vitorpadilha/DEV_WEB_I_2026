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
            <option value="no">Nome</option>
            <option value="ma">Matrícula</option>
            <option value="se">Sexo</option>
            <option value="na">Nascimento</option>
        </select>
        <label>Noma</label>
        <input type="text" name="valor"></input>
        <label>Matrícula</label>
        <input type="text" name="valor"></input>
        <label>Sexo</label>
        <input type="text" name="valor"></input>
        <label>Data de Nascimento</label>
        <input type="text" name="valor"></input>
    </form>
    <?php
  require_once '../includes/auth.php';
  require_once '../includes/funcoes.php';
  $indice = trim($_POST['excluir']);
  $qual = trim($_POST['valor']);
  $livros = lerArquivo("emprestimos.txt");
  $manter = [];
  foreach($livros as $pos => $v){
    if($indice == "no"){
        if($v[0] !== $qual){
            array_push($manter, $v);
        }
    }
    else if($indice == "ma"){
        if($v[1] !== $qual){
            array_push($manter, $v);
        }
    }
    else if($indice == "se"){
        if($v[2] !== $qual){
            array_push($manter, $v);
        }
  }
    else if($indice == "na"){
        if($v[3] !== $qual){
        array_push($manter, $v);
    }}}
  ?>
</body>
</html>