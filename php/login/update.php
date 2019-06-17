<?php
//Aquí trato todos los datos que me vengan del formulario del update del perfil
//Si está todo correcto lo que hago es redirigirle a la página home.php
session_start();
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/session.php');
include_once(__DIR__ . '/userClass.php');
$usuario = new userClass();
$detallesUsuario = $usuario->userDetails($_SESSION['id']);

if (isset($_POST['id']) && isset($_POST['emailUsuario'])) {
    try {
        $bd = new Database();
        $baseDatos = $bd->getConnection();
        $foto = $_FILES['imagen']['name'];
        $guardado = $_FILES['imagen']['tmp_name'];
        $directorioConFoto = "../../profesores/" . $foto;

        echo $foto . " " . $guardado;


        $idUsuario = $_POST['id'];
        $emailUsuario = $_POST['emailUsuario'];
        $nuevaPass = $_POST['pass'];

        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $nuevoEmail = $_POST['email0'];
        $provincia = $_POST['provincia'];


        $queryAlumno = "SELECT * FROM alumno WHERE id = " . $idUsuario . " AND email = '" . $emailUsuario . "'";
        $queryProfesor = "SELECT * FROM profesor WHERE id = " . $idUsuario . " AND email = '" . $emailUsuario . "'";


        $stmtAlumno = $baseDatos->prepare($queryAlumno);
        $stmtProf = $baseDatos->prepare($queryProfesor);


        $stmtAlumno->execute();
        $stmtProf->execute();

        $datosAlumno = $stmtAlumno->fetch(PDO::FETCH_OBJ);
        $datosProfesor = $stmtProf->fetch(PDO::FETCH_OBJ);

        echo '<script>';
        echo 'console.log(' . json_encode($datosAlumno) . ')';
        echo '</script>';

        echo '<script>';
        echo 'console.log(' . json_encode($datosProfesor) . ')';
        echo '</script>';

        if ($datosAlumno) {
            if (!empty($nuevaPass)) {
                if (move_uploaded_file($guardado, $directorioConFoto)) {
                    $passAlumno = md5($datosAlumno->pass);
                    $updateAlumno = "Update alumno SET nombre= '$nombre', apellido1='$apellido1',apellido2='$apellido2', email='$nuevoEmail', pass='$passAlumno', imagen='$directorioConImagen' WHERE id=$datosAlumno->id";
                    $a = $baseDatos->prepare($updateAlumno);
                    $a->execute();

                    header("Location: profile.php?id=" . $_SESSION['id']);
                } else {
                    $passAlumno = md5($datosAlumno->pass);
                    $updateAlumno = "Update alumno SET nombre= '$nombre', apellido1='$apellido1',apellido2='$apellido2', email='$nuevoEmail', pass='$passAlumno' WHERE id=$datosAlumno->id";
                    $a = $baseDatos->prepare($updateAlumno);
                    $a->execute();

                    header("Location: profile.php?id=" . $_SESSION['id']);
                }
            } else {
                $updateAlumno = "Update alumno SET nombre= '$nombre', apellido1='$apellido1',apellido2='$apellido2', email='$nuevoEmail' WHERE id=$datosAlumno->id";
                $a = $baseDatos->prepare($updateAlumno);
                $a->execute();

                header("Location: profile.php?id=" . $_SESSION['id']);
            }
        } else {
            if ($datosProfesor) {
                if (!empty($nuevaPass)) {
                    if (move_uploaded_file($guardado, $directorioConFoto)) {
                        $passProfesor = md5($datosProfesor->pass);
                        $updateProfesor = "Update profesor SET nombre= '$nombre', apellido1='$apellido1',apellido2='$apellido2', email='$nuevoEmail', pass='$passProfesor',imagen='$directorioConImagen' WHERE id=$datosProfesor->id";
                        $p = $baseDatos->prepare($updateProfesor);
                        $p->execute();

                        header("Location: profile.php?id=" . $_SESSION['id']);
                    } else {
                        $passProfesor = md5($datosProfesor->pass);
                        $updateProfesor = "Update profesor SET nombre= '$nombre', apellido1='$apellido1',apellido2='$apellido2', email='$nuevoEmail', pass='$passProfesor' WHERE id=$datosProfesor->id";
                        $p = $baseDatos->prepare($updateProfesor);
                        $p->execute();

                        header("Location: profile.php?id=" . $_SESSION['id']);
                    }
                } else {
                    if (move_uploaded_file($guardado, $directorioConFoto)) {
                        $updateProfesor = "Update profesor SET nombre= '$nombre', apellido1='$apellido1',apellido2='$apellido2', email='$nuevoEmail', imagen='$directorioConFoto' WHERE id=$datosProfesor->id";
                        $p = $baseDatos->prepare($updateProfesor);
                        $p->execute();

                        header("Location: profile.php?id=" . $_SESSION['id']);
                    } else {
                        $updateProfesor = "Update profesor SET nombre= '$nombre', apellido1='$apellido1',apellido2='$apellido2', email='$nuevoEmail' WHERE id=$datosProfesor->id";
                        $p = $baseDatos->prepare($updateProfesor);
                        $p->execute();

                        header("Location: profile.php?id=" . $_SESSION['id']);
                    }
                }
            }
        }
    } catch (PDOException $e) { }
}
