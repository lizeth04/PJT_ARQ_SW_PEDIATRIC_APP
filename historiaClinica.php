<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historiaClinica
 *
 * @author Grupo1
 */
class historiaClinica {
    //put your code here
    private $id_historiaClinica;
    private $id_tipoSangre;
    private $id_persona; 
    private $tutorResponsable;
    private $telefonoResponsable;
    private $enfermedadActual;
    private $antecedentesPersonales;
    
    function __construct($id_historiaClinica, $id_tipoSangre, $id_persona, $tutorResponsable, $telefonoResponsable, $enfermedadActual, $antecedentesPersonales) {
        $this->id_historiaClinica = $id_historiaClinica;
        $this->id_tipoSangre = $id_tipoSangre;
        $this->id_persona = $id_persona;
        $this->tutorResponsable = $tutorResponsable;
        $this->telefonoResponsable = $telefonoResponsable;
        $this->enfermedadActual = $enfermedadActual;
        $this->antecedentesPersonales = $antecedentesPersonales;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

        
        function getId_historiaClinica() {
        return $this->id_historiaClinica;
    }

    function getId_tipoSangre() {
        return $this->id_tipoSangre;
    }

    function getTutorResponsable() {
        return $this->tutorResponsable;
    }

    function getTelefonoResponsable() {
        return $this->telefonoResponsable;
    }

    function getEnfermedadActual() {
        return $this->enfermedadActual;
    }

    function getAntecedentesPersonales() {
        return $this->antecedentesPersonales;
    }

    function setId_historiaClinica($id_historiaClinica) {
        $this->id_historiaClinica = $id_historiaClinica;
    }

    function setId_tipoSangre($id_tipoSangre) {
        $this->id_tipoSangre = $id_tipoSangre;
    }

    function setTutorResponsable($tutorResponsable) {
        $this->tutorResponsable = $tutorResponsable;
    }

    function setTelefonoResponsable($telefonoResponsable) {
        $this->telefonoResponsable = $telefonoResponsable;
    }

    function setEnfermedadActual($enfermedadActual) {
        $this->enfermedadActual = $enfermedadActual;
    }

    function setAntecedentesPersonales($antecedentesPersonales) {
        $this->antecedentesPersonales = $antecedentesPersonales;
    }


}
