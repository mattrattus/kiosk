<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: dodaj.php");
    exit();
}
$username = $_SESSION["username"];

require_once "../db_config.php";
$sql = "SELECT data_start, godzina_start, data_koniec, godzina_koniec, suma_pracy,ilosc_dzien, ilosc_noc FROM `godziny` WHERE username = '$username'";
$result = $mysqli->query($sql);
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
    <div class="time">
        <?php echo "Dzisiaj jest: " . date("d-m-Y"); ?>
    </div>
    <br><br><br>
    <div class="default">
        <style>
            table {
                margin: 0 auto;
            }
        </style>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>| Praca start | </th><th>| Godzina start | </th><th>| Praca koniec | </th><th>| Godzina koniec |</th><th>| Suma godzin |</th><th>| 'dzień' |</th><th>| 'noc' |</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["data_start"] . "</td>";
                echo "<td>" . $row["godzina_start"] . "</td>";
                echo "<td>" . $row["data_koniec"] . "</td>";
                echo "<td>" . $row["godzina_koniec"] . "</td>";
                echo "<td>" . $row["suma_pracy"] . "</td>";
                echo "<td>" . $row["ilosc_dzien"] . "</td>";
                echo "<td>" . $row["ilosc_noc"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nie znaleziono wyników.";
        }
        $mysqli->close();
        ?>
        <br><br><br>
        <a href="/panel.php">Powrót do panelu</a>
    </div>
    <div class="footer">
        <p>© 2023 IT.MATT</p>
    </div>
</body>

</html>