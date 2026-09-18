<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alunos — Biblioteca</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<!-- ============================================================
  TODO PHP — Topo do arquivo alunos/listar.php:
  <?php
  require_once '../includes/auth.php';
  require_once '../includes/funcoes.php';
  $alunos = lerArquivo('../data/alunos.txt');
  $msg    = $_GET['msg'] ?? '';
  ?>
============================================================ -->

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

  <!-- ════ MAIN ════ -->
  <main class="main">
    <div class="topbar">
      <div>
        <div class="topbar-title">🎓 Alunos</div>
        <div class="topbar-sub">Gerenciamento de alunos cadastrados</div>
      </div>
      <div class="topbar-actions">
        <a href="cadastrar.php" class="btn btn-primary">＋ Novo aluno</a>
      </div>
    </div>

    <div class="content">

      <!-- TODO PHP:
      <?php if ($msg === 'cadastrado'): ?>
        <div class="alert alert-success">✓ Aluno cadastrado com sucesso!</div>
      <?php elseif ($msg === 'alterado'): ?>
        <div class="alert alert-success">✓ Aluno atualizado com sucesso!</div>
      <?php elseif ($msg === 'removido'): ?>
        <div class="alert alert-success">✓ Aluno removido com sucesso!</div>
      <?php endif; ?>
      -->

      <div class="table-header">
        <h2>Alunos</h2>
        <!-- TODO PHP: <?= count($alunos) ?> aluno(s) -->
        <span class="table-count">8 alunos</span>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Matrícula</th>
              <th>Sexo</th>
              <th>Nascimento</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>

            <!-- ══════════════════════════════════════════════════════
              TODO PHP — Substituir as linhas abaixo pelo loop:
              <?php foreach ($alunos as $aluno): ?>
              <tr>
                <td class="td-main"><?= htmlspecialchars($aluno[0]) ?></td>
                <td class="td-mono"><?= htmlspecialchars($aluno[1]) ?></td>
                <td>
                  <?php if ($aluno[2] === 'M'): ?>
                    <span class="badge badge-masc">♂ Masc.</span>
                  <?php else: ?>
                    <span class="badge badge-fem">♀ Fem.</span>
                  <?php endif; ?>
                </td>
                <td><?= date('d/m/Y', strtotime($aluno[3])) ?></td>
                <td class="td-actions">
                  <a href="alterar.php?matricula=<?= urlencode($aluno[1]) ?>" class="btn btn-sm btn-edit">Editar</a>
                  <a href="remover.php?matricula=<?= urlencode($aluno[1]) ?>"
                     onclick="return confirm('Remover este aluno?')"
                     class="btn btn-sm btn-danger">Remover</a>
                </td>
              </tr>
              <?php endforeach; ?>
            ══════════════════════════════════════════════════════ -->

            <!-- DADOS ALEATÓRIOS DE EXEMPLO -->
            <tr>
              <td class="td-main">Ana Beatriz Souza</td>
              <td class="td-mono">2024001</td>
              <td><span class="badge badge-fem">♀ Fem.</span></td>
              <td>12/03/2003</td>
              <td class="td-actions">
                <a href="alterar.php" class="btn btn-sm btn-edit">Editar</a>
                <a href="#" onclick="return confirm('Remover?')" class="btn btn-sm btn-danger">Remover</a>
              </td>
            </tr>
            <tr>
              <td class="td-main">Carlos Eduardo Lima</td>
              <td class="td-mono">2024002</td>
              <td><span class="badge badge-masc">♂ Masc.</span></td>
              <td>08/11/2002</td>
              <td class="td-actions">
                <a href="alterar.php" class="btn btn-sm btn-edit">Editar</a>
                <a href="#" onclick="return confirm('Remover?')" class="btn btn-sm btn-danger">Remover</a>
              </td>
            </tr>
            <tr>
              <td class="td-main">Fernanda Oliveira</td>
              <td class="td-mono">2024003</td>
              <td><span class="badge badge-fem">♀ Fem.</span></td>
              <td>25/07/2004</td>
              <td class="td-actions">
                <a href="alterar.php" class="btn btn-sm btn-edit">Editar</a>
                <a href="#" onclick="return confirm('Remover?')" class="btn btn-sm btn-danger">Remover</a>
              </td>
            </tr>
            <tr>
              <td class="td-main">Gabriel Martins Rocha</td>
              <td class="td-mono">2024004</td>
              <td><span class="badge badge-masc">♂ Masc.</span></td>
              <td>19/01/2003</td>
              <td class="td-actions">
                <a href="alterar.php" class="btn btn-sm btn-edit">Editar</a>
                <a href="#" onclick="return confirm('Remover?')" class="btn btn-sm btn-danger">Remover</a>
              </td>
            </tr>
            <tr>
              <td class="td-main">Isabela Costa Ferreira</td>
              <td class="td-mono">2024005</td>
              <td><span class="badge badge-fem">♀ Fem.</span></td>
              <td>30/09/2001</td>
              <td class="td-actions">
                <a href="alterar.php" class="btn btn-sm btn-edit">Editar</a>
                <a href="#" onclick="return confirm('Remover?')" class="btn btn-sm btn-danger">Remover</a>
              </td>
            </tr>
            <tr>
              <td class="td-main">Lucas Pereira dos Santos</td>
              <td class="td-mono">2024006</td>
              <td><span class="badge badge-masc">♂ Masc.</span></td>
              <td>05/05/2004</td>
              <td class="td-actions">
                <a href="alterar.php" class="btn btn-sm btn-edit">Editar</a>
                <a href="#" onclick="return confirm('Remover?')" class="btn btn-sm btn-danger">Remover</a>
              </td>
            </tr>
            <tr>
              <td class="td-main">Mariana Teixeira</td>
              <td class="td-mono">2024007</td>
              <td><span class="badge badge-fem">♀ Fem.</span></td>
              <td>14/06/2002</td>
              <td class="td-actions">
                <a href="alterar.php" class="btn btn-sm btn-edit">Editar</a>
                <a href="#" onclick="return confirm('Remover?')" class="btn btn-sm btn-danger">Remover</a>
              </td>
            </tr>
            <tr>
              <td class="td-main">Rafael Alves Nunes</td>
              <td class="td-mono">2024008</td>
              <td><span class="badge badge-masc">♂ Masc.</span></td>
              <td>22/12/2003</td>
              <td class="td-actions">
                <a href="alterar.php" class="btn btn-sm btn-edit">Editar</a>
                <a href="#" onclick="return confirm('Remover?')" class="btn btn-sm btn-danger">Remover</a>
              </td>
            </tr>

          </tbody>
        </table>
      </div>

    </div>
  </main>
</div>

</body>
</html>
