<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Monitor $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="monitor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
        ],
    ]) ?>

</div>
