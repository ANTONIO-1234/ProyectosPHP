<?php

use app\models\Salas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Salas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Salas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{summary}\n{items}\n{pager}\n",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'plazas',
            'descripcion',
//          MOSTRAR IMAGEN COMO TAL
            [
                'attribute' => 'imagen', 
                'format' => 'raw',
                'value' => function ($modelo) {
                           return Html::img("@web/imgs/salas/{$modelo->imagen}",
                                   ['style' => 'width:200px']);                
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Salas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
