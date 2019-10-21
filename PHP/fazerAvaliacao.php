<?php
session_start();
ob_start();

$email= $_SESSION['email'];
$idEmp=$_GET['idEmp'];
    $con = mysqli_connect('localhost','id11285427_dezordi','00112233', 'id11285427_melivra');
    if ($con){
        $busca = mysqli_query($con, "SELECT * FROM emprestimo WHERE idEmprestimo = '$idEmp'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($busca);
        $user = $row['idUsuarioB'];
        if($_POST['nota']==0){
            $tipo='d';
        }else{
            $tipo='a';
        }
            $avaliacao = mysqli_query($con, "INSERT INTO avaliacao(idUsuario, texto, nota, tipo) VALUES ('$user','".$_POST['conteudo']."','".$_POST['nota']."','$tipo')") or die(mysqli_error($con));
            header("Location: telaEmprestimoDetalhes.php?idEmp=".$idEmp."");
    }else die('Sem conexão');

?>