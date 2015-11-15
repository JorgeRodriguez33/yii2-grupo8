<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dektrium\user\models\User;
use backend\models\Relevadores;
/* @var $this yii\web\View */
/* @var $model backend\models\Relevadores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relevadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $usuarios = ArrayHelper::map(user::find()->all(), 'id', 'username')?>
    <?php $relevadores = ArrayHelper::map(Relevadores::find()->all(), 'idRelevador', 'idUsuario');?>

    <?php unset($usuarios['1']); ?>
    
    <?php
    $longitud = count($relevadores);
     for($i=1;$i<=$longitud;$i++){
     	if($relevadores[$i]!==0){
    		unset($usuarios[$relevadores[$i]]);
     	}

    	}  ?>


    <?= $form->field($model, 'idUsuario')->dropDownList($usuarios)->label('usuario del relevador')?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'kmARecorrer')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
