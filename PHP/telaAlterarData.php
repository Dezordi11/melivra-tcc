  <!DOCTYPE html>
  <head>
     <title>meLivra - Alterar data</title>
      <link rel="stylesheet" type="text/css" href="../CSS/estiloCadastro.css">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

  <body>
      <script src="../jquery-3.4.1.min.js"></script>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-md">
    <img class="navbar-brand brand-centered" src="../Imagens/meLivra - Logo.png">
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
        <li class="nav-item">
            <?php
            $idEmp = $_GET['idEmp'];
            ?>
          <a class="nav-link" href="../PHP/telaEmprestimoDetalhes.php?idEmp=<?php echo $idEmp; ?>">Voltar</a>
        </li>
      </ul>
    </div>
  </nav>
  <header class="page-header header container-fluid">
    <h3 class="feature-title">Alterar data de devolução</h3>
<form method='POST' action="../PHP/alterarData.php?idEmp=<?php echo $idEmp; ?>">
    <label>Nova Data de Devolução:</label> <br>
    <div class="form-group">
        <input type="date" class="form-control" placeholder="Data de Devolução" name="dt_entrega">
    </div>
    <input type="submit" class="btn btn-secondary" value="Enviar" name="ok">
  </form>
  </header>
  <script src="../CSS/jsTelaInicial.js"></script>
  </body>
  </html>