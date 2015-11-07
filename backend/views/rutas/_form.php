<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="moment.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap-datetimepicker.min.js"></script>
<link href="bootstrap-datetimepicker.css" rel="stylesheet">
<link href="bootstrap-datetimepicker.min.css" rel="stylesheet">

<script >

function mostrarReferencia(){

if (document.fTipo.Tipo[1].checked) {
alert("asasass");
document.getElementById("manual").style.display="block";
} else {

document.getElementById("manual").style.display="none";
}

}
/*
function ocultarTodo(){ 

if(document.fTipo.Tipo[0].checked)  {

document.getElementById('manual').style.display='none';
document.getElementById("manual").style.display="none";
} 
}*/
</script>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Relevadores;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Rutas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rutas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $relevador = ArrayHelper::map(Relevadores::find()->all(), 'idRelevador', 'nombre');

    echo $form->field($model, 'idRelevador')->dropDownList($relevador)->label('Relevadores');

    ?>

        <h4>Definir Ruta<br />
    <small><input type="radio" name="Tipo" value="automatica" id="Tipo_0" class="radio-inline" onclick="ocultarTodo();" /> automatica</small>
    <small><input type="radio" name="Tipo" value="manual" id="Tipo_1" class="radio-inline" onclick="mostrarReferencia();" /> manual</small>
    </h4>

    <div id="manual" style="display: none;" >
    	<form name="fTipo">
    <?= $form->field($model, 'ordenComercios')->textInput(['maxlength' => true]) ?>
    </form>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>








