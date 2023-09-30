<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: dodaj.php");
    exit();
}
require_once "../db_config.php";
$username = $_SESSION["username"];
$praca_start = $_SESSION["praca_start"];
$praca_koniec = $_SESSION["praca_koniec"];
$data_start = $_SESSION["data_start"];
$godzina_start = $_SESSION["godzina_start"];
$data_koniec = $_SESSION["data_koniec"];
$godzina_koniec = $_SESSION["godzina_koniec"];
$suma_pracy = $_SESSION["suma_pracy"];
$ilosc_dzien = $_SESSION["ilosc_dzien"];
$ilosc_noc = $_SESSION["ilosc_noc"];


?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIOSK - panel pracownika</title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>

<body>
    <br>
    <br>
    <div class="default">
        <?php
        $sql = "INSERT INTO godziny (username, praca_start, praca_koniec, data_start, data_koniec, godzina_start, godzina_koniec, suma_pracy, ilosc_dzien,  ilosc_noc) VALUES ('$username','$praca_start', '$praca_koniec', '$data_start', '$data_koniec', '$godzina_start', '$godzina_koniec', $suma_pracy, '$ilosc_dzien', '$ilosc_noc')";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            echo "Godziny zostały zapisane w bazie danych." . "<br><br>";
            echo "<font color='red'>Po zakończeniu - pamiętaj o wylogowaniu.</font>";
        } else {
            echo "Wystąpił błąd podczas zapisywania danych: " .
                mysqli_error($mysqli);
        }
        ?>
        <br><br>
        <a href="/panel.php">Powrót do panelu</a>
    </div>
    <div class="footer">
        <p>© 2023 IT.MATT</p>
    </div>
</body>

</html>