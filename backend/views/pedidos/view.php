<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedidos */

$this->title = $model->idPedido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('core', 'Update'), ['update', 'id' => $model->idPedido], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('core', 'Delete'), ['delete', 'id' => $model->idPedido], [
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
            'idPedido',
            'nombreComercio',
            'nombreProducto',
            'cantidad',
        ],
    ]) ?>

</div>
