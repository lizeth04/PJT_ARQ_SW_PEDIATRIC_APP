<?php
header('Content-Type: application/json');
$pdo= new PDO("mysql:dbname=citasmedicas;host=172.0.0.1","root","");
$sentenciaSQL=$pdo->prepare("SELECT p.id_persona, cedula, primerNombre, dia, hora, horafin, h.estado, 
        DATE_FORMAT(h.hora, '%H:%i') AS HORAINI, 
        DATE_FORMAT(h.horaFin, '%H:%i') AS HORAFIN 
        FROM persona p,horario h, cita_medica c
        WHERE p.id_persona=c.id_persona and h.id_horario=c.id_horario ;");
$sentenciaSQL->execute();
$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>