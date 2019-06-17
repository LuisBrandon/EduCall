<?php
// include_once(__DIR__ . '/../config.php');
// $session_id='';
// $_SESSION['id']=''; 
// if(empty($session_id) && empty($_SESSION['id']))
// {
// header("Location: ../../index.html");
// //echo "";

session_start();
unset ($_SESSION['id']);
session_destroy();

header('Location: ../../index.html');
