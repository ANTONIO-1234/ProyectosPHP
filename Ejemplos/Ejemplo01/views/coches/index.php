<?php

use app\models\Coches;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Coches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coches-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Coches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bastidor',
            'matricula',
            'modelo',
            'marca',
            'cilindrada',
            //'tipo',
            //'fechaCompra',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Coches $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'bastidor' => $model->bastidor]);
                 }
            ],
        ],
    ]); ?>


</div>
