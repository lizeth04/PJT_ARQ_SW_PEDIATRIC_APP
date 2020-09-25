<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of citaMedica
 *
 * @author Susana
 */
class citaMedica {
    //put your code here
    private $id_cita;
    private $id_persona;
    private $id_horario;
    private $validacionCita;
    private $valor;
    private $valorTotal;
    
    function __construct($id_cita, $id_persona, $id_horario, $validacionCita, $valor, $valorTotal) {
        $this->id_cita = $id_cita;
        $this->id_persona = $id_persona;
        $this->id_horario = $id_horario;
        $this->validacionCita = $validacionCita;
        $this->valor = $valor;
        $this->valorTotal = $valorTotal;
    }

    
    
    function getId_cita() {
        return $this->id_cita;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getId_horario() {
        return $this->id_horario;
    }

    function getValidacionCita() {
        return $this->validacionCita;
    }

    function getValor() {
        return $this->valor;
    }

    function setId_cita($id_cita) {
        $this->id_cita = $id_cita;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setId_horario($id_horario) {
        $this->id_horario = $id_horario;
    }

    function setValidacionCita($validacionCita) {
        $this->validacionCita = $validacionCita;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function getValorTotal() {
        return $this->valorTotal;
    }

    function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }


    
}
