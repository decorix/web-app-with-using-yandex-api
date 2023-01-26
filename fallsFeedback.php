<?
session_start();
include 'connect_db.php';

$id_reg = $_POST['text'];
$sql2 = mysqli_query($mysql, "SELECT * FROM queueFeedback WHERE q_id_org=$id_reg");
$res = mysqli_fetch_assoc($sql2);
$message = $res['q_text'];
$login = $res['q_login'];

$sql3 = mysqli_query($mysql, "DELETE queueFeedback FROM queueFeedback WHERE q_login=$login AND q_id_org=$id_reg");
    header('Location: /admin.php');
?>