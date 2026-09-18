<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Empréstimo — Biblioteca</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

  <?php
  require_once '../includes/auth.php';
  require_once '../includes/funcoes.php';

  $idx         = (int)($_GET['idx'] ?? -1);
  $emprestimos = lerArquivo('../data/emprestimos.txt');
  $livros      = lerArquivo('../data/livros.txt');
  $alunos      = lerArquivo('../data/alunos.txt');

  if ($idx < 0 || !isset($emprestimos[$idx])) {
      header('Location: listar.php'); exit;
  }
  $emp  = $emprestimos[$idx];
  $erro = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idLivro        = trim($_POST['idLivro']);
      $matricula      = trim($_POST['matricula']);
      $dataEmprestimo = trim($_POST['dataEmprestimo']);
      $dataDevolucao  = trim($_POST['dataDevolucao']);

      if (!$idLivro || !$matricula || !$dataEmprestimo || !$dataDevolucao) {
          $erro = 'Preencha todos os campos.';
      } elseif ($dataDevolucao <= $dataEmprestimo) {
          $erro = 'A data de devolução deve ser posterior à data do empréstimo.';
      } else {
          $emprestimos[$idx] = [$idLivro, $matricula, $dataEmprestimo, $dataDevolucao];
          salvarArquivo('../data/emprestimos.txt', $emprestimos);
          header('Location: listar.php?msg=alterado'); exit;
      }
  }
  $dados = [
      'idLivro'        => $_POST['idLivro']        ?? $emp[0],
      'matricula'      => $_POST['matricula']      ?? $emp[1],
      'dataEmprestimo' => $_POST['dataEmprestimo'] ?? $emp[2],
      'dataDevolucao'  => $_POST['dataDevolucao']  ?? $emp[3],
  ];
  ?>

<div class="app-shell">
  <aside class="sidebar">
    <div class="sidebar-brand">
      <span class="brand-icon">📚</span>
      <h1>Biblioteca</h1>
      <p>Sistema de Gestão</p>
    </div>
    <nav class="sidebar-nav">
      <p class="nav-section-label">Geral</p>
      <a href="../index.php" class="nav-item"><span class="nav-icon">🏠</span> Painel</a>
      <p class="nav-section-label">Cadastros</p>
      <a href="../livros/listar.php" class="nav-item"><span class="nav-icon">📖</span> Livros</a>
      <a href="../alunos/listar.php" class="nav-item"><span class="nav-icon">🎓</span> Alunos</a>
      <a href="listar.php" class="nav-item active"><span class="nav-icon">📋</span> Empréstimos</a>
    </nav>
    <div class="sidebar-user">
      <div class="user-avatar">AD</div>
      <div class="user-info">
        <div class="user-name">Admin</div>
        <div class="user-role">Bibliotecário</div>
      </div>
      <a href="../login.php" class="btn-logout" title="Sair">⏻</a>
    </div>
  </aside>

  <main class="main">
    <div class="topbar">
      <div>
        <div class="topbar-title">✏️ Editar Empréstimo</div>
        <!-- TODO PHP: Registro nº <?= $idx + 1 ?> -->
        <div class="topbar-sub">Registro nº 3</div>
      </div>
      <div class="topbar-actions">
        <a href="listar.php" class="btn btn-ghost">← Voltar</a>
      </div>
    </div>

    <div class="content">

      <?php if ($erro): ?>
        <div class="alert alert-error">⚠ <?= htmlspecialchars($erro) ?></div>
      <?php endif; ?>

      <form action="alterar.php?idx=<?= $idx ?>" method="POST">
        <div class="form-card">

          <div class="form-row">
            <div class="form-group">
              <label for="idLivro">Livro *</label>
              <?php
              echo "<select id=\"idLivro\" name=\"idLivro\" required>";
              foreach($dados as $pos => $val){
                echo "<option value=\"" . $val[0] . "\">" . $val[0] . " - " . $val[1];
              }
              ?>
              <!-- TODO PHP: popular select com loop, marcando selected em $dados['idLivro'] -->
              <!--<select id="idLivro" name="idLivro" required>
                <option value="1">1 – O Senhor dos Anéis</option>
                <option value="2">2 – Clean Code</option>
                <option value="3" selected>3 – Dom Casmurro</option>
                <option value="4">4 – PHP: The Right Way</option>
                <option value="5">5 – Design de Sistemas</option>
                <option value="6">6 – A Revolução dos Bichos</option>
                <option value="7">7 – Estruturas de Dados em C</option>
              </select> -->
            </div>
            <div class="form-group">
              <label for="matricula">Aluno *</label>
              <!-- TODO PHP: popular select com loop, marcando selected em $dados['matricula'] -->
              <select id="matricula" name="matricula" required>
                <option value="2024001">Ana Beatriz Souza (2024001)</option>
                <option value="2024002">Carlos Eduardo Lima (2024002)</option>
                <option value="2024003" selected>Fernanda Oliveira (2024003)</option>
                <option value="2024004">Gabriel Martins Rocha (2024004)</option>
                <option value="2024005">Isabela Costa Ferreira (2024005)</option>
                <option value="2024006">Lucas Pereira dos Santos (2024006)</option>
                <option value="2024007">Mariana Teixeira (2024007)</option>
                <option value="2024008">Rafael Alves Nunes (2024008)</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="dataEmprestimo">Data do empréstimo *</label>
              <input type="date" id="dataEmprestimo" name="dataEmprestimo"
              value="<?= htmlspecialchars($dados['dataEmprestimo']) ?>" required>
            </div>
            <div class="form-group">
              <label for="dataDevolucao">Data de devolução *</label>
              <input type="date" id="dataDevolucao" name="dataDevolucao"
              value="<?= htmlspecialchars($dados['dataDevolucao']) ?>" required>
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <a href="listar.php" class="btn btn-ghost">Cancelar</a>
          </div>

        </div>
      </form>

    </div>
  </main>
</div>

</body>
</html>
