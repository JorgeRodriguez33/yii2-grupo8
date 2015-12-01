<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rutas */

$this->title = Yii::t('core', 'Update {modelClass}: ', [
    'modelClass' => 'Rutas',
]) . ' ' . $model->idRuta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rutas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRuta, 'url' => ['view', 'id' => $model->idRuta]];
$this->params['breadcrumbs'][] = Yii::t('core', 'Update');
?>
<div class="rutas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
