<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/navbar.css">
  <title>SellazCo</title>
</head>

<body>
<?php
        if(isset($_SESSION['status'])){
            echo "<h4>".$_SESSION['status']."</h4>";
            unset($_SESSION['status']);
        }


        
    ?>


<div class="navbar">
    <a href="index.php">Hem</a>
    <div class="dropdown">
      <button class="dropbtn">Journal</button>
      <div class="dropdown-content">
        <a href="journal.php">Prover</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Tidsbokning</button>
      <div class="dropdown-content">
        <a href="BokaTidAvboka.php">Avboka tid</a>
        <a href="bokaTid.php">Boka tid</a>
        <a href="bokaTid.php">Ombokning</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Recept</button>
      <div class="dropdown-content">
        <a href="patientrecept.php">Förnya</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Övrigt</button>
      <div class="dropdown-content">
        <a href="bokaTid.php">Besök</a>
        <a href="videoChatt.php">Videosamtal</a>
        <a href="videoChatt.php">Chat</a>
        <a href="diabetesdagbok.php">Diabetes Dagbok</a>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="diabetesdagbok-container">

      <h1 style="text-align: center;">Diabetesdagbok</h1>
      <form action="tack.php" method="post" style="width: 80%;margin: 0 auto;">
      <div class="diabetesdagbok-third-section">
          <label for="">Personummer:</label>
          <input type="text" name="pnr" placeholder="XXXXXX-YYYY">
        </div>
        <div class="diabetesdagbok-first-section">
          <label for="feels">Hur är ditt mående idag?</label>
          <textarea name="Diabetes" id="feels" cols="30" rows="10" placeholder="text..."
            class="diabetesdagbok-first-section-textarea"></textarea>
        </div>
        <div class="diabetesdagbok-second-section">
          <label for="">Vilken dag är det idag?</label>
          <input type="text" name="Dag" placeholder="Datum">
        </div>
        <div class="diabetesdagbok-third-section">
          <label for="">Ditt sockervärde</label>
          <input type="text" name="socker" placeholder="mmol/L">
        </div>
        <div class="diabetesdagbok-fourth-section">
          <label for="">Har du tagit insulin vid måltid?</label>
          <div>
            <div class="diabetesdagbok-fourth-section-radio-buttons">
              <input type="radio" name="insulin" <?php if (isset($insulin) && $insulin=="1") echo "checked";?> value="1">Ja
            </div>
            <div class="diabetesdagbok-fourth-section-radio-buttons">
              <input type="radio" name="insulin" <?php if (isset($insulin) && $insulin=="0") echo "checked";?> value="0">Nej
            </div>
          </div>
        </div>
        <div class="diabetesdagbok-fifth-section">
          <div class="diabetesdagbok-fifth-section-left-side">
            <label for="problem">Problem</label>
            <textarea name="Problem" id="problem" cols="30" rows="10" placeholder="text..."></textarea>
          </div>
          <div class="diabetesdagbok-fifth-section-right-side">
            <label for="kommentar">Kommentar</label>
            <textarea name="Kommentar" id="kommentar" cols="30" rows="10" placeholder="text..."></textarea>
          </div>
        </div>
        <button class="diabetesdagbok-form-button" name="skicka">Lämna in</button>
      </form>
    </div>
  </div>


</body>

</html>