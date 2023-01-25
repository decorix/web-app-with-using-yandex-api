<?
session_start();
include 'connect_db.php';

$login=$_SESSION['user']['login'];
$message = $_POST['feedback'];
$id_reg = $_POST['idRegOrg'];

$sql = mysqli_query($mysql, "INSERT INTO queueFeedback (q_login, q_text, q_id_org) VALUES ('$login', '$message', $id_reg)");
    header('Location: /admin.php');

?>