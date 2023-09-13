<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION["username"];
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
    <br><br>
    <div class="default">
        <h2>Witaj,
            <?php echo $username; ?>!
        </h2>
        <p>Jesteś zalogowany, co chcesz zrobić?</p>
        <br>
        <a href="godziny/dodaj.php">Dodać godziny</a>
        <br /><br />
        <a href="godziny/godziny.php">Sprawdzić moje godziny</a>
        <br /><br />
        <a href="kontakt.php">Wysłać wiadomość</a>
        <br /><br />
        <p>!!! PO ZAKOŃCZENIU PRACY PAMIĘTAJ O WYLOGOWANIU !!!</p>
        <a href="logout.php">Wyloguj</a>
    </div>
    <div class="footer">
        <p>© 2023 IT.MATT</p>
    </div>
</body>

</html>