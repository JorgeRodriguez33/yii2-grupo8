<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Productos;
/* @var $this yii\web\View */
/* @var $model backend\models\Comercios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comercios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prioridad')->textInput() ?>

    <?php
    // $productos = ArrayHelper::map(Productos::find()->all(), 'idProd', 'nombre');
    $productos = ArrayHelper::map(Productos::find()->all(), 'nombre', 'nombre');

    $i = 0;
    $arrayPapa=array();
    $array = explode('"', $model->productos); 
        foreach ($array as $value) {
            if($value!="["){
                if($value!=']'){
                    if( $value!=','){
                    $arrayPapa[$i] = $value;
                    $i++;
                    }
                }
            }
        }

    $model->productos = $arrayPapa;
         ?>

        <tr>
        <td><?php echo $form->field($model, 'productos')->checkboxList($productos)->label('nombre'); ?></td>
    </tr>        


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<!--ATENCION CODIGO PARA HACER UN DROPDOWNLIST  -->
  <?php
    /*  $productos = ArrayHelper::map(Productos::find()->all(), 'idProd', 'nombre');
        echo $form->field($model, 'nombre')->dropDownList(
            $productos,
            [
                'prompt'=>'Por favor elija un producto',
                'onchange'=>'
                                $.get( "'.Url::toRoute('Productos/productos').'", { id: $(this).val() } )
                                    
                                );
                            '
            ]
        );*/
    ?>

    



