<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\UploadedFile;
/* @var $this yii\web\View */
/* @var $model backend\models\Productos */

$this->title = $model->idProd;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('core', 'Update'), ['update', 'id' => $model->idProd], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('core', 'Delete'), ['delete', 'id' => $model->idProd], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('core', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
         

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idProd',
            'nombre',
            'idCat', 

        ],
    ])
     ?>
    <?= Html::label('Imagen')?>
    <?= Html::img(''.$model->imagen.'', ['alt' => 'Imagen' , 'width'=>'400','height'=>'400'])?>


</div>
