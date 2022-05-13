<?php
    session_start();
    if(!$_SESSION['admin_mycfcim_stats']){
        header('location:../admin');      
    }
    include '../php/db.php';
    $idC=$_GET['id'];    
    $sql = "SELECT nom, prenom,email,type FROM users WHERE id=$idC";
    $result = $conn->query($sql);
    $nomC='';
    $prenomC='';
    $emailC='';
    $typeC='';
    $select='';
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $nomC=$row["nom"];
            $prenomC=$row["prenom"];
            $emailC=$row["email"];
            $typeC=$row["type"];
        }
    } else {
        header('location:./comptes.php');
    }
    if($_POST){
        include '../php/db.php';        
        $type=$_POST['type'];
        if($type=="2"){
            $internal_id=NULL;  
        } else if($type=="3") {
            $internal_id='RXhoaWJpdG9yXzE1ODYzMg==';
        } else if($type=="4" || $type=="5") {
            $internal_id=$_POST['iid'];
        }  
        $sql = "UPDATE users SET type=$type, internal_id=\"$internal_id\" WHERE id=\"$idC\"";

        if ($conn->query($sql) === TRUE) {
          if($typeC==0){
            $to = $emailC; 
            $from = 'ymoinou@cfcim.org'; 
            $fromName = 'MyCFCIM STATS'; 
            
            $subject = "Votre compte MyCFCIM STATS est activé"; 
            
            $htmlContent = '<html>
            <head>
              <title>My CFCIM STATS</title>
              <meta charset="UTF-8" />
              <meta http-equiv="X-UA-Compatible" content="IE=edge" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            </head>
            <body>
              <table
                border="0"
                cellpadding="0"
                cellspacing="0"
                style="
                  max-width: 602px;
                  padding: 20px 0;
                  background-image: linear-gradient(#e40343, #530a2c);
                "
                align="center"
              >
                <tr>
                  <td style="padding: 20px" align="center">
                    <img
                      src="http://mycfcimstats.ecoparc.ma/public/logo.png"
                      alt="logo"
                      width="65%"
                    />
                  </td>
                </tr>
                <tr>
                  <td style="padding: 20px 15px" align="center">
                    <p
                      style="
                        color: #ebe54b;
                        text-shadow: 2px 2px 7px rgba(34, 34, 34, 0.692);
                        font-size: 18px;
                        font-weight: 500;
                        font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\',
                          \'Roboto\', \'Oxygen\', \'Ubuntu\', \'Cantarell\', \'Fira Sans\',
                          \'Droid Sans\', \'Helvetica Neue\', sans-serif;
                      "
                    >
                      Merci '.$prenomC.' pour votre patience, votre compte maintenant est
                      activé
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 20px" align="center">
                    <a
                      style="
                        text-decoration: none;
                        color: #fff;
                        background-color: #0c4377;
                        padding: 10px;
                        font-weight: 500;
                        font-size: 16px;
                        border-radius: 10px;
                        box-shadow: 0 3px 8px 2px rgba(0, 0, 0, 0.3);
                        font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\',
                          \'Roboto\', \'Oxygen\', \'Ubuntu\', \'Cantarell\', \'Fira Sans\',
                          \'Droid Sans\', \'Helvetica Neue\', sans-serif;
                      "
                      href="http://mycfcimstats.ecoparc.ma/"
                      >Connectez-vous maintenant</a
                    >
                  </td>
                </tr>
              </table>
            </body>
          </html>'; 
            
            // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
            
            // Additional headers 
            $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
            $headers .= 'Cc: youssefmoinou@gmail.com' . "\r\n"; 
            
            // Send email 
            if(mail($to, $subject, $htmlContent, $headers)){ 
                echo 'Email sending success.'; 
            }else{ 
                echo 'Email sending failed.'; 
            }
          }
          header('location:./cActiver.php');
        } else {
        echo "Error updating record: " . $conn->error;
        }
          $conn->close();  
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
    <link rel="stylesheet" href="../css/entreprise.css" />
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
          <a href="./index.php">Ajouter Stats</a>
          <a style="color: #0c4377" href="./comptes.php">Comptes</a>
          <a href="./entreprises.php">Entreprises</a>
          <a style="color: #e40343" href="./logout.php">Deconnexion</a>
      </div>  
      <div style="margin:30px 0" class="body">
        <form method="POST">
          <input
            type="text"
            name="nom"
            id="nom"
            placeholder="Nom"
            value="<?php echo $nomC?>"
            disabled
          />
          <input
            type="text"
            name="prenom"
            id="prenom"
            placeholder="Prenom"
            value="<?php echo $prenomC?>"
            disabled
          />
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email"
            value="<?php echo $emailC?>"
            disabled
          />
          <select id="type" name="type" required onchange="handleC()">
            <option value="">Selectioner type de compte</option>
            <option value="2">Administrateur</option>
            <option value="3">Collaborateur</option>
            <option value="4">Partenaire</option>
            <option value="5">Vendeur</option>
          </select>
          <select id="iid" name="iid">
          </select>
          <button style="background-color:#0c4377;color:#fff" type="submit">ACTIVER</button>          
        </form>       
    </div>
  </body>
  <script>
      document.getElementById('iid').style.display="none";
      function handleC(){
          if(document.getElementById('type').value>=4){
            document.getElementById('iid').style.display="block";
            document.getElementById('iid').required=true;
          }else{
            document.getElementById('iid').style.display="none";
            document.getElementById('iid').required=false;
          }
          if(document.getElementById('type').value==4){
            <?php
                
                $sql = "SELECT * FROM companies WHERE seller=0";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                // output data of each row
                $select='<option value="">Selectioner entreprise</option>';
                while($row = $result->fetch_assoc()) {
                    $select.='<option value="'.$row["internal_id"].'">'.$row["name"].'</option>';
                }
                ?>document.getElementById("iid").innerHTML = '<?php echo $select;?>';<?php
                }           
            ?>
          }else if(document.getElementById('type').value==5){
            <?php
                
                $sql = "SELECT * FROM companies WHERE seller=1";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                // output data of each row
                $select='<option value="">Selectioner entreprise</option>';
                while($row = $result->fetch_assoc()) {
                    $select.='<option value="'.$row["internal_id"].'">'.$row["name"].'</option>';
                }
                ?>document.getElementById("iid").innerHTML = '<?php echo $select;?>';<?php
                }           
            ?>
          }
      }
  </script>
</html>