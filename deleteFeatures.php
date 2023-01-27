<?php
// include 'connect_db.php';
session_start();
require_once('connect_db.php');


$id_reg = $_POST['text'];
$login = $_SESSION['user']['login'];
$result = mysqli_query($mysql, "DELETE features FROM dataset, features WHERE features.name_comp=dataset.name AND dataset.id_reg=$id_reg AND login='$login'");

?>
