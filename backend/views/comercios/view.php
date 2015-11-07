
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Productos;
use backend\controller\ProductosController;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $model backend\models\Comercios */

$this->title = $model->idComercio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comercios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comercios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idComercio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idComercio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?php 
      echo '      
        <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}     
    </style>

            <div class="col-sm-4">                     
                <div class="col-sm-12" id="panel_ruta" style="overflow: auto; height: 150px" ></div>                                    
            </div>      
                
            <div style="height:100%" class="col-sm-8">
                    <div id="map-canvas"></div>         
            </div> '; 

?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'idComercio',
            'nombre',
            'latitud',
            'longitud',
            'prioridad',
            //'productos',
            'direccion',
        ],
    ]) ?>




    <?php
    $i = 0;
    $j = 0;
/* productos */
    $arrayPapa=array();
    $array = explode('"', $model->productos); 
        foreach ($array as $value) {
            if($value!="["){
                if($value!=']'){
                    if( $value!=','){
                    $arrayPapa[$i] = $value;
                    $i++;
                    }
                }
            }
        }

/* dias de relevamiento */
    $arrayDias=array();
    $arrayD = explode('"', $model->diasParaRelevar); 
        foreach ($arrayD as $value) {
            if($value!="["){
                if($value!=']'){
                    if( $value!=','){
                    $arrayDias[$j] = $value;
                    $j++;
                    }
                }
            }
        }

    $longitudDias = count($arrayDias);
    $longitud = count($arrayPapa);
    echo "<h4>Productos del comercio <small>";
    echo '</small></h4>';
    echo '<table>';
    for($i=0; $i<$longitud; $i++)
    {
       $id = $arrayPapa[$i];
       $productos = ArrayHelper::map(Productos::find()->all(), 'idProd', 'nombre');
       echo"<br>";
        echo Html::a(Yii::t('app', $productos[$id]), ['../web/productos/view?id='.$id], ['class' => 'btn btn-default']);
    echo"</br>";
}
    echo '</table>';

echo "<h4>Dias para Relevar <small>";
echo '</small></h4>';
    for($j=0; $j<$longitudDias; $j++)
    {   
       
        echo $arrayDias[$j];
         echo"<br>";
        echo"</br>";


}   
    $latitu = $model->latitud;
    $longitud = $model->longitud;
       ?>


</div>



    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
   







    <script type="text/javascript">
    
        var map;
        var geocoder;
        var bounds = new google.maps.LatLngBounds();
        var markersArray = [];
        var originIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=O|FFFF00|000000';

        var origen =  new google.maps.LatLng( <?=$latitu?>, <?=$longitud?>);

        function initialize() {
         var opts = {
            center: new google.maps.LatLng( <?=$latitu?>, <?=$longitud?>),
            zoom: 18
          };

          map = new google.maps.Map(document.getElementById('map-canvas'), opts);
          geocoder = new google.maps.Geocoder();
          addMarker(origen, true);

        }


        function calculateDistances() {
          var service = new google.maps.DistanceMatrixService();
          service.getDistanceMatrix({
              origins: [origen], //Dado que es una matriz se pueden especificar varios origenes y destinos
              destinations: [canelones, san_jose, las_piedras, aeropuerto, florida],
              travelMode: google.maps.TravelMode.DRIVING,
              unitSystem: google.maps.UnitSystem.METRIC,
              
              //avoidHighways: false,
              //avoidTolls: false
          }, callbackMostrarDistancias);
        }

        //Muestra el resultado de la solicitud
        function callbackMostrarDistancias(response, status) {
          if (status != google.maps.DistanceMatrixStatus.OK) {
            alert('Error was: ' + status);
          } 
          else 
          {
            var origins = response.originAddresses;
            var destinations = response.destinationAddresses;
            deleteOverlays();

            for (var i = 0; i < origins.length; i++) {
              var results = response.rows[i].elements;
              addMarker(origins[i], false);
            }
          }
        }



          //Agrega una marca al mapa
        
        function addMarker(location, isDestination) {
          var icon;
            icon = originIcon;
          
          geocoder.geocode({'address': location}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              bounds.extend(results[0].geometry.location);
              map.fitBounds(bounds);              
              
              var infowindow = new google.maps.InfoWindow({
                content: location
              });                        
              
              var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                icon: icon,
                title: location                     
              });
                          
              google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
              });
              
              markersArray.push(marker);
              
            } else {
              alert('Geocode was not successful for the following reason: '+ status);
            }
          });
        }

        //limpia las marcas del mapa
        function deleteOverlays() {
          for (var i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(null);
          }
          markersArray = [];
        }

        google.maps.event.addDomListener(window, 'load', initialize);
     
    </script>
               
                 