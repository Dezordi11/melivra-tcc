<?php
session_start();
ob_start();

$email= $_SESSION['email'];
$idpr=$_GET['idpr'];
	$con = mysqli_connect('localhost','id11285427_dezordi','00112233', 'id11285427_melivra');
	if ($con){
		 $busca = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
		  $row = mysqli_fetch_array($busca);
			$busca2 = mysqli_query($con, "SELECT * FROM proposta WHERE idProposta = '$idpr'") or die(mysqli_error($con));
			$num = mysqli_num_rows($busca2);
			if($num>0){
				$row2 = mysqli_fetch_array($busca2);
				$idUser=$row['idUsuario'];
				$idUserB=$row2['idUsuario'];
				$status= 'Em andamento';
				$idPost=$row2['idPostagem'];
                $emprestimo = mysqli_query($con, "INSERT INTO emprestimo(idUsuarioA, idProposta, idUsuarioB, dataEmprestimo, status)VALUES('$idUser','$idpr','$idUserB',CURRENT_DATE(),'$status')") or die(mysqli_error($con));
                $alterar = mysqli_query($con, "UPDATE postagem SET tipo = 'c' WHERE idPostagem='$idPost'");
				header('Location: telaEmprestimo.php');
	         }else header('Location: telaMeusAnuncios.php');
	}else die('Sem conexão');

?>