<?php
use yii\helpers\Html;
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
          <li class="active"><?php echo Html::a(Yii::t('app','Home'), ['../web/site/index'], ['class' => 'btn btn-default']); ?></li>
             <li><?php echo Html::a(Yii::t('app','Rutas'), ['../web/site/rutas'], ['class' => 'btn btn-default']); ?></li>
              <li><?php echo Html::a(Yii::t('app','Login'), ['../web/site/login'], ['class' => 'btn btn-default']); ?></li>
            
           </ul>
        </div>	
     </div>	
</div>

<!--main-->

<div class="container" id="main">
   <div class="row">
    <div class="col-md-12"><h2>Bienvenido</h2></div>
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
              <li class="list-group-item"><?php echo Html::a(Yii::t('app','nombre dle comercio'), ['../web/site/pedido'], ['class' => 'btn btn-default']); ?></li>
                <!--<a href="../web/site/pedido" class="list-group-item"><h5>ComercioA</h5> <p> direccion del comercio</p></a>
                <a href="../web/site/pedido" class="list-group-item"><h5>ComercioB</h5> <p> direccion del comercio</p></a>
                <a href="../web/site/pedido" class="list-group-item"><h5>ComercioC</h5> <p> direccion del comercio</p></a>-->
              </div>
            </div>
              

        </div>

	</div>


  </div><!--/row-->
  

  

    

  
</div><!--/main-->

<!--login modal-->

PROBANDO PROBANDO PROBANDO!!!!
    <?php
    // $response = file_get_contents('http://localhost/yii2-grupo8/api/web/v1/productos');
    
    // var_dump($response);
    ?>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>

   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script type="text/javascript">
        
        function makePOST(apiurl){
          $.ajax({
              method: "POST",
              url: apiurl,
              data: { username: "John", passwored: "Boston" }
            })
              .done(function( msg ) {
                console.info( msg );
              });
        }

        function makeGET(apiurl, callback){
          $.ajax({
              method: "GET",
              url: apiurl,
              data: { name: "John", location: "Boston" }
            })
              .done(function( respuesta ) {
                callback( respuesta );
              });
        }

        function dibujarTabla(datos){
           $('body').append('<table id="nuevatabla"></table>');
           
           $.each(datos, function( index, producto ) {
              $('#nuevatabla').append('<tr><td>'+producto.nombre+'</td></tr>')
            });
           
        }


        $(document).ready(function(){
            makeGET('http://localhost/yii2-grupo8/api/web/v1/productos',dibujarTabla);

        });

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