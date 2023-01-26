<?php
include 'connect_db.php';
session_start();

$name = $_POST['text'];
$result2 = mysqli_query($mysql, "SELECT * FROM dataset JOIN dataset4 ON name=fullName WHERE admArea='$name' ORDER BY FinalRating ASC");
if ($_SESSION['user']['status']!=''){
    while ($res = mysqli_fetch_assoc($result2)) {
        echo '<tr id="'.$res['id_reg'].'">';
        echo '<td>' .$res['name'] . '</td>';
        echo '<td>' .$res['TotalAmountOfScores'] . '</td>';
        echo '<td>' .$res['FinalRating']. '</td>';
        echo '<td>
            <div id="gg">
                <a class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#dopInfo" onclick="getIdTr();"><img src="img/info.png" alt="info" width="30px" height="30px"></a>
                <a class="nav-link" onclick="getIdTrFeatures();"><img src="img/favourites.png" alt="favourites" width="30px" height="30px"></a>
                <a class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#feedbackModal" onclick="getIdRegOrg();"><img src="img/message.png" alt="message" width="30px" height="30px"></a>
            </div>
            </td>';
        echo '</tr>';
    }
} else {
    while ($res = mysqli_fetch_assoc($result2)) {
        echo '<tr id="'.$res['id_reg'].'">';
        echo '<td>' .$res['name'] . '</td>';
        echo '<td>' .$res['TotalAmountOfScores'] . '</td>';
        echo '<td>' .$res['FinalRating']. '</td>';
        echo '<td>
            <div id="gg">
                <a class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#dopInfo" onclick="getIdTr();"><img src="img/info.png" alt="info" width="30px" height="30px"></a>
            </div>
            </td>';
        echo '</tr>';
    }
}
?>

<!-- echo '<td> <a href="#" class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#dopInfo" onclick="getIdTr();"><img src="img/info.png" alt="info" width="30px" height="30px"></a> </td>';
echo '<td><a href="#" class="nav-link" onclick="getIdTrFeatures();"><img src="img/favourites.png" alt="favourites" width="30px" height="30px"></a></td>';
echo '<td> <a href="#" class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#feedbackModal" onclick="getIdRegOrg();"><img src="img/message.png" alt="message" width="30px" height="30px"></a> </td>';
echo '</tr>'; -->

<!-- echo '<td class="d-flex justify-content-center">
    <a href="#" class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#dopInfo" onclick="getIdTr();"><img src="img/info.png" alt="info" width="30px" height="30px"></a>
    <a href="user.php" class="nav-link" onclick="getIdTrFeatures();"><img src="img/favourites.png" alt="favourites" width="30px" height="30px"></a>
    <a href="#" class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#feedbackModal" onclick="getIdRegOrg();"><img src="img/message.png" alt="message" width="30px" height="30px"></a>
    </td>';
    
    echo '</tr>'; -->