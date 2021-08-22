<?php 

 $conn;
 $stmt;
 $reflection;
 $sql;
 $data;
 $method;
 $results=[];
#Conexion a la base de datos
function conectar() {
	global $conn;
	$conn = new mysqli('localhost', 'root', '', 'wifi access');
 	if($conn->connect_errno){

        echo "No se pudo conectar (" . $conn->connect_errno.  "): ". $conn->connect_error. "<br>";
        exit();
    }
	else {
    	// echo("Conjunto de caracteres inicial: ".$conexion->character_set_name()."<br>");
    	if (!$conn->set_charset("utf8")) {
        	echo("Error cargando el conjunto de caracteres utf8: ". $conn->error."<br>");
        	exit();
    	}
    	else {
    		echo("conexion exitosa <br>");

    	}
	}
}
function select($sql) {
	global $sql, $conn;
	$sql= $sql;

	if ($resultado = $conn->query($sql)) {
    	/* obtener un array asociativo */
    	/*while ($fila = $resultado->fetch_assoc()) {
    		echo(" {$fila["Nombre"]} {$fila["Apellido"]} <br>");
 
    	}*/
    	$datos =[];
        foreach ($resultado as $dato) {
            $datos[] = [
                
                'IdCliente' => $dato['IdCliente'],
                'Nombre' => $dato['Nombre'],
                'Apellido' => $dato['Apellido'],
                'Correo' => $dato['Correo'],
                'Telefono' => $dato['Telefono'],
                'Rfid' => $dato['Rfid'],
                'Habitacion' => $dato['Habitacion'],
                'Estadia' => $dato['Estadia'],
                'Fecha' => $dato['Fecha'],
                'Hora' => $dato['Hora']

                     ];
            
        }
        print_r ($datos);
	}
}
/*
#preparar la sentencia sql a ejecutar	
function preparar($sql) {
	global $stmt, $conn, $reflection, $sql;
	if(!$stmt =  $conn->prepare( $sql)){
		echo("Error al preparar: ". $conn->error)."<br>";	
	}
	else {
		echo("preparacion exitosa <br>");
	}
	
}
*/
#configuar los parametros la ejecucion
function set_params($data) {
	global $stmt, $data, $reflection, $method;

/* ejecuta sentencias prepradas */
 
	
	if(!$stmt->bind_param('ssssiiiii', $name, $lastName, $email, $phone, $rfid, $estadia, $fecha, $hora)) {
    	echo("Error al configurar parametros <br>");
	}
	else {
		
		$name = 'DEU';
		$lastName = 'Bavarian';
		$email = "F";
		$phone = "";
		$rfid ="";
		$estadia=0;
		$fecha=0;
		$hora=0;
		echo("configuracion de parametros exitosa <br>");
		
	}
	
	if($stmt->execute()) {
		echo "ejecutado con exito";
		echo("Filas insertadas: ".$stmt->affected_rows);
	}
	else {
		echo("Error al ejecutar: " .$stmt->error. "<br>");
	}  
}

function get_data($sql, $data, $fields) {

	/*global $stmt, $conn, $reflection, $sql, $results, $method, $data;*/
	  /* vincular variables a la sentencia preparada */
	/*//
	$temp = array();

        foreach($fields as $key => $value) {
        	$temp[$key] = &$fields[$key];
        }
        *///
        global $results;
	if( $sentencia->bind_result($col1, $col2)) {
		while($stmt->fetch()) {
			//echo($results[] = unserialize(serialize($temp)));
			echo ($col1.": " .$col2. "<br>");
	}
	}
	else {
	echo("no results");
	}
	
	$stmt->close();
	$conn->close();
	//

	return $results;
}

function finalizar() {
	global $stmt, $conn;
	$stmt->close();
	$conn->close();
}
?>
