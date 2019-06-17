<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config.php';
include_once '../clases/profesor.php';
 
// get database connection
$baseDatos = new Database();
$db = $baseDatos->getConnection();
 
// prepare product object
$profesor = new Profesor($db);
 
// set ID property of record to read
$idProfesor = json_decode(file_get_contents("php://input"));

$profesor->id = $idProfesor->id;

$profesor->leerProfesor();
 
if($profesor->nombre!=null){
    // create array
    $profesor_arr = array(
        "nombre" => $profesor->nombre,
        "apellido1" => $profesor->apellido1,
        "apellido2" => $profesor->apellido2,
        "email" => $profesor->email,
        "telefono" => $profesor->telefono,
        "provincia" => $profesor->provincia,
        "ciudad" => $profesor->ciudad,
        "nivelAcademicoPriAsig" => $profesor->nivelAcademicoPriAsig,
        "asignatura1" => $profesor->asignatura1,
        "nivelAcademicoSegAsig" => $profesor->nivelAcademicoSegAsig,
        "asignatura2" => $profesor->asignatura2
    );
    
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($profesor_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("mensaje" => "¡Ese profesor no existe!."));
}
