<?php
include 'connect_db.php';
session_start();

$result2 = mysqli_query($mysql, "SELECT * FROM queueFeedback JOIN dataset ON q_id_org=id_reg");
                            while ($res = mysqli_fetch_assoc($result2)) {
                            echo '<tr id="'.$res['id_reg'].'">';
                            echo '<td>' .$res['q_login'] . '</td>';
                            echo '<td>' .$res['q_text'] . '</td>';
                            echo '<td>' .$res['name']. '</td>';
                            echo '<td class="d-flex justify-content-center">
                            <a href="#" class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#dopInfo" onclick="getIdTr();"><img src="img/yes.png" alt="yes" width="30px" height="30px"></a>
                            <a href="#" class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#feedbackModal" onclick="getIdRegOrg();"><img src="img/no.png" alt="no" width="30px" height="30px"></a>
                            </td>';
                            // echo '<td>' .$res['address'] . '</td>';
                            // echo '<td>' .$res['HousesQuantity'] . '</td>';
                            // echo '<td>' .$res['FinalRating']. '</td>';
                            echo '</tr>';
                            }
?>