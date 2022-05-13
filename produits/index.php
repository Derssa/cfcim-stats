<?php
session_start();
    if(!$_SESSION['MyCFCIM_id']){
        header('location:../');      
    }
    include '../php/db.php';
    $prenom='';
    $type='';
    $id=$_SESSION['MyCFCIM_id']['id'];
    $mycfcim='';
    $sql = "SELECT prenom,type,internal_id FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $prenom=$row['prenom'];
        $type=$row['type'];
        $_SESSION['MyCFCIM_id']['cfcim']=$row['internal_id'];
        $mycfcim=$_SESSION['MyCFCIM_id']['cfcim'];
      }
    }
    if($type==4){
      header('location:../entreprise');
    }
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
          <a href="../events">Événements</a>
          <a style="color: #ebe54b" href="#">Vendeurs & Leads</a>
        </div>
        <div class="subMenu">
          <a href="../entreprise">Entreprise</a>
          <a style="color: #0c4377" href="#">Produits</a>
          <a href="../documents">Documents</a>
          <a href="../publicité">Publicité</a>
        </div>
        <div class="lwest">
          <form>
            <span>*Liste des produits qui ont étés ouverts le jour </span>
            <input type="date" name="date" id="date" required />
          </form>
          <?php
                $jour=date('Y-m-d',strtotime("-1 days"));
                if($type==2){
                  $sql = "SELECT * FROM product WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d')";
                  $result = $conn->query($sql);
                }else if($type>2){
                  $sql = "SELECT * FROM product WHERE jour=STR_TO_DATE('$jour', '%Y-%m-%d') AND internal_id='$mycfcim'";
                  $result = $conn->query($sql);
                } ?>
          <table id="customers">
            <tr>
              <th>Produits</th>
              <th>Visites</th>
              <th>Visiteurs</th>
            </tr>
            <?php
                if ($result->num_rows > 0) { // output data of each row
            while($row = $result->fetch_assoc()) { echo "
            <tr>
              <td>".$row['product_Name']."</td>
              <td>".$row['Views']."</td>
              <td>".$row['First_name']." ".$row['Last_name']."</td>
            </tr>
            "; } } else { echo "
            <tr>
              <td>Pas de resultat</td>
              <td>Pas de resultat</td>
              <td>Pas de resultat</td>
            </tr>
            "; } $conn->close(); ?>            
          </table>
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
    document.getElementById("date").setAttribute("value", today);
    document.getElementById("date").setAttribute("max", today);

    $(document).ready(function () {
      $('#date').on('change',function(){
        $.ajax({url: "date.php?date="+$('#date').val(), success: function(result){
          $('#customers').html("<tr><th>Produits</th><th>Visites</th><th>Visiteurs</th></tr>"+result)          
        }});
      })
    });
  </script>
</html>
