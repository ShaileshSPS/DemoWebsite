<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Webs</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <style type="text/css">
    .navbar {
          position: fixed;
          width: 100%;
          top: 0;
          z-index: 1000;
    }
  </style>
  <script type="text/javascript">
    window.onload = function() {
      var url = window.location.pathname;
      url = url.substring(8);
      if(url == '/aboutus.php'){
        $("#about").addClass('active');
        $("#contact").removeClass('active');
      }else if(url == '/contactus.php'){
        $("#contact").addClass('active');
        $("#about").removeClass('active');
      }
      else if(url == '/index.php'){
        $("#index").addClass('active');
        $("#about").removeClass('active');
        $("#contact").removeClass('active');
      }
    }
  </script>
</head>

<body>
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
  <a class="navbar-brand" href="index.php">Webs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" id="index">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item" id='about'>
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item"  id='contact'>
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="btn-sm nav-link waves-effect waves-light btn btn-primary" style="border-radius:30px" href="login.php">
         <i class="fa fa-user"> Login / Register</i>
        </a>
      </li> 
    </ul>
  </div>
</nav>
<!--/.Navbar -->
