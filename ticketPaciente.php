<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ticketPaciente
 *
 * @author Grupo 1
 */
class ticketPaciente {
    //put your code here
    private $id_cita;
    private $primerNombre;
    private $apellidoPaterno;
    private $cedula;
    private $tipo;
    private $fechaNacimiento;
    private $ciudadResidencia;
    private $direccion;
    private $telefono;
    private $nivelAcademico;
    private $etnia;
    private $tutorResponsable;
    private $telefonoResponsable;
    private $dia;
    private $hora;
    private $valor;
    private $valorTotal;
    private $validacionCita;
    
    function __construct($id_cita, $primerNombre, $apellidoPaterno, $cedula, $tipo, $fechaNacimiento, $ciudadResidencia, $direccion, $telefono, $nivelAcademico, $etnia, $tutorResponsable, $telefonoResponsable, $dia, $hora, $valor, $valorTotal, $validacionCita) {
        $this->id_cita = $id_cita;
        $this->primerNombre = $primerNombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->cedula = $cedula;
        $this->tipo = $tipo;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->ciudadResidencia = $ciudadResidencia;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->nivelAcademico = $nivelAcademico;
        $this->etnia = $etnia;
        $this->tutorResponsable = $tutorResponsable;
        $this->telefonoResponsable = $telefonoResponsable;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->valor = $valor;
        $this->valorTotal = $valorTotal;
        $this->validacionCita = $validacionCita;
    }

    function getId_cita() {
        return $this->id_cita;
    }

    function getPrimerNombre() {
        return $this->primerNombre;
    }

    function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getCiudadResidencia() {
        return $this->ciudadResidencia;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getNivelAcademico() {
        return $this->nivelAcademico;
    }

    function getEtnia() {
        return $this->etnia;
    }

    function getTutorResponsable() {
        return $this->tutorResponsable;
    }

    function getTelefonoResponsable() {
        return $this->telefonoResponsable;
    }

    function getDia() {
        return $this->dia;
    }

    function getHora() {
        return $this->hora;
    }

    function getValor() {
        return $this->valor;
    }

    function getValorTotal() {
        return $this->valorTotal;
    }

    function getValidacionCita() {
        return $this->validacionCita;
    }

    function setId_cita($id_cita) {
        $this->id_cita = $id_cita;
    }

    function setPrimerNombre($primerNombre) {
        $this->primerNombre = $primerNombre;
    }

    function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setCiudadResidencia($ciudadResidencia) {
        $this->ciudadResidencia = $ciudadResidencia;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setNivelAcademico($nivelAcademico) {
        $this->nivelAcademico = $nivelAcademico;
    }

    function setEtnia($etnia) {
        $this->etnia = $etnia;
    }

    function setTutorResponsable($tutorResponsable) {
        $this->tutorResponsable = $tutorResponsable;
    }

    function setTelefonoResponsable($telefonoResponsable) {
        $this->telefonoResponsable = $telefonoResponsable;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }

    function setValidacionCita($validacionCita) {
        $this->validacionCita = $validacionCita;
    }


    
    
    
}
