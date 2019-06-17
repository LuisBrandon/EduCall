 <?php
 session_start();
  include_once(__DIR__ . '/../config.php');
  include_once(__DIR__ . '/userClass.php');
  $errorMsgReg = '';
  $errorMsgLogin = '';

  $userClass = new userClass();

  if (!empty($_POST['loginSubmit'])) {
    $emailUsuario = $_POST['emailUsuario'];
    $pass = $_POST['pass'];
    if (strlen(trim($emailUsuario)) > 1 && strlen(trim($pass)) > 1) {
      $id = $userClass->userLogin($emailUsuario, $pass);
      if ($id) {
        header("Location: home.php");
      } else {
        $errorMsgLogin = "Revisa los datos introducidos.";
      }
    }
  }
  ?>


 <!DOCTYPE html>
 <html lang="es">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="../../img/owl.png">
   <title>Login</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/estilos.css">
   <link rel="stylesheet" href="../../css/login.css">
   <script src="../../js/jquery.min.js"></script>

 </head>

 <body>

   <div class="container">
     <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
       <div class="card card-signin my-5">
         <div class="card-body" id="formulario">
           <h5 class="card-title text-center">Introduzca sus datos</h5>
           <form class="form-signin" method="POST" name="login" action="">
             <label>Email</label>
             <input type="text" name="emailUsuario" class="form-control" autocomplete="off" />
             <label>Contraseña</label>
             <input type="password" name="pass" autocomplete="off" class="form-control" />
             <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
             <input type="submit" class="button form-control bg-primary text-white mt-3" name="loginSubmit" value="Entrar">
           </form>
         </div>
       </div>
     </div>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>

 </html>