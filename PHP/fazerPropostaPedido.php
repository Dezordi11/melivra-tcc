  <!DOCTYPE html>
  <head>
     <title>meLivra - Proposta</title>
      <link rel="stylesheet" type="text/css" href="../CSS/estiloCadastro.css">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
        <li class="nav-item">
          <a class="nav-link" href="../PHP/telaPedido.php">Voltar</a>
        </li>
      </ul>
    </div>
  </nav>
  <header class="page-header header container-fluid">
    <h3 class="feature-title">Fazer Proposta</h3>
      <?php
      $idp = $_GET['idp'];
      ?>
<form method='POST' action="../PHP/fazerProposta.php?idp=<?php echo $idp; ?>">
    <label>Estado do Livro:</label> <br>
    <div class="form-group">
        <input type="radio" class="radio-inline" name="estado" value="Perfeito estado"> Perfeito estado
        <input type="radio" class="radio-inline" name="estado" value="Levemente danificado"> Levemente danificado
        <input type="radio" class="radio-inline" name="estado" value="Danificado"> Danificado
    </div>
    <label>Ponto de Entrega:</label> <br>
    <div id="custom-search-input">
        <div class="form-group">
            <input id="autocomplete_search" name="autocomplete_search" type="text" class="form-control" placeholder="Ponto de Entrega" />
            <input type="hidden" name="lat">
            <input type="hidden" name="long">
        </div>
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