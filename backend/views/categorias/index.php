<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Categorias', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCate',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

        <?php
    $this->registerJs(
        "$(document).on('click', '#activity-index-link', (function() {
            $.get(
                $(this).data('url'),
                function (data) {
                    $('.modal-body').html(data);
                    $('#modal').modal();
                }
            );
        }));"
    ); ?>
     
    <?php
    
    Modal::begin([
        'id' => 'modal',
        'header' => '<h4 class="modal-title">Complete</h4>',
        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
    ]);
     
    echo "<div class='well'></div>";
     
    Modal::end();
    ?>
</div>
