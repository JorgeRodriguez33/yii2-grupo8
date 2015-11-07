<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Relevadores */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Relevadores',
]) . ' ' . $model->idRelevador;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relevadores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRelevador, 'url' => ['view', 'id' => $model->idRelevador]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="relevadores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
