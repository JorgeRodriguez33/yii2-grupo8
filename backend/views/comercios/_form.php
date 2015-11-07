
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Productos;
use yii\helpers\BaseHtml;
/* @var $this yii\web\View */
/* @var $model backend\models\Comercios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comercios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre' )->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?php

     $prioridades = array('alta' =>'alta','baja' =>'baja');

     echo $form->field($model, 'prioridad')->dropDownList($prioridades)->label('prioridad del comercio');
  
    // $productos = ArrayHelper::map(Productos::find()->all(), 'idProd', 'nombre'); 
$productos = ArrayHelper::map(Productos::find()->all(), 'idProd', 'nombre');
$diasDeSemana = array('lunes' =>'lunes' ,'martes' =>'martes' ,'miercoles' =>'miercoles' ,'jueves' =>'jueves' ,'viernes' =>'viernes'  );
    $i = 0;
    $j = 0;

    $arrayProd=array();
    $array = explode('"', $model->productos); 
        foreach ($array as $value) {
            if($value!="["){
                if($value!=']'){
                    if( $value!=','){
                    $arrayProd[$i] = $value;
                    $i++;
                    }
                }
            }
        }

    $arrayDias=array();
    $arrayD = explode('"', $model->diasParaRelevar); 
        foreach ($arrayD as $value) {
            if($value!="["){
                if($value!=']'){
                    if( $value!=','){
                    $arrayDias[$j] = $value;
                    $j++;
                    }
                }
            }
        }

    $model->productos = $arrayProd;
    $model->diasParaRelevar = $arrayDias;
         ?>

    <tr>
        <td><?php 
       echo $form->field($model, 'productos')->checkboxList($productos); ?>
       </td>
    </tr>

    <tr>
        <td><?php 
       echo $form->field($model, 'diasParaRelevar')->checkboxList($diasDeSemana)->label('Dias para Relevar'); ?>
       </td>
    </tr>

    <div class="form-group" >
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



