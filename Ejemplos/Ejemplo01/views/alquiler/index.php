<?php

use app\models\Alquiler;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alquilers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alquiler-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Alquiler', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idAlquiler',
            'cliente',
            'coche',
            'fechaAlquiler',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Alquiler $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idAlquiler' => $model->idAlquiler]);
                 }
            ],
        ],
    ]); ?>


</div>
