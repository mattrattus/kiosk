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
        <?php echo "W BUDOWIE"; ?>
        <br>
        <a href="/panel.php">Powrót do panelu</a>
    </div>
    <div class="footer">
        <p>© 2023 IT.MATT</p>
    </div>
</body>

</html>