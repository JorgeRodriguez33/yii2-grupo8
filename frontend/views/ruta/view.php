
<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Rutas;
use yii\helpers\Json;
use backend\models\Comercios; 
?>

<div class="ruta-view">

<?php
 echo '<div class="body-content">';


 echo "<h4>Descripcion de la ruta del dia seleccionado <small>";
    echo '</small></h4>';
    echo '<table>';
 $rutaArray = json_decode($rutaDelDia['ordenComercios']);
 
 $conjuntoComercios = ArrayHelper::toArray(Comercios::find()->all());

$rutaDeComercios = array();

 $longitud = count($rutaArray);

  for($i=0; $i<$longitud; $i++)
  {
     echo  '<div class="row">';
     echo"<br>";
       $id =$rutaArray[$i];
       foreach($conjuntoComercios as $value){
        if($value['idComercio']==$id){

          array_push($rutaDeComercios, $value);
            
        echo Html::a(Yii::t('app',$value['nombre']), ['../web/ruta/view?id='.$id], ['class' => 'btn btn-default']);
        }
       }
     echo"</br>";
     echo '</div>';
  }

    echo '</table>';

  echo '</div>';

?>

</div>

          <style>
     #map-canvas { height: 130px; margin-left: 0px ;margin: 5px ; padding: 160px;},     
    </style>
            <div style="height:100px" class="col-sm-8">
                    <div id="map-canvas"></div>         
            </div> 


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script type="text/javascript">
    
        function initialize() {

    var myOptions = {
      center: new google.maps.LatLng(-34.9036100, -56.1640446),
      zoom: 15,
        };
    var map = new google.maps.Map(document.getElementById("map-canvas"),myOptions);

    var arrayComercios=<?php echo json_encode($rutaDeComercios);?>;
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

