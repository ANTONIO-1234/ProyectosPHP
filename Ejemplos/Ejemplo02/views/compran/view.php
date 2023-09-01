<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Compran $model */

$this->title = $model->idCompran;
$this->params['breadcrumbs'][] = ['label' => 'Comprans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCompran' => $model->idCompran], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCompran' => $model->idCompran], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'idCompran',
            'idCliente',
            'idCliente0.nombre',
            'idProducto',
            'idProducto0.nombre',
            'idProducto0.peso',
            'fecha',
            'cantidad',
        ],
    ]) ?>

</div>
