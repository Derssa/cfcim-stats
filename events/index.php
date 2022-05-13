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
          <form>
            <input type="date" name="date" id="dateE" required />
          </form>
          <a id="lvj" href="./events.php">Toute la liste</a>
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
          <?php
                $jour=date('Y-m-d',strtotime("-1 days"));
                $sql = "SELECT * FROM events_viewers WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d')";
                $result = $conn->query($sql);
                $vues=$result->num_rows;
          ?>
          <span>Nombre des vues : <?php echo $vues?> vues</span>
          <div class="lwest">
            <table id="events">
              <tr>
                <th>Nom d'événement</th>
                <th>Nom visiteur</th>
              </tr>
              <?php
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row['eventName']."</td>
                    <td>".$row['firstname']." ".$row['lastname']."</td>
                  </tr>";
                  }
                } else {
                  echo "<tr>
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
    var today = new Date();
    today.setDate(today.getDate() - 1);
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
      dd = "0" + dd;
    }
    if (mm < 10) {
      mm = "0" + mm;
    }

    today = yyyy + "-" + mm + "-" + dd;
    document.getElementById("dateE").setAttribute("value", today);
    document.getElementById("dateE").setAttribute("max", today);

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
      $('#dateE').on('change',function(){
        $.ajax({url: "dateE.php?date="+$('#dateE').val(), success: function(result){
          $('#events').html("<tr><th>Nom d'événement</th><th>Nom visiteur</th></tr>"+result)          
        }});
        $.ajax({url: "viewsE.php?date="+$('#dateE').val(), success: function(result){
          $('span').html("Nombre des vues : "+result+" vues")
        }});
      })
    });    
  </script>
</html>
