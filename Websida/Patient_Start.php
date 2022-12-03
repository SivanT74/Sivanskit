<?php
session_start();
$_SESSION['Pnr'];
$_SESSION['Namn'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/barnav.css">
  <title>SellazCo</title>
</head>

<body>
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
    <div class="homepage-button-container">
      <a href="journal.php">Journal</a>
      <a href="bokaTid.php">Boka tid/Avboka</a>
      <a href="journal.php">Prover</a>
      <a href="patientrecept.php">Recept</a>
      <a href="videoChatt.php">Video/Chat</a>
      <a href="boka.php">Besök</a>
      <a href="diabetesdagbok.php">Diabetesdagbok</a>
      <a href="Patient/klagomal.php">Omdöme</a>
    </div>
    <div class="homepage-information">

        <p> Om verksamheten:</p>

        <br>

        <p>På vårdcentralen Hälsa tar vi emot allt från barn, ungdomar till vuxna. 
        Vår fokus står starkt för att erbjuda lättillgänglig vård till kontinuerligt 
        fullfölja en patients process som präglas av omtanke och helhet. 
        </p>
        <br>
        <p> Hos vårdcentralen Hälsa fokuserar vi på bästa möjliga vård, stöd till 
            goda levnadsvanor respektive rehabilitering men även välmående.
            Vi arbetar hårt för att stärka din hälsa och möter dina behov på 
            bästa möjliga sätt.
            Hjälp oss att utvecklas och bli bättre. 
        </p>    

        <br>

        <p> Under klagomål kan du lämna dina synpunkter om vårdcentralen direkt 
            via webben. Men även lägga in önskemål för utveckling. Du kan dessutom 
            informera oss angående dina upplevelser från dina besök.:
        </p>

    </div>
  </div>

  <div class="footer-container">
    <div class="footer-items">
      <p>Adress</p>
      <p>text</p>
    </div>
    <div class="footer-items">
      <p>Telefon mottagning</p>
      <p>0115671</p>
    </div>
    <div class="footer-items">
      <p>Öppettider</p>
      <p>08:00-17:00</p>
    </div>
  </div>
</body>

</html>