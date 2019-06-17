<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config.php';
include_once '../clases/alumno.php';
 
// get database connection
$baseDatos = new Database();
$db = $baseDatos->getConnection();
 
// prepare product object
$alumno = new Alumno($db);
 
$idAlumno = json_decode(file_get_contents("php://input"));

$alumno->id = $idAlumno->id;
 
// read the details of product to be edited
$alumno->leerAlumno();
 
if($alumno->nombre!=null){
    // create array
    $alumno_arr = array(
        "nombre" => $alumno->nombre,
        "apellido1" => $alumno->apellido1,
        "apellido2" => $alumno->apellido2,
        "email" => $alumno->email,
        "telefono" => $alumno->telefono,
        "provincia" => $alumno->provincia,
        "ciudad" => $alumno->ciudad
 
    );

    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($alumno_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("mensaje" => "¡Ese alumno no existe!."));
}
