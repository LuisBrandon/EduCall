<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config.php';
include_once '../clases/profesor.php';
 
// get database connection
$baseDatos = new Database();
$db = $baseDatos->getConnection();
 
// prepare alumno object
$profesor = new Profesor($db);
 
// get id of alumno to be edited
$datosProfesor = json_decode(file_get_contents("php://input"));
 
// set ID property of alumno to be edited
$profesor->id = $datosProfesor->id;
 
// set alumno property values
$profesor->nombre = $datosProfesor->nombre;
$profesor->apellido1 = $datosProfesor->apellido1;
$profesor->apellido2 = $datosProfesor->apellido2;
$profesor->email = $datosProfesor->email;
$profesor->telefono = $datosProfesor->telefono;
$profesor->provincia = $datosProfesor->provincia;

 
// update the alumno
if($profesor->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("mensaje" => "Profesor actualizado."));
}
 
// if unable to update the alumno, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("mensaje" => "No se ha podido actualizar el profesor."));
}
?>