<?php




$etapa =  $_POST['EtapaAcademica'];
$nivel =  $_POST['nivelAcademico'];
$asignatura =  $_POST['asignatura'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PruebasPHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container text-center pb-3" style="background-color:whitesmoke;">

    <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
          <div class="card">
            <img class="card-img-top w-50" src="img/profe.jpg" alt="Proyecto 1" width="100px" height="100px">
            <div class="card-body">
              <h5 class="card-title"><?php echo $etapa?></h5>
              <p class="card-text"><?php echo $nivel . "  " . $asignatura?></p>
            </div>
          </div>
    </article>


    </div>


    
</body>
</html>