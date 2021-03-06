<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Comercios */

$this->title = Yii::t('core', 'Update {modelClass}: ', [
    'modelClass' => 'Comercios',
]) . ' ' . $model->idComercio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comercios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idComercio, 'url' => ['view', 'id' => $model->idComercio]];
$this->params['breadcrumbs'][] = Yii::t('core', 'Update');
?>
<div class="comercios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
