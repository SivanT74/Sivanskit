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

      <table border='1'> 

<?php


    $pdo = new PDO('mysql:dbname=grupp3;host=localhost', 'sqllab', 'Hare#2022');


    echo "<tr><th>Pnr</th><th>Mående</th><th>Datum</th><th>Sockervärde</th><th>Insulin</th><th>Problem</th><th>Kommentar</th>";
    foreach($pdo->query( "SELECT * FROM Diabetesdagbok;" ) as $row){
        echo "<tr>";
        echo "<td>".$row['Pnr']."</td>";
        echo "<td>".$row['Mående']."</td>";
        echo "<td>".$row['Datum']."</td>";
        echo "<td>".$row['Sockervarde']."</td>";
        echo "<td>".$row['Insulin']."</td>";
        echo "<td>".$row['Problem']."</td>";
        echo "<td>".$row['Kommentar']."</td>";

        echo "</tr>";
    }

    echo "</th>";
?>
    </div>
  </div>


</body>

</html>