<?php
include 'connect_db.php';
session_start();
$id_reg = $_POST['text'];
$result4 = mysqli_query($mysql, "SELECT * FROM dataset JOIN dataset4 ON name=fullName WHERE id_reg=$id_reg");
                            while ($res = mysqli_fetch_assoc($result4)) {
                            echo '<div class="form-group">';
                            echo '<label for="modalAddress" class="form-label">Адресс</label>';
                            echo '<p id="modalAddress">' . $res['address'] . '</p>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="modalRating" class="form-label">Финальный рейтинг</label>';
                            echo '<p id="modalRating">'.$res['FinalRating'].'</p>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="modalHouses" class="form-label">Количество домов в управлении</label>';
                            echo '<p id="modalHouses">'.$res['HousesQuantity'].'</p>';
                            echo '</div>';
                            }
?>