<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of horario
 *
 * @author Grupo  1
 */
class horario {

    //put your code here
    private $id_horario;
    private $d_rol;
    private $id_persona;
    private $dia;
    private $hora;

    private $estado;

    function __construct($id_horario, $d_rol, $id_persona, $dia, $hora, $estado) {
        $this->id_horario = $id_horario;
        $this->d_rol = $d_rol;
        $this->id_persona = $id_persona;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->estado = $estado;
    }



    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getId_horario() {
        return $this->id_horario;
    }

    function getD_rol() {
        return $this->d_rol;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getDia() {
        return $this->dia;
    }

    function getHora() {
        return $this->hora;
    }

    function setId_horario($id_horario) {
        $this->id_horario = $id_horario;
    }

    function setD_rol($d_rol) {
        $this->d_rol = $d_rol;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

}
