<?php
include 'connect_db.php';
session_start();

$id = $_POST['text'];
$login = $_SESSION['user']['login'];
$result8 = mysqli_query($mysql, "SELECT * FROM dataset JOIN features ON name=name_comp WHERE login='$login'");
                            while ($res = mysqli_fetch_assoc($result8)) {
                            echo '<tr id="'.$res['id_reg'].'">';
                            echo '<td>' .$res['name'] . '</td>';
                            echo '<td>' .$res['TotalAmountOfScores'] . '</td>';
                            echo '<td>' .$res['FinalRating']. '</td>';
                            echo '<td class="d-flex justify-content-end">
                            <button class="btn btn-outline-success my-2 my-sm-0 mx-3" type="submit" onclick="getIdTrFeat();">
                                <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#dopInfo"> Информация </a>
                              </button>
                            <a href="#" class="nav-link" onclick="deleteFeatures();"><img src="img/delete.png" alt="favourites" width="30px" height="30px"></a>
                            </td>';
                            // echo '<td>' .$res['address'] . '</td>';
                            // echo '<td>' .$res['HousesQuantity'] . '</td>';
                            // echo '<td>' .$res['FinalRating']. '</td>';
                            echo '</tr>';
                            }
?>