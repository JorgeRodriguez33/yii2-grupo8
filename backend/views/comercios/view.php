
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


    
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;},     
    </style>
            <div style="height:100%" class="col-sm-8">
                    <div id="map-canvas"></div>         
            </div> 



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



 
    <script type="text/javascript">
    
        function initialize() {
    var myOptions = {
     // center: new google.maps.LatLng(45.4555729, 9.169236),
      zoom: 8
        };
    var map = new google.maps.Map(document.getElementById("map-canvas"),
        myOptions);

var comercio = new google.maps.LatLng(<?=$latitu?>, <?=$longitud?>);


var marker = new google.maps.Marker({
    position: comercio, 
    map: map});

var bounds = new google.maps.LatLngBounds(comercio);
map.fitBounds(bounds);

    }
        google.maps.event.addDomListener(window, 'load', initialize);
     
    </script>
               
                 