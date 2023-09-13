<?php
require_once "db_config.php";
$username = $_POST["username"];
$password = $_POST["password"];
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    session_start();
    $_SESSION["username"] = $username;
    $row = $result->fetch_assoc();
    if ($row["username"] == "Administrator") {
        header("Location: admin/panel.php");
    } else {
        header("Location: panel.php");
    }
} else {
    header("Location: error.php");
}
$mysqli->close();
?>
