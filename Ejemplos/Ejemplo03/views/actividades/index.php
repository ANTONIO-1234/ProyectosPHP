<?php

use app\models\Actividades;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Actividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividades-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Actividades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion',
            [
                'attribute' => 'imagen', 
                'format' => 'raw',
                'value' => function ($modelo) {
                           return Html::img("@web/imgs/actividades/{$modelo->imagen}",
                                   ['style' => 'width:200px']);                
                }
            ],
            'duracion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Actividades $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
