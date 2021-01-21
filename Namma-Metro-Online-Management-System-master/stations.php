<?php
include("php/connect.php");
$con = OpenCon();
?>
<!DOCTYPE html>
<html>
<head>
  <title>DBMS Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <style type="text/css">
    h2.headertekst {
  text-align: center;
  }
  .demo-content{
          padding: 200px;
          font-size: 18px;
          text-align: center;
          background: #DCEAE5;
          margin:50px 22em 50px 22em;
        }
        .demo-content.bg-alt{
          background: #abb1b8;
        }

  a {
    color: #000000;
    text-decoration: none;
}

a:hover 
{
     color:#fff; 
     text-decoration:none; 
     cursor:pointer;  
}

.flex-container{
  display: flex;
  flex-wrap: wrap;
  background: rgba(192,192,192,0.3);
  box-shadow: 0 5px 15px rgba(0,0,0,.1);
  z-index: -1;
}

.flex-child{
  flex: 1;
}

.box-area{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.single-box{
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 500px;
  height: 430px;
  border-radius: 30px;
  margin: 60px;
  padding: 50px;
  transition: .3s;
  border: solid;
}

.header-text{
  font-size: 24px;
  font-width:500;
  line-height: 48px;
}
.img-text{
  font-family: Poppins;
  padding-top: 5px;
}

.flex-child-1 .single-box:hover{
  background: #3cc943;
}
.flex-child-2 .single-box:hover{
  background: #7e3878;
}
body{
        background-image: url("images/map1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
      }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="contact_us.php">Contact Us</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="smart_cardrequest.php">Smart Card Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="travel_info.php">Travel Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fare.php">Fare<span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="stations.php"><strong>Stations</strong></a>
      </li>
    </ul>
  </div>
</nav>

<div class="flex-container">
<div class="flex-child-1">
<a href="#collapse1">
<div class="box-area">
  <div class="single-box"> 
      <div class="img-text" onclick="myFunction1()">
        <span class="header-text" id="myPopup"><strong>GREEN LINE</strong></span>
      </div>
  </div>
</div>
</a>
</div>

<div class="flex-child-2">
    <a href="#collapse2">
<div class="box-area">
  <div class="single-box">
    <div class="img-text" onclick="myFunction2()">
      <span class="header-text"><strong>PURPLE LINE</strong></span>
  </div>
</div>
</div>
</a>
</div>
          <div id="collapse1">
            <ul class="list-group">
              <?php
              include("php/connect.php");
              $con = OpenCon();
              $stations1 = mysqli_query($con,"SELECT station_name FROM station WHERE route_id = 1");
              $row_cnt = mysqli_num_rows($stations1);
              while ( $rows = $stations1->fetch_row() ) {
                foreach ($rows as $key => $value) {
                  echo '<li class="list-group-item">',$value,'</li>';
                }
              }
              $stations1->free();

              ?>
            </ul>
          </div>

          <div id="collapse2">
            <ul class="list-group">
              <?php
              $stations2 = mysqli_query($con,"SELECT station_name FROM station WHERE route_id = 3");
              $row_cnt = mysqli_num_rows($stations2);

              while ( $rows = $stations2->fetch_row() ) {
                foreach ($rows as $key => $value) {
                  echo '<li class="list-group-item">',$value,'</li>';
                }
              }
              $stations2->free();
              Closecon($con);
              ?>
            </ul>
          </div>

<script>
function myFunction1() {
  var popup = document.getElementById("collapse1");
  popup.classList.toggle("show");
}
function myFunction2() {
  var popup = document.getElementById("collapse2");
  popup.classList.toggle("show");
}
</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
