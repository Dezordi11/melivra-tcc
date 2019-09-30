<?php
session_start();
if(isset($_SESSION['email'])) {
    header('Location: telaAnuncio.php');
    die();}

$email = $_POST['email'];
if ($_POST['email'] != NULL and $_POST['senha'] != NULL and $_POST['nome'] != NULL and $_POST['senha2'] != NULL){
	$con = mysqli_connect('localhost','root','', 'mydb');
	if ($con){
			$busca = mysqli_query($con, "SELECT * FROM Usuario WHERE email = '$email'") or die(mysqli_error($con));
			$num = mysqli_num_rows($busca); 
			if($num<=0){
			$cadastro = mysqli_query($con, "INSERT INTO usuario(nome, sobrenome, email, senha, celular)VALUES('".$_POST['nome']."','".$_POST['sobrenome']."','".$_POST['email']."','".password_hash($_POST['senha'],PASSWORD_DEFAULT)."','".$_POST['telefone']."')");
			$_SESSION['email'] = $email;
			$_SESSION['nome']= $_POST['nome'];
			header('Location: telaAnuncio.php');
		}else header ('Location: criarConta.html');
}else die('Sem conexão');
}else header ('Location: criarConta.html');
?>