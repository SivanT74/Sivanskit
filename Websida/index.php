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
$pdo = new PDO('mysql:dbname=grupp3;host=localhost', 'sqllab', 'Hare#2022');
if (isset($_POST["typ"])){
    if ($_POST["typ"] == "Patient"){
        if (!empty($_POST)) {
        $pnr = $_POST["Pnr"];
        $sql = "SELECT Pnr, Namn FROM Patient WHERE Pnr = '$pnr'";
        foreach ($pdo->query($sql) as $row) {
            if ($row["Pnr"] == $pnr) {
                session_start();
                $_SESSION["Pnr"] = $row["Pnr"];
                $_SESSION["Namn"] = $row["Namn"];
                header("Location: Patient_Start.php");
            }
        } 
        }
    }
    if ($_POST["typ"] == "Personal"){
        if (!empty($_POST)) {
        $pnr = $_POST["Pnr"];
        $sql = "SELECT Pnr FROM Vardpersonal WHERE Pnr = '$pnr'";
        foreach ($pdo->query($sql) as $row) {
            if ($row["Pnr"] == $pnr) {
                session_start();
                $_SESSION["Pnr"] = $row["Pnr"];
                header("Location: klagomal.php");
            }
        } 
        }
    }
}

    



if (!empty($pnr)) {
    echo "<div style='background-color:red'>";
    echo 'Personumret existerar ej!!! <br>';
    echo "</div>";
  }
  
?>

    <div class="wrapper">
    <form action="" method="post">
    <input type="text" name="Pnr" id="">
    <input type="submit" value="logga in">
    <select name="typ">
        <option>Patient</option>
        <option>Personal</option>
    </select>
</form>

<form action="" method="post">
    <input type="submit" name="logout" value="logga ut">
</form> 


    </div>
   

    <a href="index.php">till sida 2</a>
  </div>
</body>

</html>