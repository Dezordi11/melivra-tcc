<?php
session_start();
ob_start();

$email= $_SESSION['email'];
if ($_POST['dt_entrega'] != NULL){
    $con = mysqli_connect('localhost','id11285427_dezordi','00112233', 'id11285427_melivra');
    if ($con){
        $busca = mysqli_query($con, "SELECT nome FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($busca);
        $user = $row['nome'];
            $row = mysqli_fetch_array($busca);
            $busca2 = mysqli_query($con, "SELECT * FROM usuario WHERE nome = '$user'") or die(mysqli_error($con));
            $row2 = mysqli_fetch_array($busca2)	;
            $idUser=$row2['idUsuario'];
        $idPost=$_GET['idp'];
        $busca3 = mysqli_query($con, "SELECT * FROM postagem WHERE idPostagem = '$idPost'") or die(mysqli_error($con));
        $row3 = mysqli_fetch_array($busca3)	;
        $localPost=$row3['local'];
        $estadoPost=$row3['estadoLivro'];
            $proposta = mysqli_query($con, "INSERT INTO proposta(idUsuario, idPostagem,  local, estadoLivro, dataEntregaInicial) VALUES ('$idUser','$idPost','$localPost','$estadoPost','".$_POST['dt_entrega']."')");
            header('Location: telaAnuncio.php');
    }else die('Sem conexão');
}else header('Location: telaAnuncio.php');

?>