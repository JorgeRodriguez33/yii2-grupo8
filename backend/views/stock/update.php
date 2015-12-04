<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Stock */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Stock',
]) . ' ' . $model->idStock;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idStock, 'url' => ['view', 'id' => $model->idStock]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
