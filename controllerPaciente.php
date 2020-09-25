<?php

include_once '../model/modelCitasMedicas.php';
session_start();
$opcion = $_REQUEST['opcion'];
$modelCitaM = new modelCitasMedicas();

switch ($opcion) {
    case 'registroPaciente':
        $id_persona = null; //null
        $id_rol = 1;
        $id_genero = $_REQUEST['id_genero'];
        $cedula = $_REQUEST["cedula"];
        $apellidoPaterno = $_REQUEST["apellidoPaterno"];
        $apellidoMaterno = $_REQUEST["apellidoMaterno"];
        $primerNombre = $_REQUEST["primerNombre"];
        $segundoNombre = $_REQUEST["segundoNombre"];
        $fechaNacimiento = $_REQUEST["fechaNacimiento"];
        $lugarNacimiento = $_REQUEST["lugarNacimiento"];
        $ciudadResidencia = $_REQUEST["ciudadResidencia"];
        $direccion = $_REQUEST["direccion"];
        $telefono = $_REQUEST["telefono"];
        $email = $_REQUEST["email"];
        $nivelAcademico = $_REQUEST["nivelAcademico"];
        $fecha_cambio = ""; // null
        $etnia = $_REQUEST["etnia"];
        $estado = 1; //por defecto 1
        //comparación de las contraseñas 
        $clave = $_REQUEST["password"];
        $claveR = $_REQUEST["passwordR"];
        //**
        if ($clave == $claveR) {

            $modelCitaM->validarCI($id_persona, $id_rol, $id_genero, $cedula, $apellidoPaterno, $apellidoMaterno, $primerNombre, $segundoNombre, $fechaNacimiento, $lugarNacimiento, $ciudadResidencia, $direccion, $telefono, $email, $nivelAcademico, $fecha_cambio, $etnia, $estado, md5($clave));
            $_SESSION['cedula'] = serialize($cedula);
            //   header('Location: ../view/cliente/registroCita/registroHistoriaClinica.php');
            $lista = $modelCitaM->consultarPaciente($cedula);
            $_SESSION['lista'] = serialize($lista);
        }
        break;



    case 'registroHistoriaClinica':


        //**/datos de Historia Clinica
        $cedula = $_REQUEST["cedula"];
        $id_historiaClinica = null; //null por defecto
        $id_tipoSangre = $_REQUEST["id_tipoSangre"];
        $tutorResponsable = $_REQUEST["tutorResponsable"];
        $telefonoResponsable = $_REQUEST["telefonoResponsable"];
        $enfermedadActual = $_REQUEST["enfermedadActual"];
        $antecedentesPersonales = null;
        $modelCitaM->insertClinicHistory($cedula, $id_historiaClinica, $id_tipoSangre, $tutorResponsable, $telefonoResponsable, $enfermedadActual, $antecedentesPersonales);


        header('Location: ../view/index.php');
        //    include '../view/index.php';        
//**/
        break;

    case 'generarCita':

        //**/datos de Historia Clinica
        $id_cita = null; //por defecto null
        $cedula = $_REQUEST["cedula"];
        // $dia=$_REQUEST['fecha'];
        $id_horario = $_REQUEST['id_horario']; //null por defecto
        $validacionCita = 0;
        $valor = 1.00; //precio a cobrar por agendar la cita
        $valorTotal = null;
        // print_r($cedula);        
        $modelCitaM->insertMedicalAppointment($cedula, $id_cita, $id_horario, $validacionCita, $valor, $valorTotal);
        $lista = $modelCitaM->consultarCitaMedica($cedula);
        //print_r($lista);
        $modelCitaM->actualizarEstadoHorario(0, $id_horario);
        $_SESSION['lista'] = serialize($lista);
        header('Location: ../view/cliente/AgedarCita/Ticket/index.php');
        break;



    case "listarHC":
        //obtenemos la lista de productos:
        $id_historiaClinica = $_REQUEST['id_historiaClinica'];
        $lista = $modelCitaM->consultarViewHistoriClinica($id_historiaClinica);
        //y los guardamos en sesion:
        $_SESSION['lista'] = serialize($lista);
        header('Location: ../view/medico/resporteHistoriClinica/reporteHC.php');

        break;
}


