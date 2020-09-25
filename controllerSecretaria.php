<?php

session_start();
include '../model/modelCitasMedicas.php';
$opcion = $_REQUEST['opcion'];
$modelS = new modelCitasMedicas();

switch ($opcion) {
    case 'validacionPago':
        $lista = $modelS->getTicketMedico();
        $_SESSION['lista'] = serialize($lista);
        header('Location: ../view/administracion/validacionCita/index.php');
        break;
    case 'registro':
        // header('Location: ../view/cliente/registroCita/registroClientes.php');
        break;

    case 'validarCitaMedica':
        $id_cita = $_REQUEST['id_cita'];
        $ticket = $modelS->consultarTicket($id_cita);
        //guardamos en sesion para edicion posterior:
        $_SESSION['ticket'] = serialize($ticket);
        header('Location: ../view/administracion/validacionCita/citaValidada.php');
        break;


    case 'citaValida':
        $id_cita = $_REQUEST['id_cita'];
        $estado = $_REQUEST['estado'];
        $ticket = $modelS->validarTicketMedico($estado, $id_cita);
        //guardamos en sesion para edicion posterior:
        $lista = $modelS->getTicketMedico();
        $_SESSION['lista'] = serialize($lista);
        header('Location: ../view/administracion/validacionCita/index.php');
        break;

    case'pagHorario':

        header('Location: ../view/administracion/registroHorarios/index.php');

        break;


    case 'registrarHorarios':
        $id_horario = null; //por defecto null
        $id_rol = 2;
        $id_persona = $_REQUEST['id_persona'];
        $dia = $_REQUEST['dia'];
        $hora = $_REQUEST['hora'];
        $estado = 1;
        //$rep = $modelS->consultarHorario($dia, $hora);
        //print_r($rep);
        $modelS->insertSchedule($id_horario, $id_rol, $id_persona, $dia, $hora, $estado);
        header('Location: ../view/administracion/registroHorarios/index.php');
        //  include '../view/administracion/registroHorarios/registrarHorario.php';
        break;
    case 'actualizarHCa':
        $idhistoria = $_REQUEST['id'];
        $antecedentesPersonales = $_REQUEST['comentario'];
        $modelS->actualizarHistoriCLinica($antecedentesPersonales, $idhistoria);
        header('Location: ../view/medico/index.php');
        
        //include '../view/medico/index.php';

        break;
}

