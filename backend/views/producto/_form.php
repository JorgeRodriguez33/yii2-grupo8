<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'imagen')->fileInput(['multiple' => true]) ?>
    
    <?= $form->field($model, 'idCat')->textInput() ?>
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	<?php
		//$path = 'C:/xampp/htdocs/yii2-grupo8/backend/views/imagen/pe.png';
	    $path = UploadedFile::getInstance($model,'imagen');
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$base64 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAK8AAACvAQMAAA
				   CxXBw2AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAWVJREFUSIn
				   Nlr2Vg0AMhMUjIKQEl0Jpx3ZGKS7BIYHfzukPHevDKVolmO85mBWaWRG0Nhrf8
				   2vZMOprpe4wGMuPwMQlf3vT4/kjD64czJJUMAtUzDq3wPyX+UU9YMA7eInXbvC
				   nwKFKn6kDjDqhaawPROB2Tu7EbhKITlx554ul7sYfAr0GYKcFK7V1Jz6UMX4Ap
				   U47e3wNrO80JOOjnoTAGjvxoGknSsJeHtQ8oRyHVQ8gjZbUlMbSnIVhn9wFlkM
				   gD6McAJaaRZ1FWdhm0Dpoc1DJvITyF49p2N4Dh7n16iuemhQTm4Nj+Nwkmpqz53
				   c2HiMHrQKL2Wm0CVVMeVi2MM1BK73qxFKOPcY3SsQ+fC4wYl3aLv2WRxJ2Sc02c
				   74BJZS2PnArUA6z+P4NP9Wagk8bdVTtEOMacyjJzY3I7zRsX/oKq5fUSfnYG3ja
				   qHGEkuw6OdgkNQLP6y3kyqZ/W+9t+BeB6j/x9fcYdwAAAABJRU5ErkJggg==";
		echo $path;
	//	$data = file_get_contents($path);
		//$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		//$base64NU = $base64; 
		//echo $base64;
		//list(, $base64NU) = explode(';', $base64NU);
		//list(, $base64NU) = explode(',', $base64NU);
		//$base64NU = base64_decode($base64NU);
		//echo $base64NU;*/
		//file_put_contents('unodepiera.png', $base64NU);	
		echo '<img src="'.$base64.'">';
		//echo strlen($base64NU);?>

			<?php ActiveForm::end(); ?>

</div>
