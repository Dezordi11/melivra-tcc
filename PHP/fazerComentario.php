<?php
session_start();
ob_start();

$email= $_SESSION['email'];
$idE=$_GET['idEmp'];
    $con = mysqli_connect('localhost','id11285427_dezordi','00112233', 'id11285427_melivra');
    if ($con){
        $busca = mysqli_query($con, "SELECT nome FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($busca);
        $user = $row['nome'];
            $row = mysqli_fetch_array($busca);
            $busca2 = mysqli_query($con, "SELECT * FROM usuario WHERE nome = '$user'") or die(mysqli_error($con));
            $row2 = mysqli_fetch_array($busca2)	;
            $idUser=$row2['idUsuario'];
            $comentario = mysqli_query($con, "INSERT INTO comentario(idUsuario, idEmprestimo, conteudo, data) VALUES ('$idUser','$idE','".$_POST['conteudo']."', NOW())") or die(mysqli_error($con));
            header("Location: telaEmprestimoDetalhes.php?idEmp=".$idE."");
    }else die('Sem conexão');

?>