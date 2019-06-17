<?php
session_start();
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/session.php');
include_once(__DIR__ . '/userClass.php');
$usuario = new userClass();
$detallesUsuario = $usuario->userDetails($_SESSION['id']);

if (isset($_GET['id'])) {
    $idProfesor = $_GET['id'];
    $bd = new Database();
    $baseDatos = $bd->getConnection();
    $query = "Select nombre, apellido1, apellido2, email, telefono, provincia, nivelAcademicoPriAsig, asignatura1, nivelAcademicoSegAsig, asignatura2, infoAdicional,imagen From profesor Where id='$idProfesor'";
    $stmt = $baseDatos->prepare($query);
    $stmt->execute();
    $datosProfesor = $stmt->fetch(PDO::FETCH_OBJ);

    echo '<script>';
    echo 'console.log(' . json_encode($datosProfesor) . ')';
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
    <script src="../../js/home.js"></script>
    <script src="../../js/buscador.js"></script>



</head>

<body>

    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top mb-5" id="BarraNav">
            <div class="container">
                <a href="home.php" class="navbar-brand">
                    <img src="../../img/pruebalogo1.png" alt="logotipo con nombre" width="200px" height="70px" class="imagenNav">

                </a>

                <!-- <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal"
                    aria-controls="menu-principal" aria-expanded="false" aria-label="Desplegar menú de navegación">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

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


    <div class="container text-center pb-3 mt-5" style="background-color:whitesmoke;">
        <div class="row mt-4" id="contenidoProfesores">
            <?php
            if (empty($datosProfesor->imagen)) {
                $rutaImagen = '<img class="w-50 img-thumbnail img-fluid float-left" alt="Proyecto1" width="100px" height="100px" src="../../img/profe.jpg"/>';
                // <img class=' w-50 img-thumbnail img-fluid  float-left ' src='../../img/profe.jpg' alt='Proyecto 1' width='100px' height='100px'>
            } else {
                $rutaImagen = '<img class="w-50 img-thumbnail img-fluid float-left" alt="Proyecto1" width="100px" height="100px" src="'.$datosProfesor->imagen.'"/>';
                // 
            }

            echo "<article class='col-10 col-md-10 col-lg-10 mt-5 mb-lg-0'>
                <div class='card mt-5 clearfix'>
                    <div class='clearfix'>
                        $rutaImagen
                        <p class='text-center h5'>" . $datosProfesor->nombre . " <br> " . $datosProfesor->apellido1 . "<br>  $datosProfesor->apellido2" . " <br> <br> " . $datosProfesor->provincia . " </p>

                        <h5 class='card-title'> Imparte: </h5>
                        <p class='card-text'> " . $datosProfesor->nivelAcademicoPriAsig . " " . $datosProfesor->asignatura1 . "</p>
                        <p class='card-text'> " . $datosProfesor->nivelAcademicoSegAsig . " " . $datosProfesor->asignatura2 . "</p>
                        <h5 class='card-title'> Contacto: </h5>
                        <p class='card-text'> " . $datosProfesor->email . "</p>
                        <p class='card-text'> " . $datosProfesor->telefono . "</p>
                        <h5 class='card-title'> Información sobre el profesor: </h5>
                        <p class='card-text'> " . $datosProfesor->infoAdicional . "</p>



                    </div>
                    <div class='card-body'>
                    </div>
                </div>
            </article>";
            ?>
        </div>
    </div>


    <footer class="pie-de-pagina text-center text-md-center bg-dark text-white mt-5" id="FooterPagina">
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