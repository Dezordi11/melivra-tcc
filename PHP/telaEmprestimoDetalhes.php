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
      $busca2 = mysqli_query($con, "SELECT idUsuario FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
      $row2 = mysqli_fetch_array($busca2);
      $idUser = $row2['idUsuario'];
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
<a class="btn btn-light" href="../PHP/telaEmprestimo.php">Voltar</a>
            <?php
            if($con) {
                $busca2 = mysqli_query($con, "SELECT * FROM emprestimo WHERE idUsuarioA =" . $idUser . " or IdUsuarioB ='$idUser' ORDER BY idEmprestimo DESC") or die(mysqli_error($con));
                if (mysqli_num_rows($busca2) > 0) {
                    while ($rowEmp = mysqli_fetch_array($busca2)) {
                        $buscaProp = mysqli_query($con, "SELECT * FROM Proposta WHERE idProposta= '" . $rowEmp['idProposta'] . "'") or die(mysqli_error($con));
                        $rowProp = mysqli_fetch_array($buscaProp);
                        $buscaPost = mysqli_query($con, "SELECT * FROM Postagem WHERE idPostagem= '" . $rowProp['idPostagem'] . "'") or die(mysqli_error($con));
                        $rowPost = mysqli_fetch_array($buscaPost);
                        $buscaLivro = mysqli_query($con, "SELECT * FROM Livro WHERE idLivro= '" . $rowPost['idLivro'] . "'") or die(mysqli_error($con));
                        $rowLivro = mysqli_fetch_array($buscaLivro);
                        if ($idUser == $rowEmp['idUsuarioA']) {
                            $buscaUser = mysqli_query($con, "SELECT * FROM Usuario WHERE idUsuario = '" . $rowEmp['idUsuarioB'] . "'") or die(mysqli_error($con));
                            $rowUser = mysqli_fetch_array($buscaUser);
                        } else {
                            $buscaUser = mysqli_query($con, "SELECT * FROM Usuario WHERE idUsuario = '" . $rowEmp['idUsuarioA'] . "'") or die(mysqli_error($con));
                            $rowUser = mysqli_fetch_array($buscaUser);
                        }
                        $idEmp= $rowEmp['idEmprestimo'];
                        $string = $rowLivro['sinopse'];
                        if (strlen($string) > 150) {
                            $stringCut = substr($string, 0, 150);
                            $endPoint = strrpos($stringCut, ' ');

                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        }

                        echo '<div class="container">
            <div class="containerdados">
            <h4>' . $rowLivro['titulo'] . '</h4>
                <img class="fotoLivro" src="../Imagens/HoraDaEstrela.jpg"><div>
                <h5>' . $rowLivro['autor'] . '</h5><br>
                <h7><i>' . $string . '...</i></h7><br><br> 
                <h6>' . $rowPost['estadoLivro'] . '</h6>
                <h6>' . $rowProp['local'] . '</h6>
                <h6>Data de Empréstimo: ' . $rowEmp['dataEmprestimo'] . '</h6>
                <h6>Data de Devolução: ' . $rowProp['dataEntregaInicial'] . '</h6>
                <h6>Status: <b>' . $rowEmp['status'] . '</b></h6></div>
            </div>
            <div class="user">
                <img class="fotoUser" src="../Imagens/FotoUser.png">
                <h5>' . $rowUser['nome'] . ' </h5>
          </div>';
          if($idUser==$rowEmp['idUsuarioA']){echo '<div>
                <a class="btn btn-light" href="../PHP/telaPropostaAnuncio.php">Finalizar empréstimo</a>
                <a class="btn btn-light" href="../PHP/telaAlterarLocal.php?idEmp='.$idEmp.'">Alterar ponto de encontro</a>
                <a class="btn btn-light" href="../PHP/telaAlterarData.php?idEmp='.$idEmp.'">Alterar data de devolução</a>
                </div>';}
        echo '</div>';
                    }
                }
                echo '
            <a class="btn btn-light" href="../PHP/telaComentario.php?idEmp='.$idEmp.'">Escrever mensagem</a>';
                $busca2 = mysqli_query($con, "SELECT * FROM comentario WHERE idEmprestimo = " . $idEmp . " ORDER BY idComentario DESC") or die(mysqli_error($con));
                if (mysqli_num_rows($busca2) > 0) {
                    while ($row = mysqli_fetch_array($busca2)) {
                        $buscaUser = mysqli_query($con, "SELECT * FROM Usuario WHERE idUsuario = '" . $row['idUsuario'] . "'") or die(mysqli_error($con));
                        $rowUser = mysqli_fetch_array($buscaUser);
                        echo '<div class="postagem"> 
          <div class="dados"><h4>Mensagem</h4>
            <h6>&nbsp' . $row['conteudo'] . '</h6>
            <h6><i>' . $row['data'] . '</i></h6>
          </div>
          <div class="user">
            <img class="fotoUser" src="../Imagens/FotoUser.png">
            <h5>' . $rowUser['nome'] . ' </h5> 
          </div>
        </div>';
                    }
                }
            }
            ?>
        </header>
    </div>
    </body>
    </html>