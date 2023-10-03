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
    <h2>
      <?php echo $username; ?> - uzupełnij godziny pracy.
    </h2>
    <br>
    <form action="podsumowanie.php" method="POST">
      <p><b>Dzień rozpoczęcia pracy:</b>
        <select id=data_start name=data_start>
          <?php
          echo "<option selected>" . date("Y-m-d", time()) . "</option>\n";
          echo "<option>" . date("Y-m-d", time() - 24 * 3600) . "</option>\n";
          ?>
        </select>
        <td style="vertical-align: top;">
          <p><b>Godzina rozpoczęcia pracy:</b>
            <select name="g_start">
              <option selected value="00">00</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
            </select>
            :
            <select name="m_start">
              <option selected value="00">00</option>
              <option value="30">30</option>
            </select>
          </p>
          <hr>
          <p><b>Dzień zakończenia pracy:</b>
            <select id=select1 name=data_koniec>
              <?php
              echo "<option>" .
                  date("Y-m-d", time() + 24 * 3600) .
                  "</option>\n";
              echo "<option selected>" . date("Y-m-d", time()) . "</option>\n";
              echo "<option>" .
                  date("Y-m-d", time() - 24 * 3600) .
                  "</option>\n";
              ?>
            </select>
          </p>
          <p><b>Godzina zakończenia pracy:</b>
            <select name="g_koniec">
              <option selected value="00">00</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
            </select>
            :
            <select name="m_koniec">
              <option selected value="00">00</option>
              <option value="30">30</option>
            </select>
        </td>
        <hr>
        <input type="submit" value="Podsumuj">
    </form>
    <br>
  </div>
  <div class="instrukcja">
    <?php echo "!!! UWAGA - WAŻNE !!!"; ?>
    <br><br>
  </div>
  <div class="default">
    <?php echo "Jeżeli praca trwała DO północy (00:00:00) to jest TO NASTĘPNY DZIEŃ!" .
        "<br>"; ?>
    <br><br><br>
    <a href="/panel.php">Powrót do panelu</a>
  </div>
  <div class="footer">
    <p>© 2023 IT.MATT</p>
  </div>
</body>

</html>