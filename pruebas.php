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
  <script src="js/jquery.min.js"></script>
  <script src="js/rater.js"></script>
  <script>
    window.onload = function() {
      
      var options = {
        max_value: 5,
        step_size: 0.5,
        initial_value: 0,
        selected_symbol_type: 'utf8_star', // Must be a key from symbols
        convert_to_utf8: false,
        cursor: 'default',
        readonly: false,
        change_once: false, // Determines if the rating can only be set once
        ajax_method: 'POST',
        //url: 'http://localhost/test.php',
        additional_data: {}, // Additional data to send to the server
        only_select_one_symbol: false, // If set to true, only selects the hovered/selected symbol and nothing prior to it
        //update_input_field_name = some input field set by the user
      };

      $(".rater").rate(options);
    }
  </script>
</head>

<body>
  <div class="container text-center pb-3" style="background-color:whitesmoke;">
    <div class="row" id="contenidoProfesores">
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top w-50 img-thumbnail " src="img/profe.jpg" alt="Proyecto 1" width="100px" height="100px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $etapa ?></h5>
            <p class="card-text"><?php echo $nivel . "  " . $asignatura ?></p>
            <a href=""><button class="btn btn-primary">Ver más</button></a>
          </div>
        </div>
      </article>
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top w-50 img-thumbnail" src="img/profe.jpg" alt="Proyecto 1" width="100px" height="100px">
          <div class="rater"></div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $etapa ?></h5>
            <p class="card-text"><?php echo $nivel . "  " . $asignatura ?></p>

            <a href=""><button class="btn btn-primary">Ver más</button></a>
          </div>
        </div>
      </article>
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top w-50" src="img/profe.jpg" alt="Proyecto 1" width="100px" height="100px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $etapa ?></h5>
            <p class="card-text"><?php echo $nivel . "  " . $asignatura ?></p>
            <a href=""><button class="btn btn-primary">Ver más</button></a>
          </div>
        </div>
      </article>
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img class="card-img-top w-50" src="img/profe.jpg" alt="Proyecto 1" width="100px" height="100px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $etapa ?></h5>
            <p class="card-text"><?php echo $nivel . "  " . $asignatura ?></p>
            <a href=""><button class="btn btn-primary">Ver más</button></a>
          </div>
        </div>
      </article>
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-3 ">
        <div class="card">
          <img class="card-img-top w-50" src="img/profe.jpg" alt="Proyecto 1" width="100px" height="100px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $etapa ?></h5>
            <p class="card-text"><?php echo $nivel . "  " . $asignatura ?></p>
            <a href=""><button class="btn btn-primary">Ver más</button></a>
          </div>
        </div>
      </article>
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-3">
        <div class="card">
          <img class="card-img-top w-50" src="img/profe.jpg" alt="Proyecto 1" width="100px" height="100px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $etapa ?></h5>
            <p class="card-text"><?php echo $nivel . "  " . $asignatura ?></p>
            <a href=""><button class="btn btn-primary">Ver más</button></a>
          </div>
        </div>
      </article>
      <article class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-3">
        <div class="card">
          <img class="card-img-top w-50" src="img/profe.jpg" alt="Proyecto 1" width="100px" height="100px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $etapa ?></h5>
            <p class="card-text"><?php echo $nivel . "  " . $asignatura ?></p>
            <a href=""><button class="btn btn-primary">Ver más</button></a>
          </div>
        </div>
      </article>
    </div>

  </div>

</body>

</html>