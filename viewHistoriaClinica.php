<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of viewHistoriaClinica
 *
 * @author Grupo1
 */
class viewHistoriaClinica {

    private $id_historiaClinica;
    private $primerNombre;
    private $apellidoPaterno;
    private $tipo_sangre;
    private $tipo;
    private $descripcion;
    private $tutorResponsable;
    private $telefonoResponsable;
    private $enfermedadActual;
    private $antecedentesPersonales;

    function __construct($id_historiaClinica, $primerNombre, $apellidoPaterno, $tipo_sangre, $tipo, $descripcion, $tutorResponsable, $telefonoResponsable, $enfermedadActual, $antecedentesPersonales) {
        $this->id_historiaClinica = $id_historiaClinica;
        $this->primerNombre = $primerNombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->tipo_sangre = $tipo_sangre;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->tutorResponsable = $tutorResponsable;
        $this->telefonoResponsable = $telefonoResponsable;
        $this->enfermedadActual = $enfermedadActual;
        $this->antecedentesPersonales = $antecedentesPersonales;
    }

    function getId_historiaClinica() {
        return $this->id_historiaClinica;
    }

    function getPrimerNombre() {
        return $this->primerNombre;
    }

    function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    function getTipo_sangre() {
        return $this->tipo_sangre;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
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

    function setPrimerNombre($primerNombre) {
        $this->primerNombre = $primerNombre;
    }

    function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    function setTipo_sangre($tipo_sangre) {
        $this->tipo_sangre = $tipo_sangre;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
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
