<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Web Mobile</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-fixed-top header">
 	<div class="col-md-12">
        
	
     </div>	
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">
          
          <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Home <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
         
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
             <li class="active"><a href="../site/index">Home</a></li>
             <li><a href="../site/rutas" role="button">Rutas</a></li>
             <li><a href="#loginModal" role="button" data-toggle="modal">Login</a></li>
           </ul>
        </div>	
     </div>	
</div>

<!--main-->

<div class="container" id="main">
   <div class="row">
    <div class="col-md-12"><h2>Bienvenio</h2></div>
   <div class="col-md-12 col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading"> <h4>Ruta del dia</h4></div>
   			<div class="panel-body">

           <style>
    #map-canvas {height: 100%; margin: -5px; padding: 0;},     
    </style>
    <div style="height:450px" class="col-sm-8">
            <div id="map-canvas"></div>         
    </div> 

        </div>
   		</div>
        <div class="well"> 
             
              <div class="panel-heading"> <h4>Comercios</h4></div>
               
            <div class="panel-body">
              <div class="list-group">
                <a href="../site/pedido" class="list-group-item"><h5>ComercioA</h5> <p> direccion del comercio</p></a>
                <a href="../site/pedido" class="list-group-item"><h5>ComercioB</h5> <p> direccion del comercio</p></a>
                <a href="../site/pedido" class="list-group-item"><h5>ComercioC</h5> <p> direccion del comercio</p></a>
              </div>
            </div>
              

        </div>

	</div>


  </div><!--/row-->
  

  

    

  
</div><!--/main-->

<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"><br>Login</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Usuario">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Contraseña">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="#">Registrarse</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
		  </div>	
      </div>
  </div>
  </div>
</div>



	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>

   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script type="text/javascript">
    
        function initialize() {
    var myOptions = {
      center: new google.maps.LatLng(-34.800411,-56.1241394),
      zoom: 13
        };
    var map = new google.maps.Map(document.getElementById("map-canvas"),
        myOptions);

var comercio = new google.maps.LatLng(-34.800411,-56.1241394);


var marker = new google.maps.Marker({
    position: comercio, 
    map: map});

var bounds = new google.maps.LatLngBounds(comercio);
map.fitBounds(bounds);

    }
        google.maps.event.addDomListener(window, 'load', initialize);
     
    </script>
</html>




</div>