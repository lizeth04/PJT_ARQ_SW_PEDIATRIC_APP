<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alergia
 *
 * @author Susana
 */
class alergia {
    //put your code here
    private $id_alergia;
    private $tipo;
    private $descripcion;
    
    function __construct($id_alergia, $tipo, $descripcion) {
        $this->id_alergia = $id_alergia;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
    }

    function getId_alergia() {
        return $this->id_alergia;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_alergia($id_alergia) {
        $this->id_alergia = $id_alergia;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
}
