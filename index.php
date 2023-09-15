<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIOSK - panel pracownika</title>
    <link rel="stylesheet" type="text/css" href="/styles.css">
</head>

<body>
    <div class="top">
        <br>
        KIOSK
        <br><br>
    </div>
    <div class="default">
        <?php
        require_once "db_config.php";
        $sql = "SELECT username FROM users ORDER BY username ASC";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            echo "<form action='login.php' method='post'>";
            echo "<label>Login: </label>";
            echo "<select name='username'>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" .
                    $row["username"] .
                    "'>" .
                    $row["username"] .
                    "</option>";
            }
            echo "</select>";
            echo "<br><br>";
            echo "<label>Hasło: </label>";
            echo "<input type='password' name='password' />";
            echo "<br><br>";
            echo "<input type='submit' value='Zaloguj' />";
            echo "</form>";
        } else {
            echo "Brak użytkowników w bazie danych.";
        }
        $mysqli->close();
        ?>
    </div>
    <br><br><br><br><br>
    <div class="instrukcja">
        <b>Uwaga! Kluczowa zmiana w zapisie godzin.</b>
    </div>
    <div class="footer">
        <p>© 2023 IT.MATT</p>
        <a href="https://seohost.pl/?ref=18897" rel="nofollow"><img src="img/seohost_1.png" alt="SeoHost.pl"></a>
    </div>
</body>

</html>