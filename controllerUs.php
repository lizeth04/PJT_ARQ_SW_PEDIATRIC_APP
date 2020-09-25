<?php

include_once '../model/modelUser.php';
//include '../model/modelCitasMedicas.php';
session_start();
$opcion = $_REQUEST['opcion'];
$modelUs = new modelUser();
//$modelCita=new modelCitasMedicas();
//$modelUsuario = new modeUsuario();
switch ($opcion) {
    case 'ingreso':
        header('Location: ../view/index.php');
        
        
        break;
    case 'login':
        $usuario = $_REQUEST['usuario'];
        $password = $_REQUEST['clave'];
        $sesionDTO = $modelUs->login($usuario, $password);
        $pers = $modelUs->consultarUsuario($usuario);
        $_SESSION['us'] = serialize($pers);
        $_SESSION['sesionDTO'] = serialize($sesionDTO); //guardar en sesion
        //redireccion de navegacion 
        //$datos=$modelCita->consultarPaciente($usuario);
       // $_SESSION['datos'] = serialize($datos);
        header('Location: ' . $sesionDTO->getRuta());
        
        break;
}
