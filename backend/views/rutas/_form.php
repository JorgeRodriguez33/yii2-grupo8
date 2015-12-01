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
 var radioButTrat = document.getElementsByName("Tipo");
 if ( radioButTrat[0].checked == true) {
 var idrev = document.getElementById("rutas-idrelevador").value;
 $.get('<?= Yii::$app->urlManager->createUrl("rutas/obtenernombrecomercios") ?>' + '?dia=' + $(c).val() + "&" + 'id=' + idrev, function( data ){
    
   // var data = $.parseJSON(data);
    $( "div#container" ).html(data);
        });
}else{
        $.get('<?= Yii::$app->urlManager->createUrl("rutas/nombrecomerciosmanual") ?>', function( data ){
         $('#nuevatabla').remove();
        //decode de json
        var data = $.parseJSON(data);
        var arrayComercios = Array();

        //creo una tabla en "div#container"
         $('div#container').append('<table id="nuevatabla"></table>');
         $('div#containerAgregados').append('<table id="nuevatablaAgregados"></table>');
            //le agrego a la tabla todos los nombres de comercios obtenidos   
           $.each(data, function( index, data ) {
              $('#nuevatabla').append('<tr><td class = btn btn-default id= comercio'+index+'>'+data+'</td></tr>');
            });
        $.each(data, function( index, data ) {
            $('td#comercio'+index).click(function(){
              var ddd = $(this).text();
              arrayComercios.push(ddd);
              $('td#comercio'+index).remove();
               $('#nuevatablaAgregados').append('<tr><td class = btn btn-default>'+ddd+'</td></tr>');

              $.get('<?= Yii::$app->urlManager->createUrl("rutas/getcomercios")?>' + '?nom='+arrayComercios, function( data ){
                $('#rutas-ordencomercios').attr('value',data);
              });
              //$('#rutas-ordencomercios').attr('value',arrayComercios);
            });
         });
      }); 
    }
  }

myFunction = function(c){
    var radioButTrat = document.getElementsByName("Tipo");
if ( radioButTrat[0].checked == true) {
        document.getElementById("manual").style.display="none";
        var idrev = document.getElementById("rutas-idrelevador").value;
        $.get('<?= Yii::$app->urlManager->createUrl("rutas/comerciosautomatic") ?>' + '?dia=' + $(c).val() + "&" + 'id=' + idrev, function( data ){
         debugger;

         
          $('#rutas-ordencomercios').attr('value',data);
       //   $( "div#container" ).html( data );
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
             
               
                
            '])->label('Relevadores');


$diasDeSemana = array('lunes' =>'lunes' ,'martes' =>'martes' ,'miercoles' =>'miercoles' ,'jueves' =>'jueves' ,'viernes' =>'viernes'  );

    echo $form->field($model, 'diaDeRelevamiento')->dropDownList($diasDeSemana,
            ['prompt'=>'-seleccionar dia a relevar-',
              'onchange'=>'
                  misComerciosFunction(this);
                  myFunction(this)
            '])->label('Dia para relevar');


    ?>

    <div id="manual" style="display: none;" >
    <?= $form->field($model, 'ordenComercios')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="tablaComercios">
      <div class="row">
         <div class="col-md-12 col-md-6">
            <h4> comercios <small>
            </small></h4>
            <table>
            <div id="container"></div>
            </table>
         </div>
         <div class="col-md-12 col-md-6">
            <h4> comercios Agregados <small>
            </small></h4>
            <table>
            <div id="containerAgregados"></div>
            </table>
         </div>
      </div>
    <div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('core', 'Create') : Yii::t('core', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>




</div>








