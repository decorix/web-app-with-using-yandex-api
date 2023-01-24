<?php
include 'connect_db.php';
session_start();

$id_reg = $_POST['text'];
$login = $_SESSION['user']['login'];
$result7 = mysqli_query($mysql, "SELECT * FROM dataset JOIN dataset4 ON name=fullName WHERE id_reg=$id_reg");

                            while ($res = mysqli_fetch_assoc($result7)) {
                                    $name = $res['name'];
                                    $point = $res['TotalAmountOfScores'];
                                    $rating = $res['FinalRating'];

                                    $result6 = mysqli_query($mysql, "INSERT INTO features (login, name_comp, point, rating) VALUES ('$login', '$name', $point, $rating)");

                                    header('Location: /user.php');

                            }
?>
