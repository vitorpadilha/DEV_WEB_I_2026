<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livros — Biblioteca</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>


  <?php
  require_once '../includes/auth.php';
  require_once '../includes/funcoes.php';
  $livros = lerArquivo('../data/livros.txt');
  $msg    = $_GET['msg'] ?? '';
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
      <?= mb_strtoupper(mb_substr($_SESSION['usuario'], 0, 2)) ?>
      <div class="user-avatar">AD</div>
      <div class="user-info">
      <?= htmlspecialchars($_SESSION['usuario']) ?>
        <div class="user-name">Admin</div>
        <div class="user-role">Bibliotecário</div>
      </div>
      <a href="../logout.php" class="btn-logout" title="Sair">⏻</a>
    </div>
  </aside>

  <!-- ════ MAIN ════ -->
  <main class="main">
    <div class="topbar">
      <div>
        <div class="topbar-title">📖 Livros</div>
        <div class="topbar-sub">Gerenciamento do acervo</div>
      </div>
      <div class="topbar-actions">
        <!-- TODO PHP: href="cadastrar.php" -->
        <a href="cadastrar.php" class="btn btn-primary">＋ Novo livro</a>
      </div>
    </div>

    <div class="content">

      
      <?php if ($msg === 'cadastrado'): ?>
        <div class="alert alert-success">✓ Livro cadastrado com sucesso!</div>
      <?php elseif ($msg === 'alterado'): ?>
        <div class="alert alert-success">✓ Livro atualizado com sucesso!</div>
      <?php elseif ($msg === 'removido'): ?>
        <div class="alert alert-success">✓ Livro removido com sucesso!</div>
      <?php endif; ?>

      <div class="table-header">
        <h2>Acervo</h2>
         <?= count($livros) ?>
        <span class="table-count">12 livros</span>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Editora</th>
              <th>Autor</th>
              <th>Estoque</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($livros as $pos => $v){
                echo "<tr><td>". $v[0] . "</td>";
                echo "<td>". $v[1] . "</td>";
                echo "<td>". $v[2] . "</td>";
                echo "<td>". $v[3] . "</td>";
                echo "<td>". $v[4] . "</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div><!-- /table-wrap -->

    </div><!-- /content -->
  </main>
</div>

</body>
</html>
