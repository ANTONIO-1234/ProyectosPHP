<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Coches $model */

$this->title = $model->bastidor;
$this->params['breadcrumbs'][] = ['label' => 'Coches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coches-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'bastidor' => $model->bastidor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'bastidor' => $model->bastidor], [
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
            'bastidor',
            'matricula',
            'modelo',
            'marca',
            'cilindrada',
            'tipo',
            'fechaCompra',
        ],
    ]) ?>

</div>
