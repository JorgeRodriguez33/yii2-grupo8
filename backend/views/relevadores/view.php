

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

 <style type="text/css">
      html, body, #map-canvasR { height: 100%; margin: 0; padding: 0;},     
    </style>
    <div style="height:100%" class="col-sm-8">
            <div id="map-canvasR"></div>         
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
    ]) ?>



</div>
    



  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script type="text/javascript">
    
        function initialize() {
    var myOptions = {
     // center: new google.maps.LatLng(45.4555729, 9.169236),
      zoom: 13
        };
    var map = new google.maps.Map(document.getElementById("map-canvasR"),
        myOptions);

var comercio = new google.maps.LatLng(45.4555729, 9.169236);


var marker = new google.maps.Marker({
    position: comercio, 
    map: map});

var bounds = new google.maps.LatLngBounds(comercio);
map.fitBounds(bounds);

    }
        google.maps.event.addDomListener(window, 'load', initialize);
     
    </script>
               