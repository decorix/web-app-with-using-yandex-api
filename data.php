<?php
include 'connect_db.php';
session_start();

$name = $_POST['text'];
$result2 = mysqli_query($mysql, "SELECT * FROM dataset JOIN dataset4 ON name=fullName WHERE admArea='$name' ORDER BY FinalRating ASC");
                            while ($res = mysqli_fetch_assoc($result2)) {
                            echo '<tr id="'.$res['id_reg'].'">';
                            echo '<td>' .$res['name'] . '</td>';
                            echo '<td>' .$res['TotalAmountOfScores'] . '</td>';
                            echo '<td>' .$res['FinalRating']. '</td>';
                            echo '<td class="d-flex justify-content-end">
                            <button class="btn btn-outline-success my-2 my-sm-0 mx-3" type="submit" onclick="getIdTr();">
                                <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#dopInfo"> Информация </a>
                              </button>
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#dopInfo"><img src="img/favourites.png" alt="favourites" width="38px" height="38px"></a>
                            </td>';
                            // echo '<td>' .$res['address'] . '</td>';
                            // echo '<td>' .$res['HousesQuantity'] . '</td>';
                            // echo '<td>' .$res['FinalRating']. '</td>';
                            echo '</tr>';
                            }
?>