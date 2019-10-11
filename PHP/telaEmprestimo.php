    <!DOCTYPE html>
    <head>
       <title>meLivra - Meus Empréstimos</title>
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
            <a class="nav-link" href="telaPedido.php">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Meus empréstimos</a>
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

    <div id="wrapper" class="d-flex">

        <div id="sidebar-wrapper" class="bg-light border-right">
            <div class="sidebar-heading">Meus Empréstimos</div>
            <div class="list-group list-group-flush">
                <a href="telaMeusAnuncios.php" class="list-group-item list-group-item-action bg-light">Meus Anúncios</a>
                <a href="telaMeusPedidos.php" class="list-group-item list-group-item-action bg-light">Meus Pedidos</a>
            </div>
        </div>
        <header class="page-header header container-fluid">
        <div id="page-content-wrapper">
            <?php
            if($con){
                $busca2 = mysqli_query($con, "SELECT * FROM emprestimo WHERE idUsuarioA =". $idUser . " or IdUsuarioB ='$idUser' ORDER BY status") or die(mysqli_error($con));
            if(mysqli_num_rows($busca2) > 0 ){
                while($rowEmp = mysqli_fetch_array($busca2)){
                    $buscaProp = mysqli_query($con, "SELECT * FROM Proposta WHERE idProposta= '".$rowEmp['idProposta']."'") or die(mysqli_error($con));
                    $rowProp = mysqli_fetch_array($buscaProp);
                    $buscaPost = mysqli_query($con, "SELECT * FROM Postagem WHERE idPostagem= '".$rowProp['idPostagem']."'") or die(mysqli_error($con));
                    $rowPost = mysqli_fetch_array($buscaPost);
                    $buscaLivro = mysqli_query($con, "SELECT * FROM Livro WHERE idLivro= '".$rowPost['idLivro']."'") or die(mysqli_error($con));
                    $rowLivro = mysqli_fetch_array($buscaLivro) ;
                    $idEmp= $rowEmp['idEmprestimo'];
                    if ($idUser== $rowEmp['idUsuarioA']){
                         $buscaUser = mysqli_query($con, "SELECT * FROM Usuario WHERE idUsuario = '".$rowEmp['idUsuarioB']."'") or die(mysqli_error($con));
                         $rowUser= mysqli_fetch_array($buscaUser) ;}
                    else{
                        $buscaUser = mysqli_query($con, "SELECT * FROM Usuario WHERE idUsuario = '".$rowEmp['idUsuarioA']."'") or die(mysqli_error($con));
                        $rowUser= mysqli_fetch_array($buscaUser) ;}
                    echo '<div class="postagem">
            <div class="dados">
            <h4>'.$rowLivro['titulo'].'</h4>
                <img class="fotoLivro" src="../Imagens/HoraDaEstrela.jpg">
                <h6>'.$rowLivro['autor'].'</h6><br>
                <h6>Data de empréstimo: '.$rowEmp['dataEmprestimo'].'</h6>
                <h6>Data de Devolução: '.$rowProp['dataEntregaInicial'].'</h6> 
            ';
                    date_default_timezone_set('America/Sao_Paulo');
                    $data= date('Y-m-d');
                    if($rowProp['dataEntregaInicial']< $data and $rowEmp['status']!='Finalizado'){
                        $alterar=mysqli_query($con,"UPDATE emprestimo SET status='Atrasado' where idEmprestimo = '$idEmp'") or die(mysqli_error($con));
                    }else if($rowEmp['status']!='Finalizado'){$alterar=mysqli_query($con,"UPDATE emprestimo SET status='Em andamento' where idEmprestimo = '$idEmp'") or die(mysqli_error($con));}
                    if(empty($_GET['status2'])){
                        header('Location:telaEmprestimo.php?status2=1');
                        exit;
                    }
                    echo '
                <h6>Status: <b>'.$rowEmp['status'].'</b></h6>
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
                <h5>'.$rowUser['nome'].' </h5>
                <a class="btn btn-light" href="../PHP/telaEmprestimoDetalhes.php?idEmp='.$idEmp.'">Ver detalhes</a>
          </div>                     
        </div>';
                }}else {echo 'Não há empréstimos seus ainda.';}
            }
            ?>
        </div>
        </header>
    </div>
    </body>
    </html>