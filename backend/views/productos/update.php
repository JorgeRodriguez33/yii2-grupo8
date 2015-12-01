<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */

$this->title = Yii::t('core', 'Update {modelClass}: ', [
    'modelClass' => 'Productos',
]) . ' ' . $model->idProd;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProd, 'url' => ['view', 'id' => $model->idProd]];
$this->params['breadcrumbs'][] = Yii::t('core', 'Update');
?>
<div class="productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
