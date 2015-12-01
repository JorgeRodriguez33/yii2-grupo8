<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Comercios; 
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
<?php

 session_start();
 // session_destroy();
?>
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
          <?php 
              if (empty($_SESSION['miSession'])) 
              {
                ?>
               
               <li><?php echo Html::a(Yii::t('app','Login'), ['../web/site/login'], ['class' => 'btn btn-default']); ?></li>
             
             <?php 
           }
          ?>
           <?php 
              if (!empty($_SESSION['miSession'])) 
              {
                ?>
                <li><?php echo Html::a(Yii::t('app','Rutas'), ['../web/site/rutas'], ['class' => 'btn btn-default']); ?></li>
                <?php
                $nom ='Hola&nbsp;'.$_SESSION['miSession']['nombre'].'!';
                echo '<li class="active">'; echo Html::a(Yii::t('app',$nom),[""], ['class' => 'btn btn-default']); echo '</li>';
                
              }
            ?>  
            <?php 
              if (!empty($_SESSION['miSession'])) 
              {
                ?>
                <li><?php echo Html::a(Yii::t('app','Cerrar sesión'), ['../web/site/out'], ['class' => 'btn btn-default']); ?></li>
              <?php 
              }
            ?>  
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
              <?php
              if(!empty($_SESSION['comerciosDelDia'])){
               $rutaArray = $_SESSION['comerciosDelDia'];
               $conjuntoComercios = ArrayHelper::toArray(Comercios::find()->all());
               $rutaDeComercios = array();
               $longitud = count($rutaArray);
                 for($i=0; $i<$longitud; $i++)
              {
                   $id =$rutaArray[$i];
                   foreach($conjuntoComercios as $value){
                    if($value['idComercio']==$id){
                     array_push($rutaDeComercios, $value);

                   echo '<li class="list-group-item">'; echo Html::a(Yii::t('app',$value['nombre']), ['../web/site/pedido?id='.$id], ['class' => 'btn btn-default']); echo '</li>';
                    }
                   }
              }
            }
              ?>
              <!-- <li class="list-group-item"><?php// echo Html::a(Yii::t('app','nombre del comercio'), ['../web/site/pedido'], ['class' => 'btn btn-default']); ?></li>
               <a href="../web/site/pedido" class="list-group-item"><h5>ComercioA</h5> <p> direccion del comercio</p></a>
                <a href="../web/site/pedido" class="list-group-item"><h5>ComercioB</h5> <p> direccion del comercio</p></a>
                <a href="../web/site/pedido" class="list-group-item"><h5>ComercioC</h5> <p> direccion del comercio</p></a>-->
              </div>
            </div>
              

        </div>

	</div>


  </div><!--/row-->
  

  

    

  
</div><!--/main-->

<!--login modal-->

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

        function getRutaRelevador(apiurl){
          $.ajax({
              method: "GET",
              url: apiurl,
            })
              .done(function(data) {
                alert(data);
              });
        }

   
        function initialize() {
          var myOptions = {
          center: new google.maps.LatLng(-34.9036100, -56.1640446),
          zoom: 15,
            };
        var map = new google.maps.Map(document.getElementById("map-canvas"),myOptions);

        var arrayComercios=<?php if(!empty($rutaDeComercios)){ echo json_encode($rutaDeComercios);}?>;
        var arrayPuntos = Array();
        var arrayMarker = Array();
        var arrayBounds = Array();

         for(var i=0;i<arrayComercios.length;i++)
         {
           arrayPuntos.push(new google.maps.LatLng(arrayComercios[i]['latitud'], arrayComercios[i]['longitud']));
           arrayMarker.push(new google.maps.Marker({position:arrayPuntos[i], map: map}));
           arrayBounds.push(new google.maps.LatLngBounds(arrayPuntos[i]));
         }

        for(var i=0;i<arrayBounds.length;i++)
        {
        map.fitBounds(arrayBounds[i]);
        }
        var lineas = new google.maps.Polyline({        
        path: arrayPuntos,
        map: map, 
        strokeColor: '#222000', 
        strokeWeight: 4,  
        strokeOpacity: 0.6, 
        clickable: false     }); 

        }
        google.maps.event.addDomListener(window, 'load', initialize);
     
    </script>
</html>




</div>