<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "ConexionBDD.php";

// Funcion para verificar si el usuario existe en la BD
function EsUsuario($usuario) {
    include "ConexionBDD.php";
    $q = "SELECT count(*) AS numUs FROM persona WHERE usuario='$usuario'";
    $consulta = mysqli_query($con, $q);
    $array = mysqli_fetch_array($consulta);
    if ($array['numUs'] > 0) {
        return true;
    } else {
        return false;
    }
}

// Función para verificar si la contraseña existe en la BD
function EsClave($clave) {
    include "ConexionBDD.php";
    $q = "SELECT count(*) AS numCon FROM ingreso WHERE CONTRASENA='$clave'";
    $consulta = mysqli_query($con, $q);
    $array = mysqli_fetch_array($consulta);
    if ($array['numCon'] > 0) {
        return true;
    } else {
        return false;
    }
}

// Función para mostrar errores
function BlockErrores($errores) {
    if (count($errores) > 0) {
        echo "<div class='contenedor-errores'><ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }
}

// Función para verificar si el Email existe
function ExiteEmail($email) {
    include "ConexionBDD.php";
    $q = "SELECT count(*) AS numEmail FROM persona WHERE email='$email'";
    $consulta = mysqli_query($con, $q);
    $array = mysqli_fetch_array($consulta);
    if ($array['numEmail'] > 0) {
        return true;
    } else {
        return false;
    }
}

// Función para enviar el email de recuperacion de clave
function EmailRecuperarClave($email) {
    include "ConexionBDD.php";

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

// Instancia y pasar `true` prmite excepciones
    $mail = new PHPMailer(true);

    try {
//Configuración de servidor

        $mail->SMTPDebug = 0;                                       // Habilitar salida de depuración detallada (0 no mostrar, 1  y 2 mostrar)
        $mail->isSMTP();                                            // Enviar usando SMTP
        $mail->Host = 'smtp.gmail.com';                       // Configurar el servidor SMTP para enviar a travez de él
        $mail->SMTPAuth = true;                                   // Abilitar autentificación de SMTP
        $mail->Username = 'belen2409cacuango@gmail.com';        // Usuario SMTP
        $mail->Password = '0123pediatra';                         // Contraseña SMTP
        $mail->SMTPSecure = 'tls';                                  // Abilitar el cifrado TLS
        $mail->Port = 587;                                    // Puerto de conexión de TCP
//Para solucionar problema con la última versión de PHP
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

//Extraer datos del usuario de la Base de Datos
        $q = "SELECT primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,email FROM persona WHERE email='$email'";
        $consulta = mysqli_query($con, $q);
        $array = mysqli_fetch_array($consulta);
        $nombres = $array['primerNombre'];
        $apellidos = $array['segundoNombre'];
        $segundoNombre = $array['apellidoPaterno'];
        $apellidoMaterno = $array['apellidoMaterno'];

//Destinatarios
        $mail->setFrom('belen2409cacuango@gmail.com', 'Consultorio pediátrico niños felices');    // Añadir emisor
        $mail->addAddress($email, $nombres . ' ' . $segundoNombre . ' ' . $apellidos . ' ' . $apellidoMaterno);                                 // Añadir receptor
// Contenido del email
        $mail->isHTML(true);                                  // Establecer el formato del email con HTML
        $mail->Subject = 'Recuperar Clave de Ingreso';              // Establecer el asunto del email
        $mail->Body = "
            <html lang='es'>
                <head>
                    <style>
                        * {
                            padding: 0;
                            margin: 0;
                            box-sizing:border-box;
                            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                        }

                        body {
                            background: rgb(236, 236, 236);
                            display: flex;
                            min-height: 100vh;
                        }
                        .contenedor-cuerpo{
                            background: white;
                            width: 90%;
                            margin: 10px auto;
                            padding: 50px;
                            border-radius: 3px;
                            border-top: 7px solid rgb(119, 119, 119);
                            border-bottom: 7px solid rgb(202, 0, 0);
                        }
                        .contenedor-cuerpo h2 {
                            margin-bottom: 20px;
                            text-align: center;
                        }
                        .contenedor-cuerpo p {
                            margin: 0px auto 0px;
                            text-align: justify;
                        }
                        .div-boton {
                            margin: 20px auto 20px;
                        }
                        .boton{
                            padding: 10px 20px 10px;
                            background: rgb(187, 0, 0);
                            color: white;
                            text-decoration: none;
                            border-radius: 3px;
                            border: 0px;
                            font-size: 100%;
                            -webkit-transition: all 0.5s;
                            -o-transition: all 0.5s;
                            transition: 0.5s all;
                        }
                        .boton:hover {
                            background: rgb(119, 119, 119);
                            box-shadow: 0px 0px 5px 0px rgb(71, 71, 71);
                        }
                        @media (max-width: 768px){
                            .contenedor-cuerpo{
                                width: 80%;
                            }
                        }
                        @media (max-width: 500px){
                            .contenedor-cuerpo{
                                width: 95%;
                            }
                        }
                    </style>
                    
                </head>
                <body>
                    <div class='contenedor-cuerpo'>
                        <h2>RECUPERAR CONTRASEÑA</h2>
                        <p>
                        Hola $nombres $segundoNombre $apellidos $apellidoMaterno desde el Departamento Informatico te enviamos este 
                        correo electronico en vista de que has olvidado tu contraseña de acceso al sistema. 
                        Para cambiar tu contraseña tienes un periodo de tiempo de 24 horas, debes hacer 
                        click en el siguiente boton o si prefieres en el siguiente enlace: 
                        </p>
                        
                        
                        <a href='http://localhost/App_CitasMedicas/view/CambiarClave.php?email=$email'>
                            http:http://localhost/App_CitasMedicas/view/CambiarClave.php?email=$email
                        </a>
                        <!--<form action='http://localhost/Home/CambiarClave.php' method='get'>
                            <center>
                                <input type='hidden' name='email' value='$email'>
                                <input class='boton' type='submit' value='CAMBIAR CONTRASEÑA' >
                            </center>
                        </form>-->
                        <div class='div-boton'>
                            <center>
                                <a class='boton' href='http://localhost/App_CitasMedicas/view/CambiarClave.php?email=$email'>
                                    CAMBIAR CONTRASEÑA
                                </a>
                            </center>
                        </div>
                        <p>Gracias por utilizar el sistema de Departamento Informatico.</p>
                    </div>
                </body>
            </html>";      // Establecer cuerpo del email

        $mail->send();                                                      // Enviar email
        echo "<div class='contenedor-mensaje'>
        <h3>El correo electrónico ha sido enviado correctamente!<h3>
        <h4>Revisa tu email para cambiar tu contraseña.</h4>
        </div>";

// Obtener la fecha actual 2010-01-12 10:50:43
        date_default_timezone_set("America/Guayaquil");
        $d = date('d') + 1;
        if (strlen($d) == 1) {
            $d = "0$d";
        }
        $fecha = date('m-Y H:i:s');
        $fechaActual = "$d-$fecha";
// Actualizar en la BD el campo de CAMBIAR_CLAVE a 1 y el campo FECHA_EXPIRAR de la tabla ingeso
// para que el usuario pueda cambiar la contraseña en un maximo de 24 horas
        $q2 = "UPDATE persona  SET CAMBIAR_CLAVE=1, 
        FECHA_EXPIRAR=STR_TO_DATE('$fechaActual', '%d-%m-%Y %H:%i:%s') 
        WHERE EMAIL='$email'";
        mysqli_query($con, $q2);
    } catch (Exception $e) {
        echo "<div class='contenedor-mensaje-error'>
        <h3>Hubo un error al enviar el correo electrónico!:</h3>
        <h4>{$mail->ErrorInfo}</h4>
        </div>";     // Establecer excepción
    }
}

// Función para cambiar la clabe del usuario de la BD
function cambiarClave($email, $clave) {
    include "ConexionBDD.php";
    $errores = array();
    $q = "SELECT id_persona,cambiar_clave,fecha_expirar from persona where EMAIL='$email'";
    $consulta = mysqli_query($con, $q);
    $array = mysqli_fetch_array($consulta);
    $idIngreso = $array['id_persona'];                      // obtener el valor id de la BDD
    $cambiarClave = $array['cambiar_clave'];                // obtener el valor cambiar_clave de la BDD
    $fechaExpirar = strtotime($array["fecha_expirar"]);     // obtener fecha de expiracion de la BDD
//Obtener la fecha actual
    date_default_timezone_set("America/Guayaquil");
    $fechaActual = strtotime(date('d-m-Y H:i:s', time()));
    $claveEncriptada = md5($clave);
// Validar cambio de contraseña
    if ($cambiarClave == 1) {
        if ($fechaActual < $fechaExpirar) {
// Cambiar la contraseña en la BDD
            $q = "UPDATE persona SET CLAVE='$claveEncriptada' WHERE id_persona=$idIngreso";
            $consulta = mysqli_query($con, $q);
// Cambiar el valor de CAMBIAR_CLAVE a 0 en la BDD
            $q = "UPDATE persona SET CAMBIAR_CLAVE=0 WHERE id_persona=$idIngreso";
            $consulta = mysqli_query($con, $q);
            header("location: ../view/index.php");
// include '';
        } else {
            $errores[] = "Error: El tiempo para cambiar de contraseña ha expirado!";
        }
    } else {
        $errores[] = "Error: Esta cuenta no ha solicitado cambio de contraseña!";
    }
    return $errores;
}

// Consulta de los turnos
function verTurnos() {
    include "ConexionBDD.php";
    $q = "SELECT  hc.id_historiaClinica as id, cedula, primerNombre,apellidoPaterno,fechaNacimiento, lugarNacimiento,ciudadResidencia, direccion, telefono,nivelAcademico, h.estado,FechaHora_In ,FechaHora_Fn, 
        DATE_FORMAT(FechaHora_In, '%H:%i') AS HORAINI,
        DATE_FORMAT(FechaHora_Fn, '%H:%i') AS HORAFIN, hc.antecedentesPersonales as anteceP,hc.tutorResponsable as trespo, hc.enfermedadActual as enfermedadAc, hc.telefonoResponsable as telResponsable
      FROM persona p,horario h, cita_medica c,historia_clinica hc
      WHERE p.id_persona=c.id_persona and h.id_horario=c.id_horario and p.id_persona=hc.id_persona and h.estado='0';";
    $consulta = mysqli_query($con, $q);
    While ($array = mysqli_fetch_array($consulta)) {
        echo "{
            title:'Cita de pediatria "."<br/>" . "Hora de la cita: " . $array['HORAINI'] . " - " . $array['HORAFIN'] . "',      
descripcion2:'" . " Datos de paciente: " . "  " . "<br/>_____________________________________<br/>" .
        "Nombre del paciente: " . $array['primerNombre'] . "  " . $array['apellidoPaterno'] . "<br/>" .
        "Cedula de paciente: " . $array['cedula'] . "<br/>" .
        "Fecha nacimiento: " . $array['fechaNacimiento'] . "<br/>" .
        "Lugar de nacimiento: " . $array['lugarNacimiento'] . " <br/>" .
        "Residencia: " . $array['ciudadResidencia'] . "<br/>" .
        "Dirección " . $array['direccion'] . " <br/>" .
        "Tef./cel. de paciente:" . $array['telefono'] . "<br/>" . "Nivel Academico " . $array['nivelAcademico'] .
        "<br/>_____________________________________<br/>Historia Clinica: <br/>" .
        "Tutor Responsable: " . $array['trespo'] . "<br/>" .
        "Telf./cel. Tutor Responsable: " . $array['telResponsable'] . "<br/> " .
        "Enfermedad Actual: " . $array['enfermedadAc'] . "<br/>" .
        "Observaciones: " . $array['anteceP'] . "<br/>',

id:'" . $array['id'] . "',
start:'" . $array['FechaHora_In'] . "',
end:'" . $array['FechaHora_Fn'] . "',";
        if ($array['anteceP'] == '') {
            echo "
            color:'#CD0000',
            textColor:'white'
            },";
        } else {
            echo "
            color:'#34C41E',
            textColor:'white'
            },";
        }
    }
}

// Guardar comentario en la tabla reservar_turno
function agregarComentario($id_turno, $comentario) {
    include "ConexionBDD.php";
    $q = "UPDATE reservar_turno SET COMENTARIO='$comentario' WHERE id_reservar_turno=$id_turno";
    $consulta = mysqli_query($con, $q);
//header("location: Doctor.php");
}

?>