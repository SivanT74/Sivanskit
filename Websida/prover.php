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
    <div class="journal-notes-container">
      <h1>Prover</h1>
      <?php
        $_SESSION["Namn"] = "Desiree";
        

        //Här är felmeddelande
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        //Sätts en liten fil på dator med inlogg?
        $cookiepath = "/tmp/cookies.txt";
        $tmeout = 3600; // (3600=1hr)
        // här sätter ni er domän
        $baseurl = 'http://193.93.250.83/'; 
        

        try {
          $ch = curl_init($baseurl . 'api/method/login');
        } catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"usr":"a21abdhu@student.his.se", "pwd":"Högskolan123"}'); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath);
        curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $response = json_decode($response, true);

        $error_no = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if (!empty($error_no)) {
        echo "<div style='background-color:red'>";
        echo '$error_no<br>';
        var_dump($error_no);
        echo "<hr>";
        echo '$error<br>';
        var_dump($error);
        echo "<hr>";
        echo "</div>";
        }

        // echo "<div style='background-color:lightgray; border:1px solid black'>";
        // echo '$response<br><pre>';
        // echo print_r($response) . "</pre><br>";
        // echo "</div>";
        $patient = "Desiree";
      
        $ch = curl_init($baseurl . 'api/resource/Patient%20Medical%20Record?fields=[%22name%22,%22reference_name%22,%22modified%22,%20%22patient%22,%20%22reference_doctype%22,%20%22communication_date%22,%20%22subject%22,%20%22status%22]&filters=[[%22patient%22,%20%22=%22,%20%22Desiree%22]]');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath);
        curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        $response = curl_exec($ch);
        //echo $response;
        $response = json_decode($response, true);
        $error_no = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if (!empty($error_no)) {
          echo "<div style='background-color:red'>";
          echo '$error_no<br>';
          var_dump($error_no);
          echo "<hr>";
          echo '$error<br>';
          var_dump($error);
          echo "<hr>";
          echo "</div>";
        }
        // echo "<div style='background-color:lightgray; border:1px solid black'>";
        // echo '$response<br><pre>';
        // echo print_r($response) . "</pre><br>";
        // echo "</div>";
        echo "<form action='' method='POST'>";
        echo "<select name='name' id='name'>";
        foreach($response['data'] AS $key => $value){

          if ($value['reference_doctype']=="Lab Test") {
          
            echo '<option value="'.$value['name'].'">';
          echo $value['reference_doctype']. ": " .date('Y-m-d H:i', strtotime($value['modified']));
          echo "</option>";
          }

          

        }
        echo "</select>";
        echo "<input type='submit'>";
        echo "</form>";

        // echo $_POST['name'];
        echo "<br>";
        if (isset($_POST['name'])) {

          
          

          foreach($response['data'] AS $key => $value){

            if ($value['name']==$_POST['name']& $value['reference_doctype']=="Lab Test") {
              $labtid = $value['reference_name'];
            }

    

          

          }
          
          
          echo $labtid;
        
        }



      ?>
      <!-- <form method="post" action="">
      <input type="date" name="datum" id="">
      <input type="time" name="time">
      <button>Hämta</button>
      </form> -->
    </div>
    <div class="journal-add-notes-container">
      <h3 class="journal-doctor-signed">Signerad av Läkare</h3>
      <div class="journal-add-notes-second-section">
        <h2>Prov resultat</h2>
        <?php
        
        if (!empty($labtid)) {
          $ch = curl_init($baseurl . '/api/resource/Lab%20Test/'.$labtid.'');

          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
          curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
          curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath);
          curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath);
          curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


          $response = curl_exec($ch);
          //echo $response;
          $response = json_decode($response, true);
          $error_no = curl_errno($ch);
          $error = curl_error($ch);
          curl_close($ch);

          if (!empty($error_no)) {
            echo "<div style='background-color:red'>";
            echo '$error_no<br>';
            var_dump($error_no);
            echo "<hr>";
            echo '$error<br>';
            var_dump($error);
            echo "<hr>";
            echo "</div>";
          }

          foreach ($response['data'] as $key => $value) {
            if ($key=="normal_test_items") {

              echo "<div>";
              echo "<table><th>Datum</th><th>Typ</th><th>Prov</th><th>Resultatsvärde</th><th>Mått</th><th>Normalsvärde</th><th>Referensmall</th>";
                  foreach($value AS $keys => $values){
                    echo "<tr>";
                    echo "<td>";
                    echo $values["modified"];
                    echo "</td>";
                    echo "<td>";
                    echo $values["parenttype"];
                    echo "</td>";
                    echo "<td>";
                    echo $values["lab_test_name"];
                    echo "</td>";
                    echo "<td>";
                    echo $values["result_value"];
                    echo "</td>";
                    echo "<td>";
                    echo $values["lab_test_uom"]; 
                    echo "</td>";
                    echo "<td>";
                    echo $values["normal_range"]; 
                    echo "</td>";
                    echo "<td>";
                    echo $values["template"]; 
                    echo "</td>";
                    
                    echo "</tr>";
                  }
                  echo "</table>";
                  echo "</div>";

              // print_r($value);
            }
          }
          

        
        }else {
          
          echo "Inga provresultat att visa";

          $ch = curl_init($baseurl . '/api/resource/Lab%20Test?fields=[%22name%22,%22modified%22,%20%22patient%22,%20%22status%22]&filters=[[%22patient%22,%20%22=%22,%20%22Desiree%22]]');

          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
          curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
          curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath);
          curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath);
          curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


          $response = curl_exec($ch);
          // echo $response;
          $response = json_decode($response, true);
          $error_no = curl_errno($ch);
          $error = curl_error($ch);
          curl_close($ch);

          if (!empty($error_no)) {
            echo "<div style='background-color:red'>";
            echo '$error_no<br>';
            var_dump($error_no);
            echo "<hr>";
            echo '$error<br>';
            var_dump($error);
            echo "<hr>";
            echo "</div>";
          }

          foreach ($response['data'] as $key => $value) {
            

             echo "<div>";
             echo "<table><th>Datum</th><th>Typ</th><th>Prov</th>";
                 
              echo "<tr>";
              echo "<td>";
              echo $value["name"];
              echo "</td>";
              echo "<td>";
              echo $value["modified"];
              echo "</td>";
              echo "<td>";
              echo $value["status"];
              echo "</td>";
    
              
              echo "</tr>";
            
              echo "</table>";
              echo "</div>";

          //     // print_r($value);
          //   
          }
          
        }

        ?>
        
        <!-- <p>text...</p> -->
      </div>
      
      <h2>Referensintervaller(se diagram nedanför)</h2>


    </div>
  </div>
</body>

</html>