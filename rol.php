<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rol
 *
 * @author Susana
 */
class rol {
    //put your code here
    private $id_rol;
    private $nombre_rol;
    private $descripcion;
    
    function __construct($id_rol, $nombre_rol, $descripcion) {
        $this->id_rol = $id_rol;
        $this->nombre_rol = $nombre_rol;
        $this->descripcion = $descripcion;
    }
    function getId_rol() {
        return $this->id_rol;
    }

    function getNombre_rol() {
        return $this->nombre_rol;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_rol($id_rol) {
        $this->id_rol = $id_rol;
    }

    function setNombre_rol($nombre_rol) {
        $this->nombre_rol = $nombre_rol;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
}
