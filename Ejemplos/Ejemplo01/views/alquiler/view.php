<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Alquiler $model */

$this->title = $model->idAlquiler;
$this->params['breadcrumbs'][] = ['label' => 'Alquilers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alquiler-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idAlquiler' => $model->idAlquiler], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idAlquiler' => $model->idAlquiler], [
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
            'idAlquiler',
            'cliente',
            'coche',
            'fechaAlquiler',
        ],
    ]) ?>

</div>
