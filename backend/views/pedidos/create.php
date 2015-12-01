<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pedidos */

$this->title = Yii::t('core', 'Create Pedidos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
