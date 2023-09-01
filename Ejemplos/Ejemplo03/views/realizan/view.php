<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Realizan $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Realizans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="realizan-view">

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
            'actividad',
            [
                "attribute" => "Nombre de la actividad",
                "value" => function($modelo){   // FUNCIÓN SIN NOMBRE (CLOSURE)
                    return $modelo->actividad0->nombre;
                } 
            ],
            'sala',
            [
                "attribute" => "Nombre de la sala",
                "value" => function($modelo){
                    return $modelo->sala0->nombre;
                } 
            ],
            'monitor',
            [
                "attribute" => "Nombre del monitor",
                "value" => function($modelo){
                    return $modelo->monitor0->nombre;
                } 
            ],    
            'fechahora',
        ],

    ]) ?>

</div>
