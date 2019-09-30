<?php
session_start();
$email= $_SESSION['email'];
if ($_POST['estado'] != NULL and $_POST['entrega'] != NULL){
    $con = mysqli_connect('localhost','root','', 'mydb');
    if ($con){
        $busca = mysqli_query($con, "SELECT nome FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($busca);
        $user = $row['nome'];
            $row = mysqli_fetch_array($busca);
            $busca2 = mysqli_query($con, "SELECT * FROM Usuario WHERE nome = '$user'") or die(mysqli_error($con));
            $row2 = mysqli_fetch_array($busca2)	;
            $idUser=$row2['idUsuario'];
        $idPost=$_GET['idp'];
        $busca3 = mysqli_query($con, "SELECT * FROM Postagem WHERE idPostagem = '$idPost'") or die(mysqli_error($con));
        $row3 = mysqli_fetch_array($busca3)	;
        $dataPost=$row3['dt_entrega'];
            $proposta = mysqli_query($con, "INSERT INTO proposta(idUsuario, idPostagem,  local, estadoLivro, dataEntregaInicial) VALUES ('$idUser','".$_GET['idp']."','".$_POST['entrega']."','".$_POST['estado']."','$dataPost')");
            header('Location: telaPedido.php');
    }else die('Sem conexão');
}else header('Location: telaPedido.php');

?>