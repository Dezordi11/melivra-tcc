    <!DOCTYPE html>
    <head>
       <title>meLivra - Pedidos</title>
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
      $busca2 = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
      $row2 = mysqli_fetch_array($busca2);
      $idUser = $row2['idUsuario'];
     $onerro="this.src='../Imagens/fotoUser.png'";
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
            <a class="nav-link" href="telaAnuncio.php">Anúncios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="telaEmprestimo.php">Meus empréstimos</a>
          </li>
        </ul>
        <ul class="navbar-nav ml:auto">
          <li class="nav-item">
<?php           
echo '<div class="nav-link"><a href="#">'.$name.'</a>        
            <img src="../Imagens/'.$row2['imagem'].'" onerror='.$onerro.'>'
?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?link=1">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
    <header class="page-header header container-fluid">
      <h3 class="feature-title">Pedidos</h3>
   <a class="btn btn-light" href="../HTML/fazerPedido.html">Fazer pedido</a>
      <?php 
  if($con){
    $busca2 = mysqli_query($con, "SELECT * FROM postagem WHERE tipo ='b' and idUsuario !=". $idUser ." ORDER BY idPostagem DESC") or die(mysqli_error($con));
  }     
  if(mysqli_num_rows($busca2) > 0 ){ 
      while($row = mysqli_fetch_array($busca2)){
        $buscaLivro = mysqli_query($con, "SELECT * FROM Livro WHERE idLivro= '".$row['idLivro']."'") or die(mysqli_error($con));
        $rowLivro = mysqli_fetch_array($buscaLivro) ; 
        $buscaUser = mysqli_query($con, "SELECT * FROM Usuario WHERE idUsuario = '".$row['idUsuario']."'") or die(mysqli_error($con));
        $rowUser= mysqli_fetch_array($buscaUser) ;
        $idp= $row['idPostagem'];
          $onerro1="this.src='../Imagens/HoraDaEstrela.jpg'";
          echo '<div class="postagem">
            <div class="dados"><h4>'.$rowLivro['titulo'].'</h4>
                <img class="fotoLivro" src="'.$rowLivro['foto'].'" onerror='.$onerro1.'>     
            <h5>'.$rowLivro['autor'].'</h5><br> 
            <h6>Data de devolução: <br>'.$row['dt_entrega'].'</h6>
          </div>
          <div class="user">';
          $buscaNota = mysqli_query($con, "SELECT ROUND(AVG(nota),1) AS media FROM Avaliacao WHERE idUsuario ='".$rowUser['idUsuario']."'") or die(mysqli_error($con));
          $rowNota= mysqli_fetch_array($buscaNota);
          if (empty($rowNota['media'])){
              echo '<h6> 0 <img class="fotoEstrela" src="../Imagens/estrela.png"></h6>';
          }else{
              echo '<h6>'.$rowNota['media'].' <img class="fotoEstrela" src="../Imagens/estrela.png"></h6>';}
          echo '
            <img class="fotoUser" src="../Imagens/'.$rowUser['imagem'].'" onerror='.$onerro.'>
            <h5>'.$rowUser['nome']. ' </h5> 
               <a class="btn btn-light" href="../PHP/fazerPropostaPedido.php?idp='.$idp.'">Fazer proposta</a>          
          </div>
        </div>';        
    }}else echo '&nbsp&nbsp&nbspNão há pedidos ainda.';
       ?>
    </header>
    </body>
    </html>