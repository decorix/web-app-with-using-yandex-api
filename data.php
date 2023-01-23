<?php
include 'connect_db.php';
session_start();

$name = $_POST['text'];

$result2 = mysqli_query($mysql, "SELECT * FROM dataset WHERE admArea='$name'");
                            while ($res = mysqli_fetch_assoc($result2)) {
                            echo '<tr>';
                            echo '<td>' .$res['name'] . '</td>';
                            echo '<td>' .$res['HousesQuantity'] . '</td>';
                            echo '<td>' .$res['FinalRating']. '</td>';
                            echo '</tr>';
                            }
?>