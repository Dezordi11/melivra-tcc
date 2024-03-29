  <!DOCTYPE html>
  <head>
     <title>meLivra - Criar Conta</title>
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
          <a class="nav-link" href="telaInicial.html">Voltar</a>
        </li>
      </ul>
    </div>
  </nav>
  <header class="page-header header container-fluid">
    <h3 class="feature-title">Criar conta</h3>
<form method='POST' enctype="multipart/form-data" action="../PHP/criarConta.php" oninput='senha2.setCustomValidity(senha2.value != senha.value ? "As senhas inseridas não são iguais." : "")'>
    <div class="form-group"><h6>Nome*:</h6>
      <input type="text" class="form-control" placeholder="Nome*" name="nome">
    </div>
    <div class="form-group"><h6>Sobrenome:</h6>
    <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome">
</div>
    <div class="form-group"><h6>Foto de Perfil:</h6>
        <input type="file" class="form-control" name="photo">
        <?php
        if (empty($erro)){
            $erro='';
        }echo $erro; ?>
    </div>
    <div class="form-group"><h6>E-mail*:</h6>
      <input type="email" class="form-control" placeholder="Email*" name="email">
    </div>
    <div class="form-group"><h6>Senha*:</h6>
      <input type="password" class="form-control" placeholder="Senha*" name="senha">
    </div>
    <div class="form-group"><h6>Confirmar senha:</h6>
      <input type="password" class="form-control" placeholder="Confirmar senha" name="senha2">
    </div>      
    <div class="form-group"><h6>Telefone:</h6>
      <input type="text" class="form-control" placeholder="Telefone" name="telefone">
    </div>
    <input type="submit" class="btn btn-secondary" value="Enviar" name="ok">
  </form>
  </header>
  <script src="../CSS/jsTelaInicial.js"></script>
  </body>
  </html>