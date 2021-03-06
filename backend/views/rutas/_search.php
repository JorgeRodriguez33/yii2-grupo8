<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RutasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rutas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idRuta') ?>

    <?= $form->field($model, 'idRelevador') ?>

    <?= $form->field($model, 'ordenComercios') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('core', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('core', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
