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
    <?php $relevadores = ArrayHelper::toArray(Relevadores::find()->all());?>



    <?php unset($usuarios['1']); ?>
    
    <?php

    foreach ($relevadores as $value) {
       if(!in_array($value['idUsuario'],$usuarios,true)){
            unset($usuarios[$value['idUsuario']]);
       }
    }

         ?>


    <?= $form->field($model, 'idUsuario')->dropDownList($usuarios)->label('usuario del relevador')?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'kmARecorrer')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('core', 'Create') : Yii::t('core', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
