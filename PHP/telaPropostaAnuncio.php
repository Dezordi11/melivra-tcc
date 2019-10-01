    <!DOCTYPE html>
    <head>
       <title>meLivra - Propostas</title>
        <link rel="stylesheet" type="text/css" href="../CSS/estiloBase.css">
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    </head>

    <body>
<?php
  session_start();
  if($_SESSION['email'])
    $email= $_SESSION['email'];
  else header('Location: ../HTML/telaInicial.html');
  if (isset($_GET['link'])) {
  session_destroy();
  unset($_SESSION['email']);
  unset($_SESSION['nome']);
  header('Location: ../HTML/telaInicial.html');}

    $con = mysqli_connect('localhost','root','', 'mydb');
  if($con){
    $busca = mysqli_query($con, "SELECT nome FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
  $row = mysqli_fetch_array($busca);
$name = $row['nome'];
      $busca2 = mysqli_query($con, "SELECT idUsuario FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
      $row2 = mysqli_fetch_array($busca2);
      $idUser = $row2['idUsuario'];
      $idp=$_GET['idp'];
}
?>
        <script src="../jquery-3.4.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>

      <nav class="navbar navbar-expand-md">
      <img class="navbar-brand" src="../Imagens/meLivra - Logo.png">
      <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav justify-content-center d-flex flex-fill">
          <li class="nav-item">
            <a class="nav-link" href="#">Anúncios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="telaPedido.php">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="telaEmprestimo.php">Meus empréstimos</a>
          </li>
        </ul>
        <ul class="navbar-nav ml:auto">
          <li class="nav-item">
<?php           
echo '<div class="nav-link"><a href="#">'.$name.'</a>        
<img src="../Imagens/FotoUser.png"></div>'
?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?link=1">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
    <header class="page-header header container-fluid">
      <h3 class="feature-title">Propostas</h3>
   <a class="btn btn-light" href="../PHP/telaMeusAnuncios.php">Voltar</a>
      <?php 
  if($con){
    $busca2 = mysqli_query($con, "SELECT * FROM proposta WHERE idPostagem = ". $idp . " ORDER BY idProposta DESC") or die(mysqli_error($con));
  }     
  if(mysqli_num_rows($busca2) > 0 ){ 
      while($row = mysqli_fetch_array($busca2)){
        $buscaUser = mysqli_query($con, "SELECT * FROM Usuario WHERE idUsuario = '".$row['idUsuario']."'") or die(mysqli_error($con));
        $rowUser= mysqli_fetch_array($buscaUser) ;
        $idpr= $row['idProposta'];
        echo '<div class="postagem"> 
          <div class="dados"><br><br><br>
          <h5>&nbsp &nbspData de Devolução Inicial:</h5>
            <h5>&nbsp &nbsp'.$row['dataEntregaInicial'].'</h5>
          </div>
          <div class="user">
            <img class="fotoUser" src="../Imagens/FotoUser.png">
            <h5>'.$rowUser['nome'].' </h5> 
            <a class="btn btn-light" href="../PHP/fazerEmprestimo.php?idpr='.$idpr.'">Aceitar proposta</a>
          </div>
        </div>';
    }}else echo '&nbsp&nbsp&nbspNão há propostas ainda.';
       ?>
    </header>
    </body>
    </html>