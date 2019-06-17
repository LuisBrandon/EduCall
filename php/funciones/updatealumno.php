<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config.php';
include_once '../clases/alumno.php';
 
// get database connection
$baseDatos = new Database();
$db = $baseDatos->getConnection();
 
// prepare alumno object
$alumno = new Alumno($db);
 
// get id of alumno to be edited
$datosAlumno = json_decode(file_get_contents("php://input"));
 
// set ID property of alumno to be edited
$alumno->id = $datosAlumno->id;
 
// set alumno property values
$alumno->nombre = $datosAlumno->nombre;
$alumno->apellido1 = $datosAlumno->apellido1;
$alumno->apellido2 = $datosAlumno->apellido2;
$alumno->email = $datosAlumno->email;
$alumno->telefono = $datosAlumno->telefono;
$alumno->provincia = $datosAlumno->provincia;

 
// update the alumno
if($alumno->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("mensaje" => "Alumno actualizado."));
}
 
// if unable to update the alumno, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("mensaje" => "No se ha podido actualizar el alumno."));
}
?>