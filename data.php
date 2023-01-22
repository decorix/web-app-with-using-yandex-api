<?php
include 'connect_db.php';
// $name1 = 'Центральный административный округ';
// $name1 = 'Юго-Восточный округ';
// $name1 = 'Южный округ';
// $name1 = 'Юго-Западный округ';
// $name1 = 'Западный округ';
// $name1 = 'Новая Москва округ';
// $name1 = 'Троицкий округ';
// $name1 = 'Восточный округ';
// $name1 = 'Северо-Восточный округ';
// $name1 = '';
// $name1 = '';
// $name1 = '';
// $jsonData = json_decode($_POST["dataQuery"], true);
// var_dump($jsonData['name']);
// $name = $_POST['text'];
// echo $name;
$name = $_POST['text'];
// $name = 'Центральный административный округ';
echo $name; 
$result2 = mysqli_query($mysql, "SELECT * FROM dataset WHERE admArea='$name'");
                            while ($res = mysqli_fetch_assoc($result2)) {
                            echo $res['name'];
                            echo $res['HousesQuantity'];
                            echo $res['FinalRating'];
                            }
?>