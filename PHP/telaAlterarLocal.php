  <!DOCTYPE html>
  <head>
     <title>meLivra - Alterar local</title>
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
          <a class="nav-link" href="../PHP/telaEmprestimoDetalhes.php">Voltar</a>
        </li>
      </ul>
    </div>
  </nav>
  <header class="page-header header container-fluid">
    <h3 class="feature-title">Alterar ponto de encontro</h3>
      <?php
      $idEmp = $_GET['idEmp'];
      ?>
<form method='POST' action="../PHP/alterarLocal.php?idEmp=<?php echo $idEmp; ?>">
    <label>Ponto de Entrega:</label> <br>
    <div class="form-group">
        <input id="autocomplete_search" name="autocomplete_search" type="text" class="form-control" placeholder="Ponto de Entrega" />
        <input type="hidden" name="lat">
        <input type="hidden" name="long">
    </div>
    <input type="submit" class="btn btn-secondary" value="Enviar" name="ok">
  </form>
  </header>
  <script src="../CSS/jsTelaInicial.js"></script>
  </body>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL85mJw9K-LHxNAfwVCPpj6XE5bpz2FQg&amp;libraries=places"></script>
  <script>
      google.maps.event.addDomListener(window, 'load', initialize);
      function initialize() {
          var input = document.getElementById('autocomplete_search');
          var autocomplete = new google.maps.places.Autocomplete(input);
          autocomplete.addListener('place_changed', function () {
              var place = autocomplete.getPlace();
              // place variable will have all the information you are looking for.
              $('#lat').val(place.geometry['location'].lat());
              $('#long').val(place.geometry['location'].lng());
          });
      }
  </script>
  </html>