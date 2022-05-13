<?php
session_start();
    if(!$_SESSION['MyCFCIM_id']){
        header('location:../');      
    }
    include '../php/db.php';
    $prenom='';
    $id=$_SESSION['MyCFCIM_id']['id'];
    $sql = "SELECT prenom FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $prenom=$row['prenom'];
      }
    }
?>
<?php
include '../php/db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../public/icon.png" />
    <link rel="stylesheet" href="../css/wave.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/vl.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    />
    <title>MyCFCIM Stats</title>
    <style>
      tr td:first-child{
        font-weight:500;
      }
    </style>
  </head>
  <body>
    <div class="waveWrapper waveAnimation">
      <div class="waveWrapperInner bgTop">
        <div
          class="wave waveTop"
          style="background-image: url('../public/wave-top.png')"
        ></div>
      </div>
      <div class="waveWrapperInner bgMiddle">
        <div
          class="wave waveMiddle"
          style="background-image: url('../public/wave-mid.png')"
        ></div>
      </div>
      <div class="waveWrapperInner bgBottom">
        <div
          class="wave waveBottom"
          style="background-image: url('../public/wave-bot.png')"
        ></div>
      </div>
    </div>
    <div class="app">
      <div class="header">
        <img src="../public/logo.png" alt="logo" width="300" />
        <span>Bienvenue <?php echo $prenom?></span>
        <a id="deconnexion" href="../deconnexion.php">Deconnecter</a>
      </div>
      <div class="body">
        <div class="menu">
          <a href="../home">Acceuil</a>
          <a style="color: #ebe54b" href="#">Événements</a>
          <a href="../entreprise">Vendeurs & Leads</a>
        </div>
        <div class="lwest">          
          <a id="lvj" href="./">Liste des vues pour chaque jour</a>
            <select id="tri" name="tri">
              <option value="">Selectionner Tri</option>
              <option value="1">Tri par noms A-Z</option>
              <option value="2">Tri par noms Z-A</option>
              <option value="3">Tri par derniers événements</option>
              <option value="4">Tri par premiers événements</option>
              <option value="5">Tri par les plus vues</option>
              <option value="6">Tri par les moins vues</option>
            </select>
          <input
            style="
              margin: 25px 0;
              border: none;
              border-radius: 10px;
              outline: none;
              padding: 7px;
              background-color: #eee;
              box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);
            "
            type="text"
            id="search"
            placeholder="Recherche"
          />
          <div class="lwest">
            <table id="events">
              <tr>
                <th>Nom d'événement</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th>Location</th>
                <th>Type</th>
                <th>Nombre d’inscrit</th>
              </tr>
              <?php
                $sql = "SELECT * FROM events";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row['Title']."</td>
                    <td>".$row['Start_date']."</td>
                    <td>".$row['End_date']."</td>
                    <td>".$row['Location']."</td>
                    <td>".$row['Type']."</td>
                    <td>".$row['Registered_attendees']."</td>
                  </tr>";
                  }
                } else {
                  echo "<tr>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                    <td>Pas de resultat</td>
                  </tr>";
                }
                $conn->close();
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>   
    $(document).ready(function () {
      $("#search").val("");
      $("#search").on("keyup", function () {
        var value = $(this).val().toLowerCase();

        $("table tr").each(function (index) {
          if (index !== 0) {
            $row = $(this);
            var id = $row.find("td:first").text().toLowerCase();

            if (id.indexOf(value) === 0) {
              $row.show();
            } else {
              $row.hide();
            }
          }
        });
      });
      $("#tri").on('change',function(){
        $.ajax({url: "tri.php?type="+$('#tri').val(), success: function(result){
          $('#events').html("<tr><th>Nom d'événement</th><th>Date debut</th><th>Date fin</th><th>Location</th><th>Type</th><th>Nombre d’inscrit</th></tr>"+result)          
        }});
      })
    });    
  </script>
</html>