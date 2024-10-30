<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Bienvenidos</title>

  <!-- Favicons -->
  <link href="View/img/favi.png" rel="icon">
  <link href="View/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="View/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="View/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="View/css/style.css" rel="stylesheet">
  <link href="View/css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
        <form class="form-login" action="View/conectar.php" method="post">
        <h2 class="form-login-heading">Ingresar Usuario y Clave</h2>
        <center><img src="View/img/ucv.png" width="280"  alt="" style="margin-top: 10px;" /></center>
        <div class="login-wrap">
            <input type="text" class="form-control"  id="txtusuario" name="txtusuario" placeholder="Usuario" autofocus>
          <br>
          <input type="password" class="form-control" id="txtclave" name="txtclave" placeholder="Password">
          <label class="checkbox">
         
            </label>
          <button class="btn btn-primary btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Acceder</button>
          <hr>
       
          <div class="registration">
            © 2024 Derechos Reservados <br/>
            <a class="" href="#">
         Universidad César Vallejo
              </a>
          </div>
        </div>
        <!-- Modal -->
        
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="View/lib/jquery/jquery.min.js"></script>
  <script src="View/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="View/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("View/img/presentacion.png", {
      speed: 500
    });
  </script>
</body>

</html>
