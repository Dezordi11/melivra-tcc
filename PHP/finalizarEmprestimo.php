<?php
$idEmp= $_GET['idEmp'];
$con = mysqli_connect('localhost','root','', 'mydb');
if ($con){
    $busca2 = mysqli_query($con, "SELECT * FROM Emprestimo WHERE  idEmprestimo= '$idEmp'") or die(mysqli_error($con));
    $row2 = mysqli_fetch_array($busca2);
    $idProp=$row2['idProposta'];
    $alterar = mysqli_query($con, "UPDATE emprestimo SET status='Finalizado' WHERE idEmprestimo = '$idEmp'") or die(mysqli_error($con));
    header("Location: telaAvaliacao.php?idEmp=".$idEmp."");
}else die('Sem conexão');
?>