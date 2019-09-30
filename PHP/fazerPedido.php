<?php
session_start();
$email= $_SESSION['email'];
$nome = $_POST['livro'];
if ($_POST['livro'] != NULL and $_POST['data'] != NULL){
	$con = mysqli_connect('localhost','root','', 'mydb');
	if ($con){
		 $busca = mysqli_query($con, "SELECT nome FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
		  $row = mysqli_fetch_array($busca);
		$user = $row['nome'];
			$busca = mysqli_query($con, "SELECT * FROM Livro WHERE titulo = '$nome'") or die(mysqli_error($con));
			$num = mysqli_num_rows($busca); 
			if($num>0){
				$row = mysqli_fetch_array($busca);
				$busca2 = mysqli_query($con, "SELECT * FROM Usuario WHERE nome = '$user'") or die(mysqli_error($con));
				$row2 = mysqli_fetch_array($busca2)	;	
				$idUser=$row2['idUsuario'];
				$idLiv=$row['idLivro'];	
				$tipo='b';
				$anuncio = mysqli_query($con, "INSERT INTO postagem(idUsuario, idLivro, dt_entrega, tipo)VALUES('$idUser','".$idLiv."','".$_POST['data']."','$tipo')");
				header('Location: telaAnuncio.php');
	  }else header('Location: fazeranuncio.html');
	}else die('Sem conexão');
}else header('Location: fazeranuncio.html');

?>