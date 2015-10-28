<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Productos;

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
    $s =(string)$model->productos;
    var_dump($s);
   // $datos = json_decode($s, true);
 //   $model->productos = $datos;

   ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idComercio',
            'nombre',
            'latitud',
            'longitud',
            'prioridad',
            'productos',
        ],
    ]) ?>







</div>
