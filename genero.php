<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of genero
 *
 * @author Susana
 */
class genero {
    //put your code here
    
    private $id_genero;
    private $tipo;
    
    function __construct($id_genero, $tipo) {
        $this->id_genero = $id_genero;
        $this->tipo = $tipo;
    }
    
    function getId_genero() {
        return $this->id_genero;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId_genero($id_genero) {
        $this->id_genero = $id_genero;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }



}
