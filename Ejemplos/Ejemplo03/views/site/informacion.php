<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">GIMNASIO ALPE</h1>

    </div>

    <div class="text-center"> 
        <?= \yii\helpers\Html::img("@web/imgs/site/1.png")?>
    </div>
    
    <div>
        <h2>Las actividades disponibles de hoy son: </h2>
        <?= \yii\grid\GridView::widget([
            "dataProvider" => $dataProvider,
            'columns' => [
                [
                    'label' => 'Actividad',
                    'value' => 'actividad0.nombre'
                ],
                [
                    'label' => 'Monitor',
                    'value' => 'monitor0.nombre'
                ],
                [
                    'label' => 'Sala',
                    'value' => 'sala0.nombre'
                ],
                'fechahora',
                [
                    'label' => 'Duracion',
                    'value' => 'actividad0.duracion'
                ],
            ],
        ])?>

    </div>
    
</div>
