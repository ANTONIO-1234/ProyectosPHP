<?php

use app\models\Realizan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Realizans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realizan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Realizan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'actividad',
            'actividad0.nombre',
            'sala',
            'sala0.nombre',
            'monitor',
            'monitor0.nombre',
            'fechahora',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Realizan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
