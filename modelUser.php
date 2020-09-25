<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include 'Database.php';
include 'SessionDTO.php';
include 'persona.php';

/**
 * Description of modelUser
 *
 * @author Grupo 1
 */
class modelUser {

    //put your code here
    public function consultarUsuario($cedula) {
        $pdo = Database::connect();
        $sql = "select *from persona where cedula=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC); // fetch significa traer
        if (empty($dato)) {
            //no se encontraron datos
            return null;
        }
        $usuario = new persona($dato['id_persona'], $dato['id_rol'], $dato['id_genero'], $dato['cedula'], $dato['apellidoPaterno'], $dato['apellidoMaterno'], $dato['primerNombre'], $dato['segundoNombre'], $dato['fechaNacimiento'], $dato['lugarNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['email'], $dato['nivelAcademico'], $dato['fecha_expira'], $dato['etnia'], $dato['estado'], $dato['clave'], $dato['cambiar_clave'], $dato['edad']);
        Database::disconnect();
        return $usuario;
    }

    public function getUsuario() {
        $pdo = Database::connect();
        $sql = "SELECT*FROM persona";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $usuario = new persona($dato['id_persona'], $dato['id_rol'], $dato['id_genero'], $dato['cedula'], $dato['apellidoPaterno'], $dato['apellidoMaterno'], $dato['primerNombre'], $dato['segundoNombre'], $dato['fechaNacimiento'], $dato['lugarNacimiento'], $dato['ciudadResidencia'], $dato['direccion'], $dato['telefono'], $dato['email'], $dato['nivelAcademico'], $dato['fecha_cambio'], $dato['etnia'], $dato['estado'], $dato['clave'], $dato['edad']);
            array_push($listado, $usuario);
        }
        Database::disconnect();
        return $listado;
    }

    //metodo para validar el usuario de la tabla Login de Base de datos
    public function login($id, $clave) {
        $sesionDTO = new SessionDTO($id, "", "");
        $usuario = $this->consultarUsuario($id);
        //se debe mejorar para que devuelva un DTO Data transfer object
        if (is_null($usuario)) {
            $sesionDTO->setRuta("../view/index.php");
            return $sesionDTO;
        }
        //verificar clave
        if ($usuario->getPassword() == md5($clave)) {

            if ($usuario->getEstado() == false) {
                $sesionDTO->setRuta("../view/index.php");
                return $sesionDTO;
            }
            //paciente
            if ($usuario->getId_rol() == "1") {
                $sesionDTO->setRuta("../view/cliente/AgedarCita/index.php");
                $sesionDTO->setTipo_usuario("Paciente");
                return $sesionDTO;
            }

            //pediatra
            if ($usuario->getId_rol() == "2") {
                $sesionDTO->setRuta("../view/medico/index.php");
                $sesionDTO->setTipo_usuario("Pediatra");
                return $sesionDTO;
            }

            //secretaria
            if ($usuario->getId_rol() == "3") {
                $sesionDTO->setRuta("../view/administracion/index.php");
                $sesionDTO->setTipo_usuario("Secretaria");
                return $sesionDTO;
            }
        } else {
            $sesionDTO->setRuta("../view/index.php");
            return $sesionDTO;
        }
    }

}
