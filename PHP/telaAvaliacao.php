  <!DOCTYPE html>
  <head>
     <title>meLivra - Avaliação</title>
      <link rel="stylesheet" type="text/css" href="../CSS/estiloCadastro.css">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

  <body>
      <script src="../jquery-3.4.1.min.js"></script>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-md">
    <img class="navbar-brand brand-centered" src="../Imagens/meLivra%20-%20Logo.png">
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
          <?php
          $idEmp = $_GET['idEmp'];
          ?>
        <li class="nav-item">
          <a class="nav-link" href="../PHP/telaEmprestimoDetalhes.php?idEmp=<?php echo $idEmp; ?>">Voltar</a>
        </li>
      </ul>
    </div>
  </nav>
  <header class="page-header header container-fluid">
    <h3 class="feature-title">Avaliação</h3>
<form method='POST' action="../PHP/fazerAvaliacao.php?idEmp=<?php echo $idEmp; ?>">
    <div class="form-group"><h5>Nota:</h5>
        <input type="radio" class="radio-inline" name="nota" value=1> 1
        <input type="radio" class="radio-inline" name="nota" value=2> 2
        <input type="radio" class="radio-inline" name="nota" value=3> 3
        <input type="radio" class="radio-inline" name="nota" value=4> 4
        <input type="radio" class="radio-inline" name="nota" value=5> 5
        <input type="radio" class="radio-inline" name="nota" value=0> Denunciar

    </div>
    <div class="form-group"><h5>Avaliação:</h5>
            <textarea name="conteudo"></textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-secondary" value="Enviar" name="ok">
  </form>
  </header>
  <script src="../CSS/jsTelaInicial.js"></script>
  </body>

  </html>