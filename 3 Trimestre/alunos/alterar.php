<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Aluno — Biblioteca</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

  <?php
  require_once '../includes/auth.php';
  require_once '../includes/funcoes.php';

  $matricula = $_GET['matricula'] ?? '';
  $alunos    = lerArquivo('../data/alunos.txt');
  $aluno     = null; $indice = null;

  foreach ($alunos as $i => $a) {
      if ($a[1] === $matricula) { $aluno = $a; $indice = $i; break; }
  }
  if ($aluno === null) { header('Location: listar.php'); exit; }

  $erro = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome     = trim($_POST['nome']);
      $sexo     = $_POST['sexo'] ?? '';
      $dataNasc = trim($_POST['dataNascimento']);

      if (!$nome || !$sexo || !$dataNasc) {
          $erro = 'Preencha todos os campos obrigatórios.';
      } else {
          $alunos[$indice] = [$nome, $matricula, $sexo, $dataNasc];
          salvarArquivo('../data/alunos.txt', $alunos);
          header('Location: listar.php?msg=alterado');
          exit;
      }
  }
  $dados = [
      'nome'          => $_POST['nome']          ?? $aluno[0],
      'sexo'          => $_POST['sexo']          ?? $aluno[2],
      'dataNascimento'=> $_POST['dataNascimento'] ?? $aluno[3],
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
      <a href="listar.php" class="nav-item active"><span class="nav-icon">🎓</span> Alunos</a>
      <a href="../emprestimos/listar.php" class="nav-item"><span class="nav-icon">📋</span> Empréstimos</a>
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
        <div class="topbar-title">✏️ Editar Aluno</div>
        <div class="topbar-sub">Matrícula: <strong><?= htmlspecialchars($matricula) ?></strong></div>
      </div>
      <div class="topbar-actions">
        <a href="listar.php" class="btn btn-ghost">← Voltar</a>
      </div>
    </div>

    <div class="content">
 <?php if ($erro): ?>
        <div class="alert alert-error">⚠ <?= htmlspecialchars($erro) ?></div>
      <?php endif; ?>

      <form action="alterar.php?matricula=<?= urlencode($matricula) ?>" method="POST">
        <div class="form-card">

          <div class="form-row cols-1" style="margin-bottom:1.25rem">
            <div class="form-group">
              <label>Matrícula (não editável)</label>
              <input type="text" value="<?= htmlspecialchars($matricula) ?>" disabled
                     style="opacity:.5;cursor:not-allowed">
            </div>
          </div>

          <div class="form-row cols-1">
            <div class="form-group">
              <label for="nome">Nome completo *</label>
              <input type="text" id="nome" name="nome"
              value="<?= htmlspecialchars($dados['nome']) ?>" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="sexo">Sexo *</label>
              <select id="sexo" name="sexo" required>
                <option value="M">Masculino</option>
                <option value="F" selected>Feminino</option>
              </select>
            </div>
            <div class="form-group">
              <label for="dataNascimento">Data de nascimento *</label>
              <input type="date" id="dataNascimento" name="dataNascimento"
              value="<?= htmlspecialchars($dados['dataNascimento']) ?>" required>
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
