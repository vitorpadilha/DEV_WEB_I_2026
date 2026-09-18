<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novo Empréstimo — Biblioteca</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>


  <?php
  require_once '../includes/auth.php';
  require_once '../includes/funcoes.php';

  $livros = lerArquivo('../data/livros.txt');
  $alunos = lerArquivo('../data/alunos.txt');
  $erro   = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idLivro        = trim($_POST['idLivro']);
      $matricula      = trim($_POST['matricula']);
      $dataEmprestimo = trim($_POST['dataEmprestimo']);
      $dataDevolucao  = trim($_POST['dataDevolucao']);

      if (!$idLivro || !$matricula || !$dataEmprestimo || !$dataDevolucao) {
          $erro = 'Preencha todos os campos obrigatórios.';
      } else if ($dataDevolucao <= $dataEmprestimo) {
          $erro = 'A data de devolução deve ser posterior à data do empréstimo.';
      } else {
          $emprestimos   = lerArquivo('../data/emprestimos.txt');
          $emprestimos[] = [$idLivro, $matricula, $dataEmprestimo, $dataDevolucao];
          salvarArquivo('../data/emprestimos.txt', $emprestimos);
          header('Location: listar.php?msg=cadastrado');
          exit;
      }
  }
  ?>

<div class="app-shell">

  <!-- ════ SIDEBAR ════ -->
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

  <!-- ════ MAIN ════ -->
  <main class="main">
    <div class="topbar">
      <div>
        <div class="topbar-title">➕ Novo Empréstimo</div>
        <div class="topbar-sub">Registrar saída de livro</div>
      </div>
      <div class="topbar-actions">
        <a href="listar.php" class="btn btn-ghost">← Voltar</a>
      </div>
    </div>

    <div class="content">
      <?php if ($erro): ?>
        <div class="alert alert-error">⚠ <?= htmlspecialchars($erro) ?></div>
      <?php endif; ?>


      <form action="cadastrar.php" method="POST">
        <div class="form-card">

          <div class="form-row">
            <div class="form-group">
              <label for="idLivro">Livro *</label>
              
              <select id="idLivro" name="idLivro" required>
                <option value="">Selecione um livro</option>
                <?php foreach ($livros as $livro): ?>
                  <option value="<?= $livro[0] ?>"
                    <?= (($_POST['idLivro'] ?? '') == $livro[0]) ? 'selected' : '' ?>>
                    <?= htmlspecialchars("{$livro[0]} – {$livro[1]} (Estoque: {$livro[5]})") ?>
                  </option>
                <?php endforeach; ?>
              </select>
              
            </div>
            <div class="form-group">
              <label for="matricula">Aluno *</label>
              <select id="matricula" name="matricula" required>
                <option value="">Selecione um aluno</option>
                <?php foreach ($alunos as $aluno): ?>
                  <option value="<?= $aluno[1] ?>"
                    <?= (($_POST['matricula'] ?? '') === $aluno[1]) ? 'selected' : '' ?>>
                    <?= htmlspecialchars("{$aluno[0]} (Mat: {$aluno[1]})") ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <select id="matricula" name="matricula" required>
                <option value="">Selecione um aluno</option>
                <option value="2024001">Ana Beatriz Souza (Mat: 2024001)</option>
                <option value="2024002">Carlos Eduardo Lima (Mat: 2024002)</option>
                <option value="2024003">Fernanda Oliveira (Mat: 2024003)</option>
                <option value="2024004">Gabriel Martins Rocha (Mat: 2024004)</option>
                <option value="2024005">Isabela Costa Ferreira (Mat: 2024005)</option>
                <option value="2024006">Lucas Pereira dos Santos (Mat: 2024006)</option>
                <option value="2024007">Mariana Teixeira (Mat: 2024007)</option>
                <option value="2024008">Rafael Alves Nunes (Mat: 2024008)</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="dataEmprestimo">Data do empréstimo *</label>
              <input type="date" id="dataEmprestimo" name="dataEmprestimo"
              value="<?= htmlspecialchars($_POST['dataEmprestimo'] ?? date('Y-m-d')) ?>" required>
            </div>
            <div class="form-group">
              <label for="dataDevolucao">Data de devolução *</label>
              <input type="date" id="dataDevolucao" name="dataDevolucao" 
              value="<?= htmlspecialchars($_POST['dataDevolucao'] ?? '') ?>" required>
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Registrar empréstimo</button>
            <a href="listar.php" class="btn btn-ghost">Cancelar</a>
          </div>

        </div>
      </form>

    </div>
  </main>
</div>

</body>
</html>
