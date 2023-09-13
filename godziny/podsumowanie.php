<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: dodaj.php");
    exit();
}
$username = $_SESSION["username"];
$data_start = $_POST["data_start"];
$g_start = $_POST["g_start"];
$m_start = $_POST["m_start"];
$data_koniec = $_POST["data_koniec"];
$g_koniec = $_POST["g_koniec"];
$m_koniec = $_POST["m_koniec"];
$godzina_start = $g_start . ":" . $m_start;
$godzina_koniec = $g_koniec . ":" . $m_koniec;
$praca_start = $data_start . " " . $g_start . ":" . $m_start;
$praca_koniec = $data_koniec . " " . $g_koniec . ":" . $m_koniec;
session_start();
$_SESSION["praca_start"] = $praca_start;
$_SESSION["praca_koniec"] = $praca_koniec;
$_SESSION["data_start"] = $data_start;
$_SESSION["data_koniec"] = $data_koniec;
$_SESSION["godzina_start"] = $godzina_start;
$_SESSION["godzina_koniec"] = $godzina_koniec;
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
        <h1>Podsumowanie</h1>
        <br>
        <p>Zalogowany użytkownik:
            <?php echo $username; ?>
        </p>
        <form method="POST" action="zapis.php">
            <p>Rozpoczęcie pracy:
                <?php echo $praca_start; ?>
            </p>
            <p>Zakończenie pracy:
                <?php echo $praca_koniec; ?>
            </p>
            <br>
            <?php echo "Czy powyższe informacje są poprawne?"; ?>
            </p>
            <input type="submit" value="TAK, zatwierdź">
        </form>
        <br>
        <a href="dodaj.php">Nie, popraw</a>
    </div>
    <div class="footer">
        <p>© 2023 IT.MATT</p>
    </div>
</body>

</html>