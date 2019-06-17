<?php
include_once(__DIR__ . '/../config.php');
class userClass
{
    public function userLogin($emailUsuario, $pass)
    {
        try {
            //Creamos una nueva conexión a la base de datos
            $bd = new Database();
            $baseDatos = $bd->getConnection();
            //Formateo la pass en MD5 y hago las querys de los usuarios
            $passMD5 = md5($pass);
            $queryAlumno = "Select id From alumno Where email=:emailUsuario AND pass=:pass";
            $queryProfesor = "Select id From profesor Where email=:emailUsuario AND pass=:pass";
            //Preparo la del alumno y la ejecuto
            $stmtAlumno = $baseDatos->prepare($queryAlumno);
            $stmtAlumno->bindParam(":emailUsuario", $emailUsuario, PDO::PARAM_STR);
            $stmtAlumno->bindParam(":pass", $passMD5, PDO::PARAM_STR);
            $stmtAlumno->execute();
            //Preparo la del profesor y la ejecuto
            $stmtProfesor = $baseDatos->prepare($queryProfesor);
            $stmtProfesor->bindParam(":emailUsuario", $emailUsuario, PDO::PARAM_STR);
            $stmtProfesor->bindParam(":pass", $passMD5, PDO::PARAM_STR);
            $stmtProfesor->execute();

            //Hago variables que será la cantidad de columnas que reciba
            $filasAlumno = $stmtAlumno->rowCount();
            $filasProfesor = $stmtProfesor->rowCount();

            //En variables añado la info que me venga
            $datosAlumno = $stmtAlumno->fetch(PDO::FETCH_OBJ);
            $datosProfesor = $stmtProfesor->fetch(PDO::FETCH_OBJ);
            $baseDatos = null;


            //Si hay una fila de alumno
            if ($filasAlumno) {
                $_SESSION['id'] = $datosAlumno->id;
                return true;
            } else {
                if ($filasProfesor) {
                    $_SESSION['id'] = $datosProfesor->id;
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function userDetails($idUsuario)
    {
        try {
            $bd = new Database();
            $baseDatos = $bd->getConnection();
            $queryAlumno = "Select id, nombre, apellido1, apellido2, email, imagen From alumno Where id= :id";
            $stmtAlumno = $baseDatos->prepare($queryAlumno);
            $stmtAlumno->bindParam(":id", $idUsuario, PDO::PARAM_INT);
            $stmtAlumno->execute();

            $queryProfesor = "Select id, nombre, apellido1, apellido2, email, nivelAcademicoPriAsig, asignatura1, nivelAcademicoSegAsig, asignatura2, imagen From profesor Where id= :id";
            $stmtProfesor = $baseDatos->prepare($queryProfesor);
            $stmtProfesor->bindParam(":id", $idUsuario, PDO::PARAM_INT);
            $stmtProfesor->execute();

            $filasAlumno = $stmtAlumno->rowCount();
            $filasProfesor = $stmtProfesor->rowCount();

            if($filasAlumno){
                $datos = $stmtAlumno->fetch(PDO::FETCH_OBJ);
                return $datos;
    
            }else{
                if($filasProfesor){
                    $datos = $stmtProfesor->fetch(PDO::FETCH_OBJ);
                    return $datos;

                }
            }

            
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
}
