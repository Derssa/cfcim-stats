<?php
    session_start();
    if(!$_SESSION['admin_mycfcim_stats']){
        header('location:../admin');      
    }
    $msg='';
    if(isset($_GET['msg'])){
      $msg=$_GET['msg'];
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
    <link rel="stylesheet" href="../css/first.css" />
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
      </div>
      <h2>ADMIN</h2>
      <div class="subMenuAdmin">
          <a style="color: #0c4377" href="#">Ajouter Stats</a>
          <a href="./comptes.php">Comptes</a>
          <a href="./entreprises.php">entreprises</a>
          <a style="color: #e40343" href="./logout.php">Deconnexion</a>
      </div>
      <p id='p' style="color: #ebe54b;font-weight:500;text-align:center;"><?php echo $msg?></p> 
      <div class="excels">               
        <div
          class="body"
          style="
            background-color: rgb(250, 250, 250);
            width: 400px;
            padding: 20px;
            margin: 20px;
            border-radius: 20px;
            box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.4);
          "
        >
          <h4>Ajoutez fichier excel des connexions</h4>
          <form method="POST" action="conExcel.php" enctype="multipart/form-data" onsubmit="handleS('con')">
            <input
              style="width: 350px"
              type="file"
              name="connexions"
              id="connexions"
              accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
              required
            />
            <input
              style="width: 350px"
              type="date"
              id="connexions_date"
              name="connexions_date"
              required
            />
            <img id="loadingC" src="../public/loading.gif" alt="loading" width="120" />   
            <button type="submit">INSEREZ</button>            
          </form>
        </div>
        <div
          class="body"
          style="
            background-color: white;
            width: 400px;
            padding: 20px;
            margin: 20px;
            border-radius: 20px;
            box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.4);
          "
        >
          <h4>Ajoutez fichier excel des événements</h4>
          <form method="POST" action="eventsExcel.php" enctype="multipart/form-data" onsubmit="handleS('eve')">
            <input
              style="width: 350px"
              type="file"
              name="events"
              id="events"
              accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
              required
            />
            <input
              style="width: 350px"
              type="date"
              id="events_date"
              name="events_date"
              required
            />
            <img id="loadingE" src="../public/loading.gif" alt="loading" width="120" /> 
            <button type="submit">INSEREZ</button>
          </form>
        </div>
        <div
          class="body"
          style="
            background-color: white;
            width: 400px;
            padding: 20px;
            margin: 20px;
            border-radius: 20px;
            box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.4);
          "
        >
          <h4>Ajoutez fichier excel des vendeurs & leads</h4>
          <form method="POST" action="VLExcel.php" enctype="multipart/form-data" onsubmit="handleS('vl')">
            <input
              style="width: 350px"
              type="file"
              name="vendeurs"
              id="vendeurs"
              accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
              required
            />
            <input
              style="width: 350px"
              type="date"
              id="vendeurs_date"
              name="vendeurs_date"
              required
            />
            <img id="loadingV" src="../public/loading.gif" alt="loading" width="120" /> 
            <button type="submit">INSEREZ</button>
          </form>
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
    document.getElementById("connexions_date").setAttribute("value", today);
    document.getElementById("events_date").setAttribute("value", today);
    document.getElementById("vendeurs_date").setAttribute("value", today);
    document.getElementById("connexions_date").setAttribute("max", today);
    document.getElementById("events_date").setAttribute("max", today);
    document.getElementById("vendeurs_date").setAttribute("max", today);

    document.getElementById("loadingC").style.display="none";
    document.getElementById("loadingE").style.display="none";
    document.getElementById("loadingV").style.display="none";    
    function handleS(e){
      var buttons = document.getElementsByTagName("button");
      document.getElementById("p").style.display="none";
      for (i = 0; i < buttons.length; i++) {
          buttons[i].disabled = true;
          buttons[i].style.backgroundColor = "#dfdda5";
      }
      if(e=="con"){
        document.getElementById("loadingC").style.display="block";
      }
      if(e=="eve"){
        document.getElementById("loadingE").style.display="block";
      }
      if(e=="vl"){
        document.getElementById("loadingV").style.display="block";
      }
    }
  </script>
</html>
