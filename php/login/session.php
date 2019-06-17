<?php
if (!empty($_SESSION['id'])) {
    $session_id = $_SESSION['id'];
    include('userClass.php');
    $detallesUsuario = new userClass();
}
if (empty($session_id)) {
    header("Location: ../../index.html");
}
// ../../index.html
