<?php

class SessionDTO {
   private $id;
   private $tipo_usuario;
   private $ruta;
   
   function __construct($id, $tipo_usuario, $ruta) {
       $this->id = $id;
       $this->tipo_usuario = $tipo_usuario;
       $this->ruta = $ruta;
   }

   function getId() {
       return $this->id;
   }

   function getTipo_usuario() {
       return $this->tipo_usuario;
   }

   function getRuta() {
       return $this->ruta;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setTipo_usuario($tipo_usuario) {
       $this->tipo_usuario = $tipo_usuario;
   }

   function setRuta($ruta) {
       $this->ruta = $ruta;
   }


           
    
}
