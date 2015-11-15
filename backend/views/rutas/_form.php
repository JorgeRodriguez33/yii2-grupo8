<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/moment.js"></script>
<!--

<script type="text/javascript" src="bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap-datetimepicker.min.js"></script>
<link href="bootstrap-datetimepicker.css" rel="stylesheet">
-->
<link href="bootstrap-datetimepicker.min.css" rel="stylesheet">


<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Relevadores;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $model backend\models\Rutas */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
misComerciosFunction = function(c){
 $.get('<?= Yii::$app->urlManager->createUrl("rutas/obtenernombrecomercios") ?>' + '?id=' + $(c).val(), function( data ){
    $( "div#container" ).html( data );
        });



}

myFunction = function(c){
    var radioButTrat = document.getElementsByName("Tipo");
if ( radioButTrat[0].checked == true) {
        document.getElementById("manual").style.display="none";
        $.get('<?= Yii::$app->urlManager->createUrl("rutas/comerciosautomatic") ?>' + '?id=' + $(c).val(), function( data ){
         debugger;
//         var data = $.parseJSON(data);
          $('#rutas-ordencomercios').attr('value',data);
       //$( "div#container" ).html( data );
        });

    } else if( radioButTrat[1].checked == true){
         document.getElementById("manual").style.display="block";
         $.get('<?= Yii::$app->urlManager->createUrl("rutas/comerciosmanual") ?>' + '?id=' + $(c).val(), function( data ){
         //$( "div#container" ).html( data );
         
         $('#rutas-ordencomercios').attr('value',data);

    });
  }
}


</script>

<div class="rutas-form">

    <?php $form = ActiveForm::begin(); ?>
         <h4>Definir Ruta<br />
    <small><input type="radio" name="Tipo" value="automatica" id="Tipo_1" class="radio-inline"/> automatica</small>
    <small><input type="radio" name="Tipo" value="manual" id="Tipo_0" class="radio-inline"/> manual</small>
    </h4> 
    <?php
    
    $relevador = ArrayHelper::map(Relevadores::find()->all(), 'idRelevador', 'nombre');

    echo $form->field($model, 'idRelevador')->dropDownList($relevador,
            ['prompt'=>'-seleccionar Relevador-',
              'onchange'=>'
              misComerciosFunction(this)
                myFunction(this)
                
            '])->label('Relevadores');

    ?>

    <div id="manual" style="display: none;" >
    <?= $form->field($model, 'ordenComercios')->textInput(['maxlength' => true]) ?>
    </div>

    <h4> comercio <small>
    </small></h4>
    <table>
    <div id="container"></div>
    </table>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>




</div>








