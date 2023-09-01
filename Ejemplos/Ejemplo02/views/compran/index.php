<?php

use app\models\Compran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Comprans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Compran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idCompran',
            'idCliente',
            'idCliente0.nombre',
            'idProducto',
            'idProducto0.nombre',
            'fecha',
            'cantidad',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Compran $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCompran' => $model->idCompran]);
                 }
            ],
        ],
    ]); ?>


</div>
