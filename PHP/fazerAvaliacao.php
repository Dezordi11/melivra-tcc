<?php
session_start();
$email= $_SESSION['email'];
$idEmp=$_GET['idEmp'];
    $con = mysqli_connect('localhost','root','', 'mydb');
    if ($con){
        $busca = mysqli_query($con, "SELECT * FROM emprestimo WHERE idEmprestimo = '$idEmp'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($busca);
        $user = $row['idUsuarioB'];
            $avaliacao = mysqli_query($con, "INSERT INTO avaliacao(idUsuario, texto, nota) VALUES ('$user','".$_POST['conteudo']."','".$_POST['nota']."')") or die(mysqli_error($con));
            header("Location: telaEmprestimoDetalhes.php?idEmp=".$idEmp."");
    }else die('Sem conexão');

?>