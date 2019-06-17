<?php
session_start();
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/session.php');
include_once(__DIR__ . '/userClass.php');
$usuario = new userClass();
$detallesUsuario = $usuario->userDetails($_SESSION['id']);
echo '<script>';
echo 'console.log('. json_encode( $detallesUsuario ) .')';
echo '</script>';


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
                            <p class="h5">Bienvenido de nuevo, <?php echo $detallesUsuario->nombre . " " . $detallesUsuario->apellido1; ?><a href="profile.php?id=<?php echo $detallesUsuario->id;?>" class="h5 text-right text-white ml-5">Ver perfil</a><a href="logout.php" class="h5 text-right text-white ml-5">Salir</a></p>
                        </li>
                        <li class="nav-item h5">

                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="quien-soy py-4 mt-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-12 text-center p-3 mt-2">
                    <p class="h4 mb-3">¡Usa nuestro buscador!</p>
                    <form action="buscador.php" method="POST" name="buscador">
                        <label for="EtapaAcademica">Etapa académica: </label>
                        <select name="EtapaAcademica" id="EtapaAcademica" onchange="CompruebaEtapa()" class="form-control">
                            <option value=" ">---</option>
                        </select> <br>

                        <label for="nivelAcademico">Nivel académico: </label>
                        <select name="nivelAcademico" id="nivelAcademico" onchange="CompruebaNivel()" class="form-control">
                            <option value=" ">---</option>
                        </select> <br>

                        <label for="asignatura"> Asignatura: </label>
                        <select name="asignatura" id="asignatura" class="form-control">
                            <option value=" ">---</option>
                        </select><br>
                        <label for="provincia"> Provincia: </label>
                        <select name="provincia" id="provincia" class="form-control">
                            <option value=" ">---</option>
                        </select> <br>

                        <button type="submit" class="btn btn-primary" name="buscarProfesor"> <i class="fas fa-search"></i> Buscar profesor</button>

                    </form>
                </div>

            </div>

            <div class="row">
                <div class="col-12 col-md-6 text-center p-3 mt-4" id="profesorInfo">
                    <h5 class="mt-3" id="eresProf">¿Eres profesor?</h5>
                    <img src="../../img/profesor0-min.jpg" id="imagenProfesor" alt="imagen de un profesor" class="img-fluid mb-4 mb-md-0 mt-2 rounded">
                    <p></p>
                </div>
                <div class="col-12 col-md-6 text-center p-3 mt-4" id="alumnoInfo">
                    <h5 class="mt-3" id="eresAlumno">¿Eres alumno?</h5>
                    <img src="../../img/alumno-min.jpg" id="imagenAlumno" class="img-fluid mb-4 mb-md-0 mt-2 rounded">

                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="filosofia py-4  text-center text-white" id="dandoClase">

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="../../img/dandoClase.jpg" class="rounded" width="360px" height="350px">

                </div>
                <div class="col-12 col-md-6">
                    <p class="h3" style="color:black; font-family: Georgia">¿Necesitas ayuda académica? <br></p>
                    <p class="h4" style="font-family: serif;">Regístrate y usa nuestro buscador para buscar un profesor cercano </p>
                    <p class="h3 mt-3" style="color:black; font-family: Georgia;">¿Quieres impartir clase a alumnos?</p>
                    <p class="h4" style="font-family: serif;">Regístrate y aparecerás en el buscador para los alumnos que necesiten tu ayuda</p>
                </div>
            </div>
        </div>
    </section>

    <section class="proyectos py-4">


    </section>




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