<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="../jquery-3.4.1.min.js"></script>

<?php
session_start();
$email= $_SESSION['email'];
$nome = $_POST['livro'];
if ($_POST['livro'] != NULL and $_POST['estado'] != NULL and $_POST['autocomplete_search'] != NULL){
	$con = mysqli_connect('localhost','root','', 'mydb');
	if ($con){
	    $nome2 = str_replace(' ','+',$nome);

         $options=array(
            'ssl'=>array(
                'cafile'            => '‪C:\xampp\apache\bin\curl-ca-bundle.crt',
                 'verify_peer'       => false,
                'verify_peer_name'  => false,
            ),
        );
        $context = stream_context_create( $options );
        $dadosApi=json_decode( file_get_contents( "https://www.googleapis.com/books/v1/volumes?key=AIzaSyBwaJ2wkYcrfRX3Ps5b6L-XZpWa_giiQfw&q={$nome2}&maxResults=1",false, $context ), true );

	    if($dadosApi['totalItems']>0) {
	        if($dadosApi['items'][0]['volumeInfo']){
	            $titulo=$dadosApi['items'][0]['volumeInfo']['title'];
	            $sinopse=$dadosApi['items'][0]['volumeInfo']['description'];
	            $autores=implode(', ', $dadosApi['items'][0]['volumeInfo']['authors']);
	            $foto=$dadosApi['items'][0]['volumeInfo']['imageLinks']['thumbnail'];

	            $busca = mysqli_query($con, "SELECT * FROM Livro WHERE titulo = '$titulo'") or die(mysqli_error($con));
                $num = mysqli_num_rows($busca);
                if($num<=0) {
                    $crialivro = mysqli_query($con, "INSERT INTO livro(titulo, autor, sinopse, foto)VALUES('$titulo','$autores','$sinopse','$foto')");
                }
	        }
        }

		 $busca = mysqli_query($con, "SELECT nome FROM usuario WHERE email = '$email'") or die(mysqli_error($con));
		  $row = mysqli_fetch_array($busca);
		$user = $row['nome'];
			$busca = mysqli_query($con, "SELECT * FROM Livro WHERE titulo = '$titulo'") or die(mysqli_error($con));
			$num = mysqli_num_rows($busca); 
			if($num>0){
				$row = mysqli_fetch_array($busca);
				$busca2 = mysqli_query($con, "SELECT * FROM Usuario WHERE nome = '$user'") or die(mysqli_error($con));
				$row2 = mysqli_fetch_array($busca2)	;	
				$idUser=$row2['idUsuario'];
				$idLiv=$row['idLivro'];	
				$tipo='a';
				$anuncio = mysqli_query($con, "INSERT INTO postagem(idUsuario, local, idLivro, estadoLivro, tipo)VALUES('$idUser','".$_POST['autocomplete_search']."','$idLiv','".$_POST['estado']."','$tipo')");
				header('Location: telaAnuncio.php');
	         }//else header('Location: ../HTML/fazeranuncio.html');
	}else die('Sem conexão');
}//else header('Location: ../HTML/fazerAnuncio.html');

?>