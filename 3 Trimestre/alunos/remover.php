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
  $aluno = Aluno::findByMatricula($qual);
  $aluno->remover($conn);
  ?>
</body>
</html>