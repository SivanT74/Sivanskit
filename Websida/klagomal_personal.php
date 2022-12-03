<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/klagomal.css">

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
        <a href="bokaTid.php">Avboka tid</a>
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

        <div class="klagomal-container">
        <table>

            <?php

                $pdo = new PDO('mysql:dbname=grupp3;host=localhost', 'sqllab', 'Hare#2022');

                echo "<tr><th>Omdöme</th><th>Kommentar</th></tr>";

                foreach($pdo->query( "SELECT * FROM Feedback;" ) as $row){
                    echo "<tr>";
                    echo "<td>".$row['Omdome']."</td>";
                    echo "<td>".$row['Kommentar']."</td>";
                    echo "</tr>";
                }

                echo "</th>";
            ?>

        </table>
        </div>


    </div>
</body>

</html>