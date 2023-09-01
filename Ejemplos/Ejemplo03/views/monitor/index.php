<?php

use app\models\Monitor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Monitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Monitor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            [
                'attribute' => 'imagen', 
                'format' => 'raw',
                'value' => function ($modelo) {
                           return Html::img("@web/imgs/monitores/{$modelo->imagen}",
                                   ['style' => 'width:100px']);                
                }
            ],
            'telefono',
            'correo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Monitor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <div>
        <h2>El monitor con más actividades impartidas es: </h2>
        <?= \yii\grid\GridView::widget([
            "dataProvider" => $dataProvider1,
            "layout" => "{items}",
            'columns' => [
                "id",
                "nombre",
                [
                    'attribute' => 'imagen', 
                    'format' => 'raw',
                    'value' => function ($modelo) {
                               return Html::img("@web/imgs/monitores/{$modelo["imagen"]}",
                                       ['style' => 'width:100px']);                
                }
            ],
            'telefono',
            'correo'
            ]
        ])?>
>
    </div>
    
</div>
