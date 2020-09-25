<?php

session_start();
$opcion = $_REQUEST['opcion'];


switch ($opcion) {
    case 'inicioSesion':
        header('Location: ../view/index.php');
        break;
    case 'registro':
        header('Location: ../view/cliente/registroCita/registroClientes.php');
        break;
        
}


