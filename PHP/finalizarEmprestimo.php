<?php
$idEmp= $_GET['idEmp'];
$con = mysqli_connect('localhost','id11285427_dezordi','00112233', 'id11285427_melivra');
if ($con){
    $busca2 = mysqli_query($con, "SELECT * FROM emprestimo WHERE  idEmprestimo= '$idEmp'") or die(mysqli_error($con));
    $row2 = mysqli_fetch_array($busca2);
    $idProp=$row2['idProposta'];
    $alterar = mysqli_query($con, "UPDATE emprestimo SET status='Finalizado' WHERE idEmprestimo = '$idEmp'") or die(mysqli_error($con));
    header("Location: telaAvaliacao.php?idEmp=".$idEmp."");
}else die('Sem conexão');
?>