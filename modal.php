<?php
// include 'connect_db.php';
session_start();
require_once('connect_db.php');

$id_reg = $_POST['text'];
$result4 = mysqli_query($mysql, "SELECT * FROM dataset JOIN dataset4 ON name=fullName WHERE id_reg=$id_reg");
$result5 = mysqli_query($mysql, "SELECT text FROM dataset JOIN dataset4 ON name=fullName JOIN feedback ON id_reg=id_org WHERE id_reg=$id_reg");
                            $res = mysqli_fetch_assoc($result4);
                            echo '<div class="form-group">';
                            echo '<label for="modalAddress" class="form-label"><b>Адрес</b></label>';
                            echo '<p id="modalAddress">' . $res['address'] . '</p>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="modalRating" class="form-label"><b>Площадь домов в управлении (м^2)</b></label>';
                            echo '<p id="modalRating">'.$res['HousesArea'].'</p>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="modalHouses" class="form-label"><b>Количество домов в управлении</b></label>';
                            echo '<p id="modalHouses">'.$res['HousesQuantity'].'</p>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="modalMessage" class="form-label"><b>Отзывы о компании</b></label>';
                            while ($res2 = mysqli_fetch_assoc($result5)){
                                echo '<p id="modalMessage">'.$res2['text'].'</p>';
                                echo '<hr>';
                            }
                            echo '</div>';
                            

?>