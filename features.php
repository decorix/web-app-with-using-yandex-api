<?php
// include 'connect_db.php';
session_start();
require_once('connect_db.php');

$id_reg = $_POST['text'];
$login = $_SESSION['user']['login'];

$result = mysqli_query($mysql, "SELECT * FROM dataset JOIN dataset4 ON name=fullName WHERE id_reg=$id_reg");

$res = mysqli_fetch_assoc($result);
$name = $res['name'];
$point = $res['TotalAmountOfScores'];
$rating = $res['FinalRating'];

$result2 = mysqli_query($mysql, "SELECT * FROM features WHERE login='$login' AND name_comp='$name'");

if (mysqli_num_rows($result2) == 0){
    $result3 = mysqli_query($mysql, "INSERT INTO features (login, name_comp, point, rating) VALUES ('$login', '$name', $point, $rating)");
}


header('Location: /user.php');

                            
?>
