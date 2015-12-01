<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Relevadores */

$this->title = Yii::t('core', 'Create Relevadores');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relevadores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relevadores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
