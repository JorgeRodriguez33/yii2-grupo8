<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ComerciosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comercios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idComercio') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'latitud') ?>

    <?= $form->field($model, 'longitud') ?>

    <?= $form->field($model, 'prioridad') ?>

    <?php // echo $form->field($model, 'productos') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
