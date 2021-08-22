<?php 
require_once("funciones.php");
/*
//save data
$sql = "INSERT INTO clientes1 (Nombre, Apellido, Correo, Telefono, Rfid, Habitacion, Estadia, Fecha, Hora) VALUES
(?, ?, ?, ?, ?, ?, ?, ?, ?)";
$data = array("sssssiiii",
"{$name}",
"{$lastName}",
"{$email}",
"{$phone}",
"{$rfid}",
"{$hab}",
"{$estadia}",
"{$fecha}",
"{$hora}");
*/
$id=0;
$sql = "SELECT * FROM clientes1";

//$sql .= ($id > 0) ? "= ?" : "> ?";
$data = array("i", "{$id}");

$fields = array("id"=>"",
	"Nombre"=>"",
	"Apellido"=>"",
	"Correo"=>"",
	"Telefono"=>"",
	"Rfid"=>"",
	"Habitacion"=>"",
	"Estadia"=>"",
	"Fecha"=>"",
	"Hora"=>"");
conectar();
select($sql);

//set_params($data);
//get_data($sql, $data, $fields);
//echo ($mesagge);
//echo($results);
 ?>