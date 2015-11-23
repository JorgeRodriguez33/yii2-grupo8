

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Productos;
use backend\controller\ProductosController;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $model backend\models\Relevadores */

$this->title = $model->idRelevador;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relevadores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    

<div class="relevadores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idRelevador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idRelevador], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

 <style>
    #map-canvas {height: 100%; margin: -5px; padding: 0;},     
    </style>
    <div style="height:450px" class="col-sm-8">
            <div id="map-canvas"></div>         
    </div> 
    

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idRelevador',
            'nombre',
            'kmARecorrer',
            'correo',
            'latitud',
            'longitud',
            'direccion',
        ],
    ]) 

    ?>

    <?php

    $latitu = $model->latitud;
    $longitud = $model->longitud;

       ?>



</div>
    



    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript">
    
        function initialize() {
    var myOptions = {
     // center: new google.maps.LatLng(-34.9036100, -56.1640446),
      zoom: 0
        };
    var map = new google.maps.Map(document.getElementById("map-canvas"),
        myOptions);

    var relev = new google.maps.LatLng(<?=$latitu?>, <?=$longitud?>);


    var marker = new google.maps.Marker({
        position: relev, 
        map: map});
    var bounds = new google.maps.LatLngBounds(relev);
    map.fitBounds(bounds);

    }
        google.maps.event.addDomListener(window, 'load', initialize);
     
    </script>
               