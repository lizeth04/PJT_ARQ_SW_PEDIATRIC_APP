<?php
include "ConexionBDD.php";

$id = $_POST['id'];
$comentario = $_POST['comentario'];

$q = "UPDATE historia_clinica SET antecedentesPersonales='$comentario' WHERE id_historiaClinica=$id";
$consulta = mysqli_query($con, $q);

header("location: ../view/medico/index.php");

?>