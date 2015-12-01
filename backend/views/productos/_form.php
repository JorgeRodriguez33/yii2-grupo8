<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\widgets\beginWidget;
use yii\helpers\ArrayHelper;
use backend\models\Categorias;
/* @var $this yii\web\View */
/* @var $model backend\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
    ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagen')->fileInput() ?>
    
    <?php

    $categorias = ArrayHelper::map(Categorias::find()->all(), 'idCate', 'nombre');
    echo $form->field($model, 'idCat')->dropDownList($categorias)->label('Categoría');

     ?>
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('core', 'Create') : Yii::t('core', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
			<?php ActiveForm::end(); ?>
</div>


