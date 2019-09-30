<?php
session_start();
$email = @$_POST['email'];
$senha = @$_POST['senha'];
$con = mysqli_connect('localhost','root','', 'mydb');
if($con){
		$busca = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$email'") or die(mysqli_error($con));			
		$num = mysqli_num_rows($busca); 
		$linha = mysqli_fetch_assoc($busca);
		if ($num <= 0 or !password_verify($senha, $linha['senha'])) 
		    header('Location: login.html');
		else { $_SESSION['email'] = $email;
			header("Location: telaAnuncio.php");}
		}
?>