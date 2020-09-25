<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of persona
 *
 * @author Susana
 */
class persona {

    //put your code here
    private $id_persona;
    private $id_rol;
    private $id_genero;
    private $cedula;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $primerNombre;
    private $segundoNombre;
    private $fechaNacimiento;
    private $lugarNacimiento;
    private $ciudadResidencia;
    private $direccion;
    private $telefono;
    private $email;
    private $nivelAcademico;
    private $fecha_cambio;
    private $etnia;
    private $estado;
    private $password;
    private $cambiarClave;
    private $edad;

    function __construct($id_persona, $id_rol, $id_genero, $cedula, $apellidoPaterno, $apellidoMaterno, $primerNombre, $segundoNombre, $fechaNacimiento, $lugarNacimiento, $ciudadResidencia, $direccion, $telefono, $email, $nivelAcademico, $fecha_cambio, $etnia, $estado, $password, $cambiarClave, $edad) {
        $this->id_persona = $id_persona;
        $this->id_rol = $id_rol;
        $this->id_genero = $id_genero;
        $this->cedula = $cedula;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->lugarNacimiento = $lugarNacimiento;
        $this->ciudadResidencia = $ciudadResidencia;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->nivelAcademico = $nivelAcademico;
        $this->fecha_cambio = $fecha_cambio;
        $this->etnia = $etnia;
        $this->estado = $estado;
        $this->password = $password;
        $this->cambiarClave = $cambiarClave;
        $this->edad = $edad;
    }

    function getEdad() {
        return $this->edad;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function getCambiarClave() {
        return $this->cambiarClave;
    }

    function setCambiarClave($cambiarClave) {
        $this->cambiarClave = $cambiarClave;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getId_rol() {
        return $this->id_rol;
    }

    function getId_genero() {
        return $this->id_genero;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }

    function getPrimerNombre() {
        return $this->primerNombre;
    }

    function getSegundoNombre() {
        return $this->segundoNombre;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getLugarNacimiento() {
        return $this->lugarNacimiento;
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

    function getEmail() {
        return $this->email;
    }

    function getNivelAcademico() {
        return $this->nivelAcademico;
    }

    function getFecha_cambio() {
        return $this->fecha_cambio;
    }

    function getEtnia() {
        return $this->etnia;
    }

    function getEstado() {
        return $this->estado;
    }

    function getPassword() {
        return $this->password;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setId_rol($id_rol) {
        $this->id_rol = $id_rol;
    }

    function setId_genero($id_genero) {
        $this->id_genero = $id_genero;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    function setApellidoMaterno($apellidoMaterno) {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    function setPrimerNombre($primerNombre) {
        $this->primerNombre = $primerNombre;
    }

    function setSegundoNombre($segundoNombre) {
        $this->segundoNombre = $segundoNombre;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setLugarNacimiento($lugarNacimiento) {
        $this->lugarNacimiento = $lugarNacimiento;
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

    function setEmail($email) {
        $this->email = $email;
    }

    function setNivelAcademico($nivelAcademico) {
        $this->nivelAcademico = $nivelAcademico;
    }

    function setFecha_cambio($fecha_cambio) {
        $this->fecha_cambio = $fecha_cambio;
    }

    function setEtnia($etnia) {
        $this->etnia = $etnia;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}
