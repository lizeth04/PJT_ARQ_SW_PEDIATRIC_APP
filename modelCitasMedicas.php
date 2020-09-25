<?php

/**
 * Description of modelCitasMedicas
 *
 * @author Grupo1 
 */
include 'ConexionBDD.php';
include 'Database.php';
include 'persona.php';
include 'rol.php';
include 'genero.php';
include 'alergia.php';
include 'tipoSangre.php';
include 'historiaClinica.php';
include 'alergiasHistoria.php';
include 'citaMedica.php';
include 'horario.php';
include 'ticketPaciente.php';

class modelCitasMedicas {

//put your code here

    public function getGenero() {
        $pdo = Database::connect();
        $sql = "SELECT*FROM genero";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $genero = new genero($res['id_genero'], $res['tipo']);
            array_push($listado, $genero);
        }
        Database::disconnect();
        return $listado;
    }

    public function getTipoSangre() {
        $pdo = Database::connect();
        $sql = "SELECT*FROM tipo_sangre";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $tipoSangre = new tipoSangre($res['id_tipoSangre'], $res['tipo_sangre']);
            array_push($listado, $tipoSangre);
        }
        Database::disconnect();
        return $listado;
    }

    public function getListaHorario() {
        $pdo = Database::connect();
        $sql = "SELECT* from horario ";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $horario = new horario($dato['id_horario'], $dato['id_rol'], $dato['id_persona'], $dato['FechaHora_In'], $dato['FechaHora_Fn'], $dato['horaFin'], $dato['estado']);
            array_push($listado, $horario);
        }
        Database::disconnect();
        return $listado;
    }

    public function getTicketMedico() {
        $pdo = Database::connect();
        $sql = "SELECT* from ticketpaciente ORDER BY dia desc";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $citaPaciente = new ticketPaciente($dato['id_cita'], $dato['primerNombre'], $dato['apellidoPaterno'], $dato['cedula'], $dato['tipo'], $dato['fechaNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['nivelAcademico'], $dato['etnia'], $dato['tutorResponsable'], $dato['telefonoResponsable'], $dato['dia'], $dato['hora'], $dato['valor'], $dato['valorTotal'], $dato['validacionCita']);

//  $horario = new horario($dato['id_horario'], $dato['id_rol'], $dato['id_persona'], $dato['dia'], $dato['hora'], $dato['estado']);
            array_push($listado, $citaPaciente);
        }
        Database::disconnect();
        return $listado;
    }

    public function validarTicketMedico($estado, $id_cita) {

        $pdo = Database::connect();
        $sql = "update ticketpaciente set validacionCita=? where id_cita=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($estado, $id_cita));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function consultarTicket($id_cita) {
        $pdo = Database::connect();
        $sql = "select * from ticketpaciente where id_cita=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_cita));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $ticketpaciente = new ticketPaciente($dato['id_cita'], $dato['primerNombre'], $dato['apellidoPaterno'], $dato['cedula'], $dato['tipo'], $dato['fechaNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['nivelAcademico'], $dato['etnia'], $dato['tutorResponsable'], $dato['telefonoResponsable'], $dato['dia'], $dato['hora'], $dato['valor'], $dato['valorTotal'], $dato['validacionCita']);
        Database::disconnect();
        return $ticketpaciente;
    }

    public function getPediatra($id_rol) {
        $pdo = Database::connect();
        $sql = "SELECT*FROM persona where id_rol='" . $id_rol . "';";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $pediatra = new persona($dato['id_persona'], $dato['id_rol'], $dato['id_genero'], $dato['cedula'], $dato['apellidoPaterno'], $dato['apellidoMaterno'], $dato['primerNombre'], $dato['segundoNombre'], $dato['fechaNacimiento'], $dato['lugarNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['email'], $dato['nivelAcademico'], $dato['fecha_expirar'], $dato['etnia'], $dato['estado'], $dato['clave'], $dato['cambiar_clave'], $dato['edad']);
            array_push($listado, $pediatra);
        }
        Database::disconnect();
        return $listado;
    }

    public function getHorario($id_persona) {
        $pdo = Database::connect();
        $compFecha = $this->getListaHorario();
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y/m/d');
        $nuevafecha = strtotime('+1 day', strtotime($fecha));
        $nuevafecha = date('Y/m/d', $nuevafecha);
//  print_r($nuevafecha);
        $sql = "select * from horarioselect where id_persona='" . $id_persona . "' and dia='" . $nuevafecha . "' and estado='1' ORDER BY hora;";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $horario = new horario($dato['id_horario'], $dato['id_rol'], $dato['id_persona'], $dato['dia'], $dato['hora'], $dato['estado']);
            array_push($listado, $horario);
        }
        Database::disconnect();
        return $listado;
    }

////cambiar de estado al horario de activo a ocupado
///actualizar el estado de horarios 
    public function actualizarEstadoHorario($estado, $idhorario) {

        $pdo = Database::connect();
        $sql = "update horario set estado=? where id_horario=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($estado, $idhorario));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////
//metodo para ingresar a pacientes nuevos: () //(
    public function insertPatient($id_persona, $id_rol, $id_genero, $cedula, $apellidoPaterno, $apellidoMaterno, $primerNombre, $segundoNombre, $fechaNacimiento, $lugarNacimiento, $ciudadResidencia, $direccion, $telefono, $email, $nivelAcademico, $fecha_cambio, $etnia, $estado, $password) {

        ///ingresar la edad
        $fecha_nacimiento = new DateTime($fechaNacimiento);
        date_default_timezone_set("America/Guayaquil");
        $hoy = new DateTime();
        $edad = $hoy->diff($fecha_nacimiento);

        $paciente = new persona($id_persona, $id_rol, $id_genero, $cedula, $apellidoPaterno, $apellidoMaterno, $primerNombre, $segundoNombre, $fechaNacimiento, $lugarNacimiento, $ciudadResidencia, $direccion, $telefono, $email, $nivelAcademico, $fecha_cambio, $etnia, $estado, $password, 0, $edad->y);

        $pdo = Database::connect();
        $sql = "INSERT INTO persona (id_persona, id_rol, id_genero, cedula, apellidoPaterno,apellidoMaterno,primerNombre,segundoNombre,"
                . "fechaNacimiento,lugarNacimiento,ciudadResidencia,direccion,telefono,email,nivelAcademico,fecha_expirar,etnia,estado,clave,cambiar_clave,edad)  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_persona, $id_rol, $id_genero, $cedula, $apellidoPaterno, $apellidoMaterno, $primerNombre, $segundoNombre, $fechaNacimiento, $lugarNacimiento, $ciudadResidencia, $direccion, $telefono, $email, $nivelAcademico, $fecha_cambio, $etnia, $estado, $password, 0, $edad->y));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

////metodo para la validacion de cedula dentro de paciente:
/// validar la cedula en ecuador
    public function validarCI($id_persona, $id_rol, $id_genero, $strCedula, $apellidoPaterno, $apellidoMaterno, $primerNombre, $segundoNombre, $fechaNacimiento, $lugarNacimiento, $ciudadResidencia, $direccion, $telefono, $email, $nivelAcademico, $fecha_cambio, $etnia, $estado, $password) {
        //echo $edad->y;
        if (is_null($strCedula) || empty($strCedula)) {//compruebo si que el numero enviado es vacio o null
//echo "Por Favor Ingrese la Cedula";
        } else {//caso contrario sigo el proceso
            if (is_numeric($strCedula)) {
                $total_caracteres = strlen($strCedula); // se suma el total de caracteres
                if ($total_caracteres == 10) {//compruebo que tenga 10 digitos la cedula
                    $nro_region = substr($strCedula, 0, 2); //extraigo los dos primeros caracteres de izq a der
                    if ($nro_region >= 1 && $nro_region <= 24) {// compruebo a que region pertenece esta cedula//
                        $ult_digito = substr($strCedula, -1, 1); //extraigo el ultimo digito de la cedula
                        $valor2 = substr($strCedula, 1, 1);
                        $valor4 = substr($strCedula, 3, 1);
                        $valor6 = substr($strCedula, 5, 1);
                        $valor8 = substr($strCedula, 7, 1);
                        $suma_pares = ($valor2 + $valor4 + $valor6 + $valor8);
                        $valor1 = substr($strCedula, 0, 1);
                        $valor1 = ($valor1 * 2);
                        if ($valor1 > 9) {
                            $valor1 = ($valor1 - 9);
                        } else {
                            
                        }
                        $valor3 = substr($strCedula, 2, 1);
                        $valor3 = ($valor3 * 2);
                        if ($valor3 > 9) {
                            $valor3 = ($valor3 - 9);
                        } else {
                            
                        }
                        $valor5 = substr($strCedula, 4, 1);
                        $valor5 = ($valor5 * 2);
                        if ($valor5 > 9) {
                            $valor5 = ($valor5 - 9);
                        } else {
                            
                        }
                        $valor7 = substr($strCedula, 6, 1);
                        $valor7 = ($valor7 * 2);
                        if ($valor7 > 9) {
                            $valor7 = ($valor7 - 9);
                        } else {
                            
                        }
                        $valor9 = substr($strCedula, 8, 1);
                        $valor9 = ($valor9 * 2);
                        if ($valor9 > 9) {
                            $valor9 = ($valor9 - 9);
                        } else {
                            
                        }
                        $suma_impares = ($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
                        $suma = ($suma_pares + $suma_impares);
                        $dis = substr($suma, 0, 1); //extraigo el primer numero de la suma
                        $dis = (($dis + 1) * 10); //luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
                        $digito = ($dis - $suma);
                        if ($digito == 10) {
                            $digito = '0';
                        } else {
                            
                        }
                        if ($digito == $ult_digito) {//comparo los digitos final y ultimo
                            $this->insertPatient($id_persona, $id_rol, $id_genero, $strCedula, $apellidoPaterno, $apellidoMaterno, $primerNombre, $segundoNombre, $fechaNacimiento, $lugarNacimiento, $ciudadResidencia, $direccion, $telefono, $email, $nivelAcademico, $fecha_cambio, $etnia, $estado, $password);
                            header('Location: ../view/cliente/registroCita/registroHistoriaClinica.php');
                        } else {
//  echo "Invalida";

                            header('Location: ../view/cliente/errorPag.php');
                        }
                    } else {
// echo "Este Nro de Cedula no corresponde a ninguna provincia del ecuador";
                        header('Location: ../view/cliente/errorPag.php');
                    }
                } else {
// echo "Es un Numero y tiene solo " . $total_caracteres;
                    header('Location: ../view/cliente/errorPag.php');
                }
            } else {
//    echo "Esta Cedula no corresponde a un Nro de Cedula de Ecuador";
                header('Location: ../view/cliente/errorPag.php');
            }
        }
    }

///consultar una paciente con el numero de cedula
    public function consultarPaciente($cedula) {
        $pdo = Database::connect();
        $sql = "select * from persona where cedula=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $paciente = new persona($dato['id_persona'], $dato['id_rol'], $dato['id_genero'], $dato['cedula'], $dato['apellidoPaterno'], $dato['apellidoMaterno'], $dato['primerNombre'], $dato['segundoNombre'], $dato['fechaNacimiento'], $dato['lugarNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['email'], $dato['nivelAcademico'], $dato['fecha_expirar'], $dato['etnia'], $dato['estado'], $dato['clave'], $dato['cambiar_clave'], $dato['edad']);
        Database::disconnect();
        return $paciente;
    }

    public function insertClinicHistory($cedula, $id_historiaClinica, $id_tipoSangre, $tutorResponsable, $telefonoResponsable, $enfermedadActual, $antecedentesPersonales) {
        $id_persona1 = $this->consultarPaciente($cedula);
        $historiaClinica = new historiaClinica($id_historiaClinica, $id_tipoSangre, $id_persona1->getId_persona(), $tutorResponsable, $telefonoResponsable, $enfermedadActual, $antecedentesPersonales);
        $pdo = Database::connect();
        $sql = "INSERT INTO historia_clinica (id_historiaClinica, id_tipoSangre,id_persona ,tutorResponsable, telefonoResponsable,enfermedadActual, antecedentesPersonales)  VALUES (?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {

            $consulta->execute(array($id_historiaClinica, $id_tipoSangre, $id_persona1->getId_persona(), $tutorResponsable, $telefonoResponsable, $enfermedadActual, $antecedentesPersonales));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function insertMedicalAppointment($cedula, $id_cita, $id_horario, $validacionCita, $valor, $valorTotal) {
        $id_persona1 = $this->consultarPaciente($cedula);
        $citaMedica = new citaMedica($id_cita, $id_persona1->getId_persona(), $id_horario, $validacionCita, $valor, $valorTotal);
//  print_r($id_persona1->getId_persona()); 
        $pdo = Database::connect();
        $sql = "INSERT INTO cita_medica (id_cita,id_persona ,id_horario, validacionCita,valor, valorTotal)  VALUES (?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_cita, $id_persona1->getId_persona(), $id_horario, $validacionCita, $valor, $valorTotal));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function consultarCitaMedica($cedula) {
        $pdo = Database::connect();
        $sql = "select * from ticketpaciente where cedula=? order by id_cita desc limit 1";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $citaPaciente = new ticketPaciente($dato['id_cita'], $dato['primerNombre'], $dato['apellidoPaterno'], $dato['cedula'], $dato['tipo'], $dato['fechaNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['nivelAcademico'], $dato['etnia'], $dato['tutorResponsable'], $dato['telefonoResponsable'], $dato['dia'], $dato['hora'], $dato['valor'], $dato['valorTotal'], $dato['validacionCita']);
// $paciente = new persona($dato['id_persona'], $dato['id_rol'], $dato['id_genero'], $dato['cedula'], $dato['apellidoPaterno'], $dato['apellidoMaterno'], $dato['primerNombre'], $dato['segundoNombre'], $dato['fechaNacimiento'], $dato['lugarNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['email'], $dato['nivelAcademico'], $dato['fecha_cambio'], $dato['etnia'], $dato['estado'], $dato['clave']);
        Database::disconnect();
        return $citaPaciente;
    }

    public function consultarHorario($dia, $hora) {
        $pdo = Database::connect();
        $sql = "select * from horarioselect where dia=? and hora=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($dia, $hora));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $horario = new horario($dato['id_horario'], $dato['id_rol'], $dato['id_persona'], $dato['dia'], $dato['hora'], $dato['estado']);
        Database::disconnect();
        return $horario;
    }

    public function getUnHorario($id_horario) {
        $pdo = Database::connect();
        $sql = "select * from horarioselect where id_horario=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_horario));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $horario = new horario($dato['id_horario'], $dato['id_rol'], $dato['id_persona'], $dato['dia'], $dato['hora'], $dato['estado']);
        Database::disconnect();
        return $horario;
    }

///logica de control (No ingrese la misma hora )
    public function insertSchedule($id_horario, $d_rol, $id_persona, $dia, $hora, $estado) {
        $h = $this->consultarHorario($dia, $hora); //obtiene el dia y la hora de la tabla horario
        $pdo = Database::connect();
        $external = $dia . " " . $hora;
        $format = "Y/m/d H:i";
        $dateobj = DateTime::createFromFormat($format, $external);
        $iso_datetime = $dateobj->format(Datetime::ATOM);
//  echo $iso_datetime;
        $dt = new DateTime($iso_datetime);
        $dt->add(new DateInterval('PT1H00M'));
        $NuevaHora = $dt->format('Y-m-d H:i'); //17:00:00
        $horario = new horario($id_horario, $d_rol, $id_persona, $iso_datetime, $NuevaHora, $estado);
        if ($h->getDia() == null && $h->getHora() == null) {
            $sql = "INSERT INTO horario (id_horario, id_rol, id_persona, FechaHora_In, FechaHora_Fn, estado) VALUES (?, ?, ?, ?, ?, ?)";
            $consulta = $pdo->prepare($sql);
            try {
                $consulta->execute(array($id_horario, $d_rol, $id_persona, $iso_datetime, $NuevaHora, $estado));
            } catch (PDOException $e) {
                Database::disconnect();
                throw new Exception($e->getMessage());
            }
            echo "dato Ingresado correctamente";
        } else {

            header('Location: ../view/administracion/errorPag.php');
            //   include '../view/administracion/errorPag.php';
        }
        Database::disconnect();
    }

//
    public function actuaPatient($id_persona, $id_rol, $id_genero, $cedula, $apellidoPaterno, $apellidoMaterno, $primerNombre, $segundoNombre, $fechaNacimiento, $lugarNacimiento, $ciudadResidencia, $direccion, $telefono, $email, $nivelAcademico, $etnia, $password) {
        $pdo = Database::connect();
        $sql = "update persona set id_rol = ?, id_genero = ?, cedula = ?, apellidoPaterno = ?, apellidoMaterno = ?"
                . ", primerNombre = ?, segundoNombre = ?, fechaNacimiento = ?, lugarNacimiento = ?, ciudadResidencia = ?, direccion = ? "
                . ", telefono = ?, email = ?, nivelAcademico = ?, etnia = ?, password = ? where id_persona = ?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id_tipo_area, $id_rol, $id_tipo_sangre,
                $id_area_espec, $cedula, $usuario, $nombres,
                $apellidos, $fecha_nacimiento, $telefono, $email,
                $genero, $ciudad, $direccion, $clave, $estado, $id_persona));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function consultarViewHistoriClinica($id_historiaClinica) {
        $pdo = Database::connect();
        $sql = "select * from historia_clinica where id_historiaClinica = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_historiaClinica));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $historiaClinica = new historiaClinica($dato['id_historiaClinica'], $dato['id_tipoSangre'], $dato['id_persona'], $dato['tutorResponsable'], $dato['telefonoResponsable'], $dato['enfermedadActual'], $dato['antecedentesPersonales']);
// $paciente = new persona($dato['id_persona'], $dato['id_rol'], $dato['id_genero'], $dato['cedula'], $dato['apellidoPaterno'], $dato['apellidoMaterno'], $dato['primerNombre'], $dato['segundoNombre'], $dato['fechaNacimiento'], $dato['lugarNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['email'], $dato['nivelAcademico'], $dato['fecha_cambio'], $dato['etnia'], $dato['estado'], $dato['clave']);
        Database::disconnect();
        return $historiaClinica;
    }

    public function consultarUnPaciente($cedula) {
        $pdo = Database::connect();
        $sql = "select * from persona where cedula" . $cedula . "";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $paciente = new persona($dato['id_persona'], $dato['id_rol'], $dato['id_genero'], $dato['cedula'], $dato['apellidoPaterno'], $dato['apellidoMaterno'], $dato['primerNombre'], $dato['segundoNombre'], $dato['fechaNacimiento'], $dato['lugarNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['email'], $dato['nivelAcademico'], $dato['fecha_expirar'], $dato['etnia'], $dato['estado'], $dato['clave'], $dato['cambiar_clave'], $dato['edad']);
        Database::disconnect();
        return $paciente;
    }
   public function actualizarHistoriCLinica($antecedentesPersonales, $idhistoria) {

        $pdo = Database::connect();
        $sql = "update historia_clinica set antecedentesPersonales=? where id_historiaClinica=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($antecedentesPersonales, $idhistoria));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
}
