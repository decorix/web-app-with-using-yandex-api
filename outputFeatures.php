<?php
// include 'connect_db.php';
session_start();
require_once('connect_db.php');

$id = $_POST['text'];
$login = $_SESSION['user']['login'];
$result8 = mysqli_query($mysql, "SELECT * FROM dataset JOIN features ON name=name_comp WHERE login='$login'");
                            while ($res = mysqli_fetch_assoc($result8)) {
                            echo '<tr id="'.$res['id_reg'].'">';
                            echo '<td>' .$res['name'] . '</td>';
                            echo '<td>' .$res['TotalAmountOfScores'] . '</td>';
                            echo '<td>' .$res['FinalRating']. '</td>';
                            echo '<td>
                                <div id="gg">
                                    <a class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#dopInfo" onclick="getIdTrFeat();"><img src="img/info.png" alt="info" width="30px" height="30px"></a>
                                    <a class="nav-link" onclick="deleteFeatures();"><img src="img/deleteFavourites.png" alt="favourites" width="30px" height="30px"></a>
                                    <a class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#feedbackModal" onclick="getIdRegOrgFeat();"><img src="img/message.png" alt="message" width="30px" height="30px"></a>
                                </div>
                                </td>';
                            echo '</tr>';
                            }
?>