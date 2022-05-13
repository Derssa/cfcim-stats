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
          <a style="color: #ebe54b" href="#">Acceuil</a>
          <a href="../events">Événements</a>
          <a href="../entreprise">Vendeurs & Leads</a>
        </div>
        <div class="content">
          <form action="" id="ftime">
            <select id="time" name="time">
              <option value="1">Hier</option>
              <option value="7" selected>Dernier 7 jours</option>
              <option value="30">Dernier 30 jours</option>
            </select>
          </form>
          <button id="pdf">Télécharger PDF</button>
          <form action="" id="fdate">
            <label for="de">De:</label>
            <input
              type="date"
              name="startDate"
              id="startDate"
              min="2021-03-01"
              onchange="changeDate()"
              required
            />
            <label for="de">À:</label>
            <input
              type="date"
              name="endDate"
              id="endDate"
              min="2021-03-01"
              onchange="changeDate()"
              required
            />
            <button type="button" id="submit">envoyer</button>
          </form>
          <h4>Connexions:</h4>
          <div class="charts" id="charts">
            <div class="chart">
              <div class="chart_head">
                <div>
                  <span>Nombre d’utilisateurs actifs : </span><span id="tactif"></span>
                </div>
                <button id="bactif">Ligne</button>
              </div>
              <canvas height="200" id="chartActif"></canvas>
            </div>
            <div class="chart">
              <div class="chart_head">
                <div>
                  <span>Connexions sur PC : </span><span id="tpc"></span>
                </div>
                <button id="bpc">Ligne</button>
              </div>
              <canvas height="200" id="chartPC"></canvas>
            </div>
            <div class="chart">
              <div class="chart_head">
                <div>
                    <span>Connexions sur Android : </span><span id="tandroid"></span>
                </div>
                <button id="bandroid">Ligne</button>
              </div>
              <canvas height="200" id="chartAndroid"></canvas>
            </div>
            <div class="chart">
              <div class="chart_head">
                <div>
                    <span>Connexions sur IOS : </span><span id="tios"></span>
                </div>
                <button id="bios">Ligne</button>
              </div>
              <canvas height="200" id="chartIOS"></canvas>
            </div>
            <div class="chart">              
              <div class="chart_head">
                <div>
                    <span>Total Connexions : </span><span id="tconnexions"></span>
                </div>
              </div>
              <canvas height="200" id="chartTotalC"></canvas>
            </div>
          </div>
          <h4>Fonctionnalités:</h4>
          <div class="charts" id="charts">
            <div class="chart" style="width: 800px; height: 550px">
              <div class="chart_head">
                <span>Nombre de visite de chaque rubrique :</span>
                <button id="brub">Ligne</button>
              </div>
              <canvas height="190" id="chartRub"></canvas>
            </div>
          </div>

          <h4>Networking:</h4>
          <div class="charts" id="charts">
            <div class="chart">
              <div class="chart_head">
                <div>
                    <span>Demandes de contacts envoyées : </span><span id="tdc"></span>
                </div>
                <button id="bcont">Ligne</button>
              </div>
              <canvas height="200" id="chartCont"></canvas>
            </div>
            <div class="chart">
              <div class="chart_head">
                <div>
                    <span>Nombre de rendez-vous : </span><span id="trv"></span>
                </div>
                <button id="brd">Ligne</button>
              </div>
              <canvas height="200" id="chartRD"></canvas>
            </div>
            <div class="chart">
              <div class="chart_head">
                <div>
                    <span>Nombre de messages : </span><span id="tnm"></span>
                </div>
                <button id="bmess">Ligne</button>
              </div>
              <canvas height="200" id="chartMess"></canvas>
            </div>
            <div class="chart">
              <div class="chart_head">
                <div>
                    <span>Nombre d’appels vidéos : </span><span id="tnav"></span>
                </div>
                <button id="bav">Ligne</button>
              </div>
              <canvas height="200" id="chartAV"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img src="../public/upArrow.png" alt="topScroll" width="65" id="top" />
  </body>
  <script>
    var today = new Date();
    today.setDate(today.getDate() - 1);
    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 7);
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    var ydd = yesterday.getDate();
    var ymm = yesterday.getMonth() + 1; //January is 0!
    var yyyyy = yesterday.getFullYear();
    if (dd < 10) {
      dd = "0" + dd;
    }
    if (mm < 10) {
      mm = "0" + mm;
    }
    if (ydd < 10) {
      ydd = "0" + ydd;
    }
    if (ymm < 10) {
      ymm = "0" + ymm;
    }

    today = yyyy + "-" + mm + "-" + dd;
    yesterday = yyyyy + "-" + ymm + "-" + ydd;
    document.getElementById("startDate").setAttribute("max", today);
    document.getElementById("startDate").setAttribute("value", yesterday);
    document.getElementById("endDate").setAttribute("max", today);
    document.getElementById("endDate").setAttribute("value", today);
    document.getElementById("endDate").setAttribute("min", document.getElementById("startDate").value);

    function changeDate() {
      document
        .getElementById("endDate")
        .setAttribute("min", document.getElementById("startDate").value);
      document
        .getElementById("startDate")
        .setAttribute("max", document.getElementById("endDate").value);
    }
    
    <?php
    include "../php/db.php";
    $actifLabel=[];
    $actifData=[];
    $pcData=[];
    $iosData=[];
    $androidData=[];
    $EOData=[];
    $cfcimvData=[];
    $DSEData=[];
    $BPData=[];
    $EBData=[];
    $MData=[];
    $SLData=[];
    $EPData=[];
    $VPData=[];
    $PNData=[];
    $RCData=[];
    $TFEData=[];
    $EVData=[];
    $GPData=[];
    $KData=[];
    $DCData=[];
    $RVData=[];
    $NMData=[];
    $NAVData=[];
    $totalActif=0;
    $totalPc=0;
    $totalIos=0;
    $totalAndroid=0;
    $totalDC=0;
    $totalRV=0;
    $totalNM=0;
    $totalNAV=0;

    $sql = "SELECT * FROM connexions ORDER BY jour DESC LIMIT 7";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $totalActif+=$row["active_users"];
        $totalPc+=$row["pc"];
        $totalIos+=$row["ios"];
        $totalAndroid+=$row["android"];
        $totalDC+=$row["Demandes_contacts"];
        $totalRV+=$row["rendez_vous"];
        $totalNM+=$row["Nombre_messages"];
        $totalNAV+=$row["Nombre_appels_videos"];
        array_unshift($actifLabel,$row["jour"]);
        array_unshift($actifData,$row["active_users"]);
        array_unshift($pcData,$row["pc"]);
        array_unshift($iosData,$row["ios"]);
        array_unshift($androidData,$row["android"]);
        array_unshift($EOData,$row["Evenements_ouverts"]);
        array_unshift($cfcimvData,$row["CFCIM_en_video"]);
        array_unshift($DSEData,$row["Demandes_stages_emplois"]);
        array_unshift($BPData,$row["BOUTIQUE_produits"]);
        array_unshift($EBData,$row["ECOPARC_BERRECHID"]);
        array_unshift($MData,$row["MEDIATION"]);
        array_unshift($SLData,$row["Seminaire_en_ligne"]);
        array_unshift($EPData,$row["Evenements_passes"]);
        array_unshift($VPData,$row["Village_partenaires"]);
        array_unshift($PNData,$row["Participants_networking"]);
        array_unshift($RCData,$row["Revue_conjoncture"]);
        array_unshift($TFEData,$row["Team_France_Export"]);
        array_unshift($EVData,$row["Evenements_venir"]);
        array_unshift($GPData,$row["Guide_privileges"]);
        array_unshift($KData,$row["Kluster_CFCIM"]);
        array_unshift($DCData,$row["Demandes_contacts"]);
        array_unshift($RVData,$row["rendez_vous"]);
        array_unshift($NMData,$row["Nombre_messages"]);
        array_unshift($NAVData,$row["Nombre_appels_videos"]);
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
    $('#tactif').text(<?php echo  $totalActif;?>);
    $('#tpc').text(<?php echo  $totalPc;?>);
    $('#tios').text(<?php echo  $totalIos;?>);
    $('#tandroid').text(<?php echo  $totalAndroid;?>);
    $('#tconnexions').text(<?php echo  $totalPc+$totalIos+$totalAndroid;?>);
    $('#tdc').text(<?php echo  $totalDC;?>);
    $('#trv').text(<?php echo  $totalRV;?>);
    $('#tnm').text(<?php echo  $totalNM;?>);
    $('#tnav').text(<?php echo  $totalNAV;?>);

    const configActif = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifLabel);?>,
        datasets: [
          {
            label: "Nombre d’utilisateurs actifs",
            data: <?php echo json_encode($actifData);?>,
            backgroundColor: "#00565699",
            borderColor: "#005656",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#000",
          },
        },
      },
    };

    const configPC = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifLabel);?>,
        datasets: [
          {
            label: "Nombre de connexion sur PC",
            data: <?php echo json_encode($pcData);?>,
            backgroundColor: "#ebe54b99",
            borderColor: "#ebe54b",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#000",
          },
        },
      },
    };

    const configAndroid = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifLabel);?>,
        datasets: [
          {
            label: "Nombre de connexion sur Android",
            data: <?php echo json_encode($androidData);?>,
            backgroundColor: "#0c437799",
            borderColor: "#0c4377",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#000",
          },
        },
      },
    };

    const configIos = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifLabel);?>,
        datasets: [
          {
            label: "Nombre de connexion sur IOS",
            data: <?php echo json_encode($iosData);?>,
            backgroundColor: "#e4034399",
            borderColor: "#e40343",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#000",
          },
        },
      },
    };

    const configRub = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifLabel);?>,
        datasets: [
          {
            label: "Evènements ouverts",
            data: <?php echo json_encode($EVData);?>,
            backgroundColor: "#0c437702",
            borderColor: "#0c4377",
            borderWidth: 2,
          },
          {
            label: "La CFCIM en vidéo",
            data: <?php echo json_encode($cfcimvData);?>,
            backgroundColor: "#e4034302",
            borderColor: "#e40343",
            borderWidth: 2,
          },
          {
            label: "Demandes stages-emplois",
            data: <?php echo json_encode($DSEData);?>,
            backgroundColor: "#e9800102",
            borderColor: "#e98001",
            borderWidth: 2,
          },
          {
            label: "La BOUTIQUE (Produits)",
            data: <?php echo json_encode($BPData);?>,
            backgroundColor: "#e63a1102",
            borderColor: "#e63a11",
            borderWidth: 2,
          },
          {
            label: "ECOPARC DE BERRECHID",
            data: <?php echo json_encode($EBData);?>,
            backgroundColor: "#8ec89902",
            borderColor: "#8ec899",
            borderWidth: 2,
          },
          {
            label: "MEDIATION",
            data: <?php echo json_encode($MData);?>,
            backgroundColor: "#530a2c02",
            borderColor: "#530a2c",
            borderWidth: 2,
          },
          {
            label: "Séminaire d'initiation en ligne",
            data: <?php echo json_encode($SLData);?>,
            backgroundColor: "#424b5502",
            borderColor: "#424b55",
            borderWidth: 2,
          },
          {
            label: "Evènements passés",
            data: <?php echo json_encode($EPData);?>,
            backgroundColor: "#9d251502",
            borderColor: "#9d2515",
            borderWidth: 2,
          },
          {
            label: "Village partenaires",
            data: <?php echo json_encode($VPData);?>,
            backgroundColor: "#458fcc02",
            borderColor: "#458fcc",
            borderWidth: 2,
          },
          {
            label: "Participants et networking",
            data: <?php echo json_encode($PNData);?>,
            backgroundColor: "#a5c61402",
            borderColor: "#a5c614",
            borderWidth: 2,
          },
          {
            label: "Revue conjoncture",
            data: <?php echo json_encode($RCData);?>,
            backgroundColor: "#ebe54b02",
            borderColor: "#ebe54b",
            borderWidth: 2,
          },
          {
            label: "Team France Export",
            data: <?php echo json_encode($TFEData);?>,
            backgroundColor: "#00565602",
            borderColor: "#005656",
            borderWidth: 2,
          },
          {
            label: "Evènements à venir",
            data: <?php echo json_encode($EVData);?>,
            backgroundColor: "#D87CAC02",
            borderColor: "#D87CAC",
            borderWidth: 2,
          },
          {
            label: "Guide privilèges",
            data: <?php echo json_encode($GPData);?>,
            backgroundColor: "#00121902",
            borderColor: "#001219",
            borderWidth: 2,
          },
          {
            label: "Kluster CFCIM",
            data: <?php echo json_encode($KData);?>,
            backgroundColor: "#a1ff0a02",
            borderColor: "#a1ff0a",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#ffffff00",
          },
        },
      },
    };
    const configTotalC = {
      type: "doughnut",
      data: {
        labels: ["PC", "Android", "IOS"],
        datasets: [
          {
            label: "Connexions",
            data: [<?php echo  $totalPc;?>, <?php echo  $totalAndroid;?>, <?php echo  $totalIos;?>],
            backgroundColor: ["#ebe54b", "#0c4377", "#e40343"],
            hoverOffset: 4,
          },
        ],
      },
      options: {
        aspectRatio: 1,
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            formatter: function (value, ctx) {
              let datasets = ctx.chart.data.datasets;
              if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                let percentage = Math.round((value / sum) * 100) + "%";
                return percentage;
              } else {
                return percentage;
              }
            },
            color: "#fff",
          },
        },
      },
    };

    const configCont = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifLabel);?>,
        datasets: [
          {
            label: "Demandes de contacts envoyées",
            data: <?php echo json_encode($DCData);?>,
            backgroundColor: "#530a2c99",
            borderColor: "#530a2c",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#000",
          },
        },
      },
    };
    const configRD = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifData);?>,
        datasets: [
          {
            label: "Nombre de rendez-vous",
            data: <?php echo json_encode($RVData);?>,
            backgroundColor: "#9d251599",
            borderColor: "#9d2515",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#000",
          },
        },
      },
    };

    const configMess = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifLabel);?>,
        datasets: [
          {
            label: "Nombre de messages",
            data: <?php echo json_encode($NMData);?>,
            backgroundColor: "#424b5599",
            borderColor: "#424b55",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#000",
          },
        },
      },
    };

    const configAV = {
      type: "bar",
      data: {
        labels: <?php echo json_encode($actifLabel);?>,
        datasets: [
          {
            label: "Nombre d’appels vidéos",
            data: <?php echo json_encode($NAVData);?>,
            backgroundColor: "#a5c61499",
            borderColor: "#a5c614",
            borderWidth: 2,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true,
        },
        plugins: {
          datalabels: {
            anchor: "end",
            align: "end",
            color: "#000",
          },
        },
      },
    };

    Chart.Legend.prototype.afterFit = function () {
      this.height = this.height + 15;
    };

    var chartActif = new Chart($("#chartActif"), configActif);
    var chartPC = new Chart($("#chartPC"), configPC);
    var chartAndroid = new Chart($("#chartAndroid"), configAndroid);
    var chartIos = new Chart($("#chartIOS"), configIos);
    var chartRub = new Chart($("#chartRub"), configRub);
    var chartTotalC = new Chart($("#chartTotalC"), configTotalC);
    var chartCont = new Chart($("#chartCont"), configCont);
    var chartRD = new Chart($("#chartRD"), configRD);
    var chartMess = new Chart($("#chartMess"), configMess);
    var chartAV = new Chart($("#chartAV"), configAV);

    $(document).ready(function () {
      //scroll
      if ($(this).scrollTop() > 200) {
        $("#top").show();
      } else {
        $("#top").hide();
      }
      $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
          $("#top").fadeIn(300);
        } else {
          $("#top").fadeOut(300);
        }
      });
      $("#top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
      });
      //end-scroll-script

      $("#bactif").click(function () {
        if (configActif.type == "bar") {
          configActif.type = "line";
          chartActif.update();
          $("#bactif").text("Bar");
        } else if (configActif.type == "line") {
          configActif.type = "bar";
          chartActif.update();
          $("#bactif").text("Ligne");
        }
      });
      $("#bpc").click(function () {
        if (configPC.type == "bar") {
          configPC.type = "line";
          chartPC.update();
          $("#bpc").text("Bar");
        } else if (configPC.type == "line") {
          configPC.type = "bar";
          chartPC.update();
          $("#bpc").text("Ligne");
        }
      });
      $("#bandroid").click(function () {
        if (configAndroid.type == "bar") {
          configAndroid.type = "line";
          chartAndroid.update();
          $("#bandroid").text("Bar");
        } else if (configAndroid.type == "line") {
          configAndroid.type = "bar";
          chartAndroid.update();
          $("#bandroid").text("Ligne");
        }
      });
      $("#bios").click(function () {
        if (configIos.type == "bar") {
          configIos.type = "line";
          chartIos.update();
          $("#bios").text("Bar");
        } else if (configIos.type == "line") {
          configIos.type = "bar";
          chartIos.update();
          $("#bios").text("Ligne");
        }
      });
      $("#brub").click(function () {
        if (configRub.type == "bar") {
          configRub.type = "line";
          chartRub.update();
          $("#brub").text("Bar");
        } else if (configRub.type == "line") {
          configRub.type = "bar";
          chartRub.update();
          $("#brub").text("Ligne");
        }
      });
      $("#bcont").click(function () {
        if (configCont.type == "bar") {
          configCont.type = "line";
          chartCont.update();
          $("#bcont").text("Bar");
        } else if (configCont.type == "line") {
          configCont.type = "bar";
          chartCont.update();
          $("#bcont").text("Ligne");
        }
      });
      $("#brd").click(function () {
        if (configRD.type == "bar") {
          configRD.type = "line";
          chartRD.update();
          $("#brd").text("Bar");
        } else if (configRD.type == "line") {
          configRD.type = "bar";
          chartRD.update();
          $("#brd").text("Ligne");
        }
      });
      $("#bmess").click(function () {
        if (configMess.type == "bar") {
          configMess.type = "line";
          chartMess.update();
          $("#bmess").text("Bar");
        } else if (configMess.type == "line") {
          configMess.type = "bar";
          chartMess.update();
          $("#bmess").text("Ligne");
        }
      });
      $("#bav").click(function () {
        if (configAV.type == "bar") {
          configAV.type = "line";
          chartAV.update();
          $("#bav").text("Bar");
        } else if (configAV.type == "line") {
          configAV.type = "bar";
          chartAV.update();
          $("#bav").text("Ligne");
        }
      });

      $("#submit").click(function () {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var dataR=JSON.parse(this.responseText);
              $('#tactif').text(dataR.totalActif);
              $('#tpc').text(dataR.totalPc);
              $('#tios').text(dataR.totalIos);
              $('#tandroid').text(dataR.totalAndroid);
              $('#tconnexions').text(dataR.totalPc+dataR.totalIos+dataR.totalAndroid);
              $('#tdc').text(dataR.totalDC);
              $('#trv').text(dataR.totalRV);
              $('#tnm').text(dataR.totalNM);
              $('#tnav').text(dataR.totalNAV);
              configActif.data.datasets[0].data = dataR.actifData;
              configActif.data.labels = dataR.actifLabel;
              chartActif.update();
              configPC.data.datasets[0].data = dataR.pcData;
              configPC.data.labels = dataR.actifLabel;
              chartPC.update();
              configAndroid.data.datasets[0].data = dataR.androidData;
              configAndroid.data.labels = dataR.actifLabel;
              chartAndroid.update();
              configIos.data.datasets[0].data = dataR.iosData;
              configIos.data.labels = dataR.actifLabel;
              chartIos.update();
              configTotalC.data.datasets[0].data = [dataR.totalPc, dataR.totalAndroid, dataR.totalIos];
              chartTotalC.update();
              configRub.data.datasets[0].data = dataR.EOData;
              configRub.data.datasets[1].data = dataR.cfcimvData;
              configRub.data.datasets[2].data = dataR.DSEData;
              configRub.data.datasets[3].data = dataR.BPData;
              configRub.data.datasets[4].data = dataR.EBData;
              configRub.data.datasets[5].data = dataR.MData;
              configRub.data.datasets[6].data = dataR.SLData;
              configRub.data.datasets[7].data = dataR.EPData;
              configRub.data.datasets[8].data = dataR.VPData;
              configRub.data.datasets[9].data = dataR.PNData;
              configRub.data.datasets[10].data = dataR.RCData;
              configRub.data.datasets[11].data = dataR.TFEData;
              configRub.data.datasets[12].data = dataR.EVData;
              configRub.data.datasets[13].data = dataR.GPData;
              configRub.data.datasets[14].data = dataR.KData;
              configRub.data.labels = dataR.actifLabel;
              chartRub.update();
              configCont.data.datasets[0].data = dataR.DCData;
              configCont.data.labels = dataR.actifLabel;
              chartCont.update();
              configRD.data.datasets[0].data = dataR.RVData;
              configRD.data.labels = dataR.actifLabel;
              chartRD.update();
              configMess.data.datasets[0].data = dataR.NMData;
              configMess.data.labels = dataR.actifLabel;
              chartMess.update();
              configAV.data.datasets[0].data = dataR.NAVData;
              configAV.data.labels = dataR.actifLabel;
              chartAV.update();
            }
          };
          xmlhttp.open("GET","range.php?startDate="+document.getElementById("startDate").value+"&endDate="+document.getElementById("endDate").value,true);
          xmlhttp.send();        
      });

      $("#time").on("change", function () {
        if (this.value == 1) {
          <?php
            include "../php/db.php";
            $actifLabel=[];
            $actifData=[];
            $pcData=[];
            $iosData=[];
            $androidData=[];
            $EOData=[];
            $cfcimvData=[];
            $DSEData=[];
            $BPData=[];
            $EBData=[];
            $MData=[];
            $SLData=[];
            $EPData=[];
            $VPData=[];
            $PNData=[];
            $RCData=[];
            $TFEData=[];
            $EVData=[];
            $GPData=[];
            $KData=[];
            $DCData=[];
            $RVData=[];
            $NMData=[];
            $NAVData=[];
            $totalActif=0;
            $totalPc=0;
            $totalIos=0;
            $totalAndroid=0;
            $totalDC=0;
            $totalRV=0;
            $totalNM=0;
            $totalNAV=0;

            $sql = "SELECT * FROM connexions ORDER BY jour DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $totalActif+=$row["active_users"];
                $totalPc+=$row["pc"];
                $totalIos+=$row["ios"];
                $totalAndroid+=$row["android"];
                $totalDC+=$row["Demandes_contacts"];
                $totalRV+=$row["rendez_vous"];
                $totalNM+=$row["Nombre_messages"];
                $totalNAV+=$row["Nombre_appels_videos"];
                array_unshift($actifLabel,$row["jour"]);
                array_unshift($actifData,$row["active_users"]);
                array_unshift($pcData,$row["pc"]);
                array_unshift($iosData,$row["ios"]);
                array_unshift($androidData,$row["android"]);
                array_unshift($EOData,$row["Evenements_ouverts"]);
                array_unshift($cfcimvData,$row["CFCIM_en_video"]);
                array_unshift($DSEData,$row["Demandes_stages_emplois"]);
                array_unshift($BPData,$row["BOUTIQUE_produits"]);
                array_unshift($EBData,$row["ECOPARC_BERRECHID"]);
                array_unshift($MData,$row["MEDIATION"]);
                array_unshift($SLData,$row["Seminaire_en_ligne"]);
                array_unshift($EPData,$row["Evenements_passes"]);
                array_unshift($VPData,$row["Village_partenaires"]);
                array_unshift($PNData,$row["Participants_networking"]);
                array_unshift($RCData,$row["Revue_conjoncture"]);
                array_unshift($TFEData,$row["Team_France_Export"]);
                array_unshift($EVData,$row["Evenements_venir"]);
                array_unshift($GPData,$row["Guide_privileges"]);
                array_unshift($KData,$row["Kluster_CFCIM"]);
                array_unshift($DCData,$row["Demandes_contacts"]);
                array_unshift($RVData,$row["rendez_vous"]);
                array_unshift($NMData,$row["Nombre_messages"]);
                array_unshift($NAVData,$row["Nombre_appels_videos"]);
              }
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
          $('#tactif').text(<?php echo  $totalActif;?>);
          $('#tpc').text(<?php echo  $totalPc;?>);
          $('#tios').text(<?php echo  $totalIos;?>);
          $('#tandroid').text(<?php echo  $totalAndroid;?>);
          $('#tconnexions').text(<?php echo  $totalPc+$totalIos+$totalAndroid;?>);
          $('#tdc').text(<?php echo  $totalDC;?>);
          $('#trv').text(<?php echo  $totalRV;?>);
          $('#tnm').text(<?php echo  $totalNM;?>);
          $('#tnav').text(<?php echo  $totalNAV;?>);
          configActif.data.datasets[0].data = <?php echo json_encode($actifData);?>;
          configActif.data.labels = <?php echo json_encode($actifLabel);?>;
          chartActif.update();
          configPC.data.datasets[0].data = <?php echo json_encode($pcData);?>;
          configPC.data.labels = <?php echo json_encode($actifLabel);?>;
          chartPC.update();
          configAndroid.data.datasets[0].data = <?php echo json_encode($androidData);?>;
          configAndroid.data.labels = <?php echo json_encode($actifLabel);?>;
          chartAndroid.update();
          configIos.data.datasets[0].data = <?php echo json_encode($iosData);?>;
          configIos.data.labels = <?php echo json_encode($actifLabel);?>;
          chartIos.update();
          configTotalC.data.datasets[0].data = [<?php echo  $totalPc;?>, <?php echo  $totalAndroid;?>, <?php echo  $totalIos;?>];
          chartTotalC.update();
          configRub.data.datasets[0].data = <?php echo json_encode($EOData);?>;
          configRub.data.datasets[1].data = <?php echo json_encode($cfcimvData);?>;
          configRub.data.datasets[2].data = <?php echo json_encode($DSEData);?>;
          configRub.data.datasets[3].data = <?php echo json_encode($BPData);?>;
          configRub.data.datasets[4].data = <?php echo json_encode($EBData);?>;
          configRub.data.datasets[5].data = <?php echo json_encode($MData);?>;
          configRub.data.datasets[6].data = <?php echo json_encode($SLData);?>;
          configRub.data.datasets[7].data = <?php echo json_encode($EPData);?>;
          configRub.data.datasets[8].data = <?php echo json_encode($VPData);?>;
          configRub.data.datasets[9].data = <?php echo json_encode($PNData);?>;
          configRub.data.datasets[10].data = <?php echo json_encode($RCData);?>;
          configRub.data.datasets[11].data = <?php echo json_encode($TFEData);?>;
          configRub.data.datasets[12].data = <?php echo json_encode($EVData);?>;
          configRub.data.datasets[13].data = <?php echo json_encode($GPData);?>;
          configRub.data.datasets[14].data = <?php echo json_encode($KData);?>;
          configRub.data.labels = <?php echo json_encode($actifLabel);?>;
          chartRub.update();
          configCont.data.datasets[0].data = <?php echo json_encode($DCData);?>;
          configCont.data.labels = <?php echo json_encode($actifLabel);?>;
          chartCont.update();
          configRD.data.datasets[0].data = <?php echo json_encode($RVData);?>;
          configRD.data.labels = <?php echo json_encode($actifLabel);?>;
          chartRD.update();
          configMess.data.datasets[0].data = <?php echo json_encode($NMData);?>;
          configMess.data.labels = <?php echo json_encode($actifLabel);?>;
          chartMess.update();
          configAV.data.datasets[0].data = <?php echo json_encode($NAVData);?>;
          configAV.data.labels = <?php echo json_encode($actifLabel);?>;
          chartAV.update();
        } else if (this.value == 7) {
          <?php
            include "../php/db.php";
            $actifLabel=[];
            $actifData=[];
            $pcData=[];
            $iosData=[];
            $androidData=[];
            $EOData=[];
            $cfcimvData=[];
            $DSEData=[];
            $BPData=[];
            $EBData=[];
            $MData=[];
            $SLData=[];
            $EPData=[];
            $VPData=[];
            $PNData=[];
            $RCData=[];
            $TFEData=[];
            $EVData=[];
            $GPData=[];
            $KData=[];
            $DCData=[];
            $RVData=[];
            $NMData=[];
            $NAVData=[];
            $totalActif=0;
            $totalPc=0;
            $totalIos=0;
            $totalAndroid=0;
            $totalDC=0;
            $totalRV=0;
            $totalNM=0;
            $totalNAV=0;

            $sql = "SELECT * FROM connexions ORDER BY jour DESC LIMIT 7";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $totalActif+=$row["active_users"];
                $totalPc+=$row["pc"];
                $totalIos+=$row["ios"];
                $totalAndroid+=$row["android"];
                $totalDC+=$row["Demandes_contacts"];
                $totalRV+=$row["rendez_vous"];
                $totalNM+=$row["Nombre_messages"];
                $totalNAV+=$row["Nombre_appels_videos"];
                array_unshift($actifLabel,$row["jour"]);
                array_unshift($actifData,$row["active_users"]);
                array_unshift($pcData,$row["pc"]);
                array_unshift($iosData,$row["ios"]);
                array_unshift($androidData,$row["android"]);
                array_unshift($EOData,$row["Evenements_ouverts"]);
                array_unshift($cfcimvData,$row["CFCIM_en_video"]);
                array_unshift($DSEData,$row["Demandes_stages_emplois"]);
                array_unshift($BPData,$row["BOUTIQUE_produits"]);
                array_unshift($EBData,$row["ECOPARC_BERRECHID"]);
                array_unshift($MData,$row["MEDIATION"]);
                array_unshift($SLData,$row["Seminaire_en_ligne"]);
                array_unshift($EPData,$row["Evenements_passes"]);
                array_unshift($VPData,$row["Village_partenaires"]);
                array_unshift($PNData,$row["Participants_networking"]);
                array_unshift($RCData,$row["Revue_conjoncture"]);
                array_unshift($TFEData,$row["Team_France_Export"]);
                array_unshift($EVData,$row["Evenements_venir"]);
                array_unshift($GPData,$row["Guide_privileges"]);
                array_unshift($KData,$row["Kluster_CFCIM"]);
                array_unshift($DCData,$row["Demandes_contacts"]);
                array_unshift($RVData,$row["rendez_vous"]);
                array_unshift($NMData,$row["Nombre_messages"]);
                array_unshift($NAVData,$row["Nombre_appels_videos"]);
              }
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
          $('#tactif').text(<?php echo  $totalActif;?>);
          $('#tpc').text(<?php echo  $totalPc;?>);
          $('#tios').text(<?php echo  $totalIos;?>);
          $('#tandroid').text(<?php echo  $totalAndroid;?>);
          $('#tconnexions').text(<?php echo  $totalPc+$totalIos+$totalAndroid;?>);
          $('#tdc').text(<?php echo  $totalDC;?>);
          $('#trv').text(<?php echo  $totalRV;?>);
          $('#tnm').text(<?php echo  $totalNM;?>);
          $('#tnav').text(<?php echo  $totalNAV;?>);
          configActif.data.datasets[0].data = <?php echo json_encode($actifData);?>;
          configActif.data.labels = <?php echo json_encode($actifLabel);?>;
          chartActif.update();
          configPC.data.datasets[0].data = <?php echo json_encode($pcData);?>;
          configPC.data.labels = <?php echo json_encode($actifLabel);?>;
          chartPC.update();
          configAndroid.data.datasets[0].data = <?php echo json_encode($androidData);?>;
          configAndroid.data.labels = <?php echo json_encode($actifLabel);?>;
          chartAndroid.update();
          configIos.data.datasets[0].data = <?php echo json_encode($iosData);?>;
          configIos.data.labels = <?php echo json_encode($actifLabel);?>;
          chartIos.update();
          configTotalC.data.datasets[0].data = [<?php echo  $totalPc;?>, <?php echo  $totalAndroid;?>, <?php echo  $totalIos;?>];
          chartTotalC.update();
          configRub.data.datasets[0].data = <?php echo json_encode($EOData);?>;
          configRub.data.datasets[1].data = <?php echo json_encode($cfcimvData);?>;
          configRub.data.datasets[2].data = <?php echo json_encode($DSEData);?>;
          configRub.data.datasets[3].data = <?php echo json_encode($BPData);?>;
          configRub.data.datasets[4].data = <?php echo json_encode($EBData);?>;
          configRub.data.datasets[5].data = <?php echo json_encode($MData);?>;
          configRub.data.datasets[6].data = <?php echo json_encode($SLData);?>;
          configRub.data.datasets[7].data = <?php echo json_encode($EPData);?>;
          configRub.data.datasets[8].data = <?php echo json_encode($VPData);?>;
          configRub.data.datasets[9].data = <?php echo json_encode($PNData);?>;
          configRub.data.datasets[10].data = <?php echo json_encode($RCData);?>;
          configRub.data.datasets[11].data = <?php echo json_encode($TFEData);?>;
          configRub.data.datasets[12].data = <?php echo json_encode($EVData);?>;
          configRub.data.datasets[13].data = <?php echo json_encode($GPData);?>;
          configRub.data.datasets[14].data = <?php echo json_encode($KData);?>;
          configRub.data.labels = <?php echo json_encode($actifLabel);?>;
          chartRub.update();
          configCont.data.datasets[0].data = <?php echo json_encode($DCData);?>;
          configCont.data.labels = <?php echo json_encode($actifLabel);?>;
          chartCont.update();
          configRD.data.datasets[0].data = <?php echo json_encode($RVData);?>;
          configRD.data.labels = <?php echo json_encode($actifLabel);?>;
          chartRD.update();
          configMess.data.datasets[0].data = <?php echo json_encode($NMData);?>;
          configMess.data.labels = <?php echo json_encode($actifLabel);?>;
          chartMess.update();
          configAV.data.datasets[0].data = <?php echo json_encode($NAVData);?>;
          configAV.data.labels = <?php echo json_encode($actifLabel);?>;
          chartAV.update();
        } else if (this.value == 30) {
          <?php
            include "../php/db.php";
            $actifLabel=[];
            $actifData=[];
            $pcData=[];
            $iosData=[];
            $androidData=[];
            $EOData=[];
            $cfcimvData=[];
            $DSEData=[];
            $BPData=[];
            $EBData=[];
            $MData=[];
            $SLData=[];
            $EPData=[];
            $VPData=[];
            $PNData=[];
            $RCData=[];
            $TFEData=[];
            $EVData=[];
            $GPData=[];
            $KData=[];
            $DCData=[];
            $RVData=[];
            $NMData=[];
            $NAVData=[];
            $totalActif=0;
            $totalPc=0;
            $totalIos=0;
            $totalAndroid=0;
            $totalDC=0;
            $totalRV=0;
            $totalNM=0;
            $totalNAV=0;

            $sql = "SELECT * FROM connexions ORDER BY jour DESC LIMIT 30";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $totalActif+=$row["active_users"];
                $totalPc+=$row["pc"];
                $totalIos+=$row["ios"];
                $totalAndroid+=$row["android"];
                $totalDC+=$row["Demandes_contacts"];
                $totalRV+=$row["rendez_vous"];
                $totalNM+=$row["Nombre_messages"];
                $totalNAV+=$row["Nombre_appels_videos"];
                array_unshift($actifLabel,$row["jour"]);
                array_unshift($actifData,$row["active_users"]);
                array_unshift($pcData,$row["pc"]);
                array_unshift($iosData,$row["ios"]);
                array_unshift($androidData,$row["android"]);
                array_unshift($EOData,$row["Evenements_ouverts"]);
                array_unshift($cfcimvData,$row["CFCIM_en_video"]);
                array_unshift($DSEData,$row["Demandes_stages_emplois"]);
                array_unshift($BPData,$row["BOUTIQUE_produits"]);
                array_unshift($EBData,$row["ECOPARC_BERRECHID"]);
                array_unshift($MData,$row["MEDIATION"]);
                array_unshift($SLData,$row["Seminaire_en_ligne"]);
                array_unshift($EPData,$row["Evenements_passes"]);
                array_unshift($VPData,$row["Village_partenaires"]);
                array_unshift($PNData,$row["Participants_networking"]);
                array_unshift($RCData,$row["Revue_conjoncture"]);
                array_unshift($TFEData,$row["Team_France_Export"]);
                array_unshift($EVData,$row["Evenements_venir"]);
                array_unshift($GPData,$row["Guide_privileges"]);
                array_unshift($KData,$row["Kluster_CFCIM"]);
                array_unshift($DCData,$row["Demandes_contacts"]);
                array_unshift($RVData,$row["rendez_vous"]);
                array_unshift($NMData,$row["Nombre_messages"]);
                array_unshift($NAVData,$row["Nombre_appels_videos"]);
              }
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
          $('#tactif').text(<?php echo  $totalActif;?>);
          $('#tpc').text(<?php echo  $totalPc;?>);
          $('#tios').text(<?php echo  $totalIos;?>);
          $('#tandroid').text(<?php echo  $totalAndroid;?>);
          $('#tconnexions').text(<?php echo  $totalPc+$totalIos+$totalAndroid;?>);
          $('#tdc').text(<?php echo  $totalDC;?>);
          $('#trv').text(<?php echo  $totalRV;?>);
          $('#tnm').text(<?php echo  $totalNM;?>);
          $('#tnav').text(<?php echo  $totalNAV;?>);
          configActif.data.datasets[0].data = <?php echo json_encode($actifData);?>;
          configActif.data.labels = <?php echo json_encode($actifLabel);?>;
          chartActif.update();
          configPC.data.datasets[0].data = <?php echo json_encode($pcData);?>;
          configPC.data.labels = <?php echo json_encode($actifLabel);?>;
          chartPC.update();
          configAndroid.data.datasets[0].data = <?php echo json_encode($androidData);?>;
          configAndroid.data.labels = <?php echo json_encode($actifLabel);?>;
          chartAndroid.update();
          configIos.data.datasets[0].data = <?php echo json_encode($iosData);?>;
          configIos.data.labels = <?php echo json_encode($actifLabel);?>;
          chartIos.update();
          configTotalC.data.datasets[0].data = [<?php echo  $totalPc;?>, <?php echo  $totalAndroid;?>, <?php echo  $totalIos;?>];
          chartTotalC.update();
          configRub.data.datasets[0].data = <?php echo json_encode($EOData);?>;
          configRub.data.datasets[1].data = <?php echo json_encode($cfcimvData);?>;
          configRub.data.datasets[2].data = <?php echo json_encode($DSEData);?>;
          configRub.data.datasets[3].data = <?php echo json_encode($BPData);?>;
          configRub.data.datasets[4].data = <?php echo json_encode($EBData);?>;
          configRub.data.datasets[5].data = <?php echo json_encode($MData);?>;
          configRub.data.datasets[6].data = <?php echo json_encode($SLData);?>;
          configRub.data.datasets[7].data = <?php echo json_encode($EPData);?>;
          configRub.data.datasets[8].data = <?php echo json_encode($VPData);?>;
          configRub.data.datasets[9].data = <?php echo json_encode($PNData);?>;
          configRub.data.datasets[10].data = <?php echo json_encode($RCData);?>;
          configRub.data.datasets[11].data = <?php echo json_encode($TFEData);?>;
          configRub.data.datasets[12].data = <?php echo json_encode($EVData);?>;
          configRub.data.datasets[13].data = <?php echo json_encode($GPData);?>;
          configRub.data.datasets[14].data = <?php echo json_encode($KData);?>;
          configRub.data.labels = <?php echo json_encode($actifLabel);?>;
          chartRub.update();
          configCont.data.datasets[0].data = <?php echo json_encode($DCData);?>;
          configCont.data.labels = <?php echo json_encode($actifLabel);?>;
          chartCont.update();
          configRD.data.datasets[0].data = <?php echo json_encode($RVData);?>;
          configRD.data.labels = <?php echo json_encode($actifLabel);?>;
          chartRD.update();
          configMess.data.datasets[0].data = <?php echo json_encode($NMData);?>;
          configMess.data.labels = <?php echo json_encode($actifLabel);?>;
          chartMess.update();
          configAV.data.datasets[0].data = <?php echo json_encode($NAVData);?>;
          configAV.data.labels = <?php echo json_encode($actifLabel);?>;
          chartAV.update();
        }
      });

      window.jsPDF = window.jspdf.jsPDF;
      $("#pdf").click(function () {
        var newCanvasImg = document
          .getElementsByTagName("canvas")[0]
          .toDataURL("image/png");
        var newCanvasImg1 = document
          .getElementsByTagName("canvas")[1]
          .toDataURL("image/png");
        var newCanvasImg2 = document
          .getElementsByTagName("canvas")[2]
          .toDataURL("image/png");
        var newCanvasImg3 = document
          .getElementsByTagName("canvas")[3]
          .toDataURL("image/png");
        var newCanvasImg4 = document
          .getElementsByTagName("canvas")[4]
          .toDataURL("image/png");
        var newCanvasImg5 = document
          .getElementsByTagName("canvas")[5]
          .toDataURL("image/png");
        var newCanvasImg6 = document
          .getElementsByTagName("canvas")[6]
          .toDataURL("image/png");
        var newCanvasImg7 = document
          .getElementsByTagName("canvas")[7]
          .toDataURL("image/png");
        var newCanvasImg8 = document
          .getElementsByTagName("canvas")[8]
          .toDataURL("image/png");
        var newCanvasImg9 = document
          .getElementsByTagName("canvas")[9]
          .toDataURL("image/png");
        var doc = new jsPDF();
        doc.setFontSize(20);
        doc.addImage("../public/logoPDF.png", "PNG", 80, 5, 50, 12);
        doc.setTextColor(12, 67, 119);
        doc.text(86, 30, "Connexions:");
        doc.addImage(newCanvasImg, "PNG", 10, 40, 90, 61);
        doc.addImage(newCanvasImg1, "PNG", 110, 40, 90, 61);
        doc.addImage(newCanvasImg2, "PNG", 10, 124, 90, 61);
        doc.addImage(newCanvasImg3, "PNG", 110, 124, 90, 61);
        doc.addImage(newCanvasImg4, "PNG", 61, 208, 90, 61);
        doc.addPage();
        doc.addImage("../public/logoPDF.png", "PNG", 80, 5, 50, 12);
        doc.setTextColor(12, 67, 119);
        doc.text(81, 30, "Fonctionnalités:");
        doc.addImage(newCanvasImg5, "PNG", 10, 40, 190, 130);
        doc.addPage();
        doc.addImage("../public/logoPDF.png", "PNG", 80, 5, 50, 12);
        doc.setTextColor(12, 67, 119);
        doc.text(87, 30, "Networking:");
        doc.addImage(newCanvasImg6, "PNG", 10, 40, 90, 61);
        doc.addImage(newCanvasImg7, "PNG", 110, 40, 90, 61);
        doc.addImage(newCanvasImg8, "PNG", 10, 124, 90, 61);
        doc.addImage(newCanvasImg9, "PNG", 110, 124, 90, 61);
        doc.save("MyCFCIM.pdf");
      });
    });
  </script>
</html>
