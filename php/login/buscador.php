<?php
session_start();
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/session.php');
include_once(__DIR__ . '/userClass.php');
$usuario = new userClass();
$detallesUsuario = $usuario->userDetails($_SESSION['id']);


if (isset($_POST['buscarProfesor'])) {
    $etapa = $_POST['EtapaAcademica'];
    $nivel = $_POST['nivelAcademico'];
    $asignatura = $_POST['asignatura'];
    $provincia = $_POST['provincia'];
    $bd = new Database();
    $baseDatos = $bd->getConnection();
    $query = "Select id, nombre, apellido1, provincia, nivelAcademicoPriAsig, asignatura1, nivelAcademicoSegAsig, asignatura2,imagen From profesor
              Where nivelAcademicoPriAsig Like '%$etapa%' AND asignatura1 Like '%$asignatura%' AND provincia Like '%$provincia%'; ";
    $stmt = $baseDatos->prepare($query);

    $stmt->execute();

    $arrayDatos = $stmt->fetchAll(PDO::FETCH_OBJ);

    $imagenDefecto = "../../img/profe.jpg";
    

    echo '<script>';
    echo 'console.log(' . json_encode($arrayDatos) . ')';
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
    <script src="../../js/funcionesAsignaturas.js"></script>
    <script src="../../js/buscador.js"></script>
    <script src="../../js/provincias.js"></script>


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
                            <p class="h5">Bienvenido de nuevo, <?php echo $detallesUsuario->nombre . " " . $detallesUsuario->apellido1; ?><a href="profile.php" class="h5 text-right text-white ml-5">Ver perfil</a><a href="logout.php" class="h5 text-right text-white ml-5">Salir</a></p>
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
            foreach ($arrayDatos as $profesor) {
                if(empty($profesor->imagen)){
                    $rutaImagen = '<img class="w-50 img-thumbnail img-fluid float-left" alt="Proyecto1" width="100px" height="100px" src="../../img/profe.jpg"/>';
                    // <img class=' w-50 img-thumbnail img-fluid  float-left ' src='../../img/profe.jpg' alt='Proyecto 1' width='100px' height='100px'>
                }else{
                    $rutaImagen = '<img class="w-50 img-thumbnail img-fluid float-left" alt="Proyecto1" width="100px" height="100px" src="'.$profesor->imagen.'"/>';
                    // 
                }
                echo "<article class='col-12 col-md-6 col-lg-3 mt-5 mb-lg-0'>
                        <div class='card mt-5 clearfix'>
                                 <div class='clearfix'>
                                 $rutaImagen
                                 <p class='text-center h5'>" . $profesor->nombre . " <br> " . $profesor->apellido1 . " <br> <br> " . $profesor->provincia . " </p>
                                 </div>
                            <div class='card-body'>
                                <h5 class='card-title'> Imparte: </h5>
                                <p class='card-text'> " . $profesor->nivelAcademicoPriAsig . " " . $profesor->asignatura1 . "</p>
                                <p class='card-text'> " . $profesor->nivelAcademicoSegAsig . "  " . $profesor->asignatura2 . "</p>
                                <a href='profesor.php?id=" . $profesor->id . "'><button class='btn btn-primary'><i class='fas fa-info-circle'></i> Ver profesor</button></a>
                            </div>
                        </div>
                      </article>";
            }
            ?>

        </div>

    </div>





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