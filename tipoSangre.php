<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoSangre
 *
 * @author Susana
 */
class tipoSangre {
    //put your code here
    private $id_tipoSangre;
    private $tipo_sangre;
    
    function __construct($id_tipoSangre, $tipo_sangre) {
        $this->id_tipoSangre = $id_tipoSangre;
        $this->tipo_sangre = $tipo_sangre;
    }
    function getId_tipoSangre() {
        return $this->id_tipoSangre;
    }

    function getTipo_sangre() {
        return $this->tipo_sangre;
    }

    function setId_tipoSangre($id_tipoSangre) {
        $this->id_tipoSangre = $id_tipoSangre;
    }

    function setTipo_sangre($tipo_sangre) {
        $this->tipo_sangre = $tipo_sangre;
    }


}
