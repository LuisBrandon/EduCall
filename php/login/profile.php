<?php
session_start();
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/session.php');
include_once(__DIR__ . '/userClass.php');
$usuario = new userClass();
$detallesUsuario = $usuario->userDetails($_SESSION['id']);
if (isset($_SESSION['id'])) {

    $bd = new Database();
    $baseDatos = $bd->getConnection();
    $datos;
    $emailUsuario =  $detallesUsuario->email;
    $idUsuario = $_SESSION['id'];
    $queryAlumno = "Select id,nombre,apellido1,apellido2,email,provincia,imagen From alumno Where id=$idUsuario AND email='$emailUsuario'";
    $queryProfesor = "Select id,nombre, apellido1,apellido2,email,provincia,imagen From profesor Where id=$idUsuario AND email='$emailUsuario'";
    $stmtAlumno = $baseDatos->prepare($queryAlumno);
    $stmtProf =  $baseDatos->prepare($queryProfesor);

    $stmtAlumno->execute();
    $stmtProf->execute();
    $datosAlumno = $stmtAlumno->fetch(PDO::FETCH_OBJ);
    $datosProfesor = $stmtProf->fetch(PDO::FETCH_OBJ);


    if ($datosAlumno) {
        $datos = $datosAlumno;
    } else {
        if ($datosProfesor) {
            $datos = $datosProfesor;
        }
    }

    echo '<script>';
    echo 'console.log(' . json_encode($datos) . ')';
    echo '</script>';
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../img/owl.png">
    <title>EduCall</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/funcionesAsignaturas.js"></script>
    <script src="../../js/buscador.js"></script>
    <script src="../../js/provincias.js"></script>
    <script src="../../js/bootbox.js"></script>
    <script>
        window.onload = function() {
            LimpiarEtapas();
            LimpiarNiveles();
            LimpiarAsignaturas();
            RellenaEtapas();
            AgregarProvincias();
            EstilosInfo();
        }

        function EstilosInfo() {
            $("#profesorInfo").css("display", "none");
            $("#alumnoInfo").css("display", "none");

            $("#profesorInfo").fadeIn(3000);
            $("#alumnoInfo").fadeIn(3000);

            $("#profesorInfo").hover(function() {
                $(this).css("border-style", "solid");
                $(this).css("border-radius", "5px");
                $(this).css("box-shadow", "1px 1px 10px");
                $(this).css("cursor", "pointer");
            }, function() {
                $(this).css("border-style", "none");
                $(this).css("box-shadow", "0px 0px");
            });

            $("#alumnoInfo").hover(function() {
                $(this).css("border-style", "solid");
                $(this).css("border-radius", "5px");
                $(this).css("box-shadow", "1px 1px 10px");
                $(this).css("cursor", "pointer");
            }, function() {
                $(this).css("border-style", "none");
                $(this).css("box-shadow", "0px 0px");
            });

            $("#profesorInfo").click(function() {
                window.location.href = "../registroprofesor.html";
            });

            $("#alumnoInfo").click(function() {
                window.location.href = "../registroalumno.html";
            });
        }
    </script>

    <script>
        function CompruebaUpdate() {
            var nuevoNombre = $("#nombre").val();
            var nuevoApellido1 = $("#apellido1").val();
            var nuevaPass = $("#pass").val();
            var nuevaProvincia = $("#provincia").val();
            if (nuevoNombre == "" || nuevoNombre == " ") {
                bootbox.alert("No puedes dejar tu nombre vacío");
                return false;
            } else {
                if (nuevoApellido1 == "" || nuevoApellido1 == " ") {
                    bootbox.alert("No puedes dejar tu apellido vacío");
                    return false;
                } else {
                    if (nuevaPass == "") {
                        return true;
                    } else {
                        if (!/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/.test(nuevaPass)) {
                            bootbox.alert("Error en la contraseña. Debe contener de 6 a 15 caracteres e incluir un número y una letra mayúscula.");
                            return false;
                        } else {
                            return true;
                        }
                    }

                }
            }

        }
    </script>



</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top mb-5" id="BarraNav">
            <div class="container">
                <a href="home.php" class="navbar-brand">
                    <img src="../../img/pruebalogo1.png" alt="logotipo con nombre" width="200px" height="70px" class="imagenNav">
                </a>

                <div id="menu-principal">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item h5">
                            <p class="h5">Bienvenido de nuevo, <?php echo $detallesUsuario->nombre . " " . $detallesUsuario->apellido1; ?><a href="profile.php?id=<?php echo $detallesUsuario->id; ?>" class="h5 text-right text-white ml-5">Ver perfil</a><a href="logout.php" class="h5 text-right text-white ml-5">Salir</a></p>
                        </li>
                        <li class="nav-item h5">

                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="pt-5"></section>
    <section class="pt-5"></section>
    <section class="pt-3"></section>

    <form class="mt-5 px-5" action="update.php" method="POST" onsubmit="return CompruebaUpdate()" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre*</label>
            <div class="col-sm-10">
                <input type="nombre" class="form-control" id="nombre" name="nombre" value="<?php echo $datos->nombre; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="apellido1" class="col-sm-2 col-form-label">Primer apellido*</label>
            <div class="col-sm-10">
                <input type="apellido1" class="form-control" id="apellido1" name="apellido1" value="<?php echo $datos->apellido1; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="apellido2" class="col-sm-2 col-form-label">Segundo Apellido</label>
            <div class="col-sm-10">
                <input type="apellido2" class="form-control" id="apellido2" name="apellido2" value="<?php echo $datos->apellido2; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="email0" class="col-sm-2 col-form-label">Email*</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email0" name="email0" value="<?php echo $datos->email; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="pass" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pass" name="pass" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="provincia" class="col-sm-2 col-form-label">Provincia</label>
            <div class="col-sm-10">
                <select name="provincia" id="provincia" class="form-control">
                    <option value="<?php echo $datos->provincia; ?>"><?php echo $datos->provincia; ?></option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="imagen" class="col-md-4 col-form-label text-md-right">Imagen de perfil</label>
            <div class="col-md-6">

                <img src="<?php echo $datos->imagen; ?>" alt="imagenPerfil" width="150px" height="150px">
                <input type="file" name="imagen" accept="image/*" id="imagen">
            </div>
        </div>
        <input type="text" style="display:none;" name="id" value="<?php echo $detallesUsuario->id; ?>">
        <input type="text" style="display:none;" name="emailUsuario" value="<?php echo $detallesUsuario->email; ?>">
        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Actualizar perfil</button>

    </form>









    <footer class="pie-de-pagina text-center text-md-center bg-dark text-white" id="FooterPagina">
        <div class="container">
            <p class="m-0 py-5 d-md">Copyright © 2019. Todos los derechos reservados. </p>
            <p class="d-none d-md d-sm py-md-4"> </p>
        </div>
    </footer>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>

</html>