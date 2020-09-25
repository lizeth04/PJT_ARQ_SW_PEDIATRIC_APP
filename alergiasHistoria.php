<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alergiasHistoria
 *
 * @author Grupo 1
 */
class alergiasHistoria {
    //put your code here
    private $id_alergiaHis;
    private $id_alergia;
    private $id_historiaClinica;
    
    function __construct($id_alergiaHis, $id_alergia, $id_historiaClinica) {
        $this->id_alergiaHis = $id_alergiaHis;
        $this->id_alergia = $id_alergia;
        $this->id_historiaClinica = $id_historiaClinica;
    }

    function getId_alergiaHis() {
        return $this->id_alergiaHis;
    }

    function getId_alergia() {
        return $this->id_alergia;
    }

    function getId_historiaClinica() {
        return $this->id_historiaClinica;
    }

    function setId_alergiaHis($id_alergiaHis) {
        $this->id_alergiaHis = $id_alergiaHis;
    }

    function setId_alergia($id_alergia) {
        $this->id_alergia = $id_alergia;
    }

    function setId_historiaClinica($id_historiaClinica) {
        $this->id_historiaClinica = $id_historiaClinica;
    }


}
