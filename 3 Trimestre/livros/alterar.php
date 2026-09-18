<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Livro — Biblioteca</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>


  <?php
  require_once '../includes/auth.php';
  require_once '../includes/funcoes.php';

  $id     = $_GET['id'] ?? '';
  $livros = lerArquivo('../data/livros.txt');
  $livro  = null; 
  $indice = null;

  foreach ($livros as $i => $l) {
      if ($l[0] == $id) { $livro = $l; $indice = $i; break; }
  }
  if ($livro === null) { header('Location: listar.php'); exit; }

  $erro = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome    = trim($_POST['nome']);
      $editora = trim($_POST['editora']);
      $edicao  = trim($_POST['edicao']);
      $autor   = trim($_POST['autor']);
      $estoque = trim($_POST['estoque']);

      if (!$nome || !$editora || !$edicao || !$autor || !$estoque) {
          $erro = 'Preencha todos os campos obrigatórios.';
      } else {
          $livros[$indice] = [$id, $nome, $editora, $edicao, $autor, $estoque];
          salvarArquivo('../data/livros.txt', $livros);
          header('Location: listar.php?msg=alterado');
          exit;
      }
  }
  $dados = [
      'nome'    => $_POST['nome']    ?? $livro[1],
      'editora' => $_POST['editora'] ?? $livro[2],
      'edicao'  => $_POST['edicao']  ?? $livro[3],
      'autor'   => $_POST['autor']   ?? $livro[4],
      'estoque' => $_POST['estoque'] ?? $livro[5],
  ];
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
      <a href="listar.php" class="nav-item active"><span class="nav-icon">📖</span> Livros</a>
      <a href="../alunos/listar.php" class="nav-item"><span class="nav-icon">🎓</span> Alunos</a>
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

  <!-- ════ MAIN ════ -->
  <main class="main">
    <div class="topbar">
      <div>
        <!-- TODO PHP: ID do livro → #<?= htmlspecialchars($id) ?> -->
        <div class="topbar-title">✏️ Editar Livro <span style="font-size:.9rem;color:var(--ink3)">#3</span></div>
        <div class="topbar-sub">Alterar dados do título</div>
      </div>
      <div class="topbar-actions">
        <a href="listar.php" class="btn btn-ghost">← Voltar</a>
      </div>
    </div>

    <div class="content">

       <?php if ($erro): ?>
        <div class="alert alert-error">⚠ <?= htmlspecialchars($erro) ?></div>
      <?php endif; ?>

      
      <form action="alterar.php?id=<?= $id ?>" method="POST">
        <div class="form-card">

          <div class="form-row cols-1">
            <div class="form-group">
              <label for="nome">Título do livro *</label>
              <input type="text" id="nome" name="nome"
              value="<?= htmlspecialchars($dados['nome']) ?>"  required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="autor">Autor *</label>
              <input type="text" id="autor" name="autor"
              value="<?= htmlspecialchars($dados['autor']) ?>" required>
            </div>
            <div class="form-group">
              <label for="editora">Editora *</label>
              <input type="text" id="editora" name="editora"
              value="<?= htmlspecialchars($dados['editora']) ?>" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="edicao">Edição *</label>
              <input type="number" id="edicao" name="edicao"
              <?= htmlspecialchars($dados['edicao']) ?>" min="1" required>
            </div>
            <div class="form-group">
              <label for="estoque">Quantidade em estoque *</label>
              
              <input type="number" id="estoque" name="estoque"
              value="<?= htmlspecialchars($dados['estoque']) ?>" min="0" required>
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
