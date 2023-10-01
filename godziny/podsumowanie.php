<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: dodaj.php");
    exit();
}

$start_dzien = ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21'];
$start_noc_przed = ['22', '23'];
$start_noc_po = ['00', '01', '02', '03', '04', '05'];
$koniec_dzien = ['07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22'];
$koniec_noc_przed = ['23'];
$koniec_noc_po = ['00', '01', '02', '03', '04', '05', '06'];

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

if (in_array($g_start, $start_noc_po) && in_array($g_koniec, $koniec_dzien)) {
    $ilosc_noc = 6 - $g_start;
    $ilosc_dzien = $g_koniec - 6;
} elseif (
    in_array($g_start, $start_noc_po) &&
    in_array($g_koniec, $koniec_noc_przed)
) {
    $ilosc_noc_a = 6 - $g_start;
    $ilosc_noc_b = $g_koniec - 22;
    $ilosc_noc = $ilosc_noc_a + $ilosc_noc_b;
    $ilosc_dzien = 16;
} elseif (
    in_array($g_start, $start_dzien) &&
    in_array($g_koniec, $koniec_dzien)
) {
    $ilosc_noc = 0;
    $ilosc_dzien = $g_koniec - $g_start;
} elseif (
    in_array($g_start, $start_dzien) &&
    in_array($g_koniec, $koniec_noc_przed)
) {
    $ilosc_noc = $g_koniec - 22;
    $ilosc_dzien = 22 - $g_start;
} elseif (
    in_array($g_start, $start_dzien) &&
    in_array($g_koniec, $koniec_noc_po)
) {
    $ilosc_noc_a = 22 + $g_koniec;
    $ilosc_noc = $ilosc_noc_a - 20;
    $ilosc_dzien = 22 - $g_start;
} elseif (
    in_array($g_start, $start_noc_przed) &&
    in_array($g_koniec, $koniec_noc_po)
) {
    $ilosc_noc_a = 24 - $g_start;
    $ilosc_noc = $ilosc_noc_a + $g_koniec;
    $ilosc_dzien = 0;
} elseif (
    in_array($g_start, $start_noc_przed) &&
    in_array($g_koniec, $koniec_dzien)
) {
    $ilosc_noc_a = 24 - $g_start;
    $ilosc_noc = $ilosc_noc_a + 6;
    $ilosc_dzien = $g_koniec - 6;
}

$suma_pracy = $ilosc_noc + $ilosc_dzien;

$_SESSION["suma_pracy"] = $suma_pracy;
$_SESSION["ilosc_dzien"] = $ilosc_dzien;
$_SESSION["ilosc_noc"] = $ilosc_noc;
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
            <?php echo "Suma godzin pracy: $suma_pracy"; ?>
            <br>
            <?php echo "- zmiana dzienna: $ilosc_dzien"; ?>
            <br>
            <?php echo "- zmiana nocna: $ilosc_noc"; ?>
            <br><br>
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