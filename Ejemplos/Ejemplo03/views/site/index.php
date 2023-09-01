<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">GIMNASIO ALPE</h1>

        <p> Bienvenidos a nuestro gimnasio</p>
    </div>

    <div class="text-center"> 
        <?= \yii\helpers\Html::img("@web/imgs/site/1.png")?>
    </div>
    
    <div>
        <h2>Las actividades disponibles de hoy son: </h2>
        <?= \yii\grid\GridView::widget([
            "dataProvider" => $dataProvider,
            'columns' => [

                'id',
                'nombre',
                'descripcion',
                [
                    'attribute' => 'imagen', 
                    'format' => 'raw',
                    'value' => function ($modelo) {
                               return yii\helpers\Html::img("@web/imgs/actividades/{$modelo["imagen"]}",
                                      ['style' => 'width:200px']);                
                    }
                ],
                'duracion',
                [
                    'attribute' => 'mas informacion',
                    'format' => 'raw',
                    'value' => function ($modelo) {
                               return yii\helpers\Html::a("Detalles...",
                                     ['site/informacion','id' => $modelo["id"]]);
                               }
                ]

            ],
        ])?>
>
        <h2>Las actividades más impartidas son: </h2>
        <?= \yii\grid\GridView::widget([
            "dataProvider" => $dataProvider1,
            'columns' => [

                'actividad',
                'nombre',
                'descripcion',
                [
                    'attribute' => 'imagen', 
                    'format' => 'raw',
                    'value' => function ($modelo) {
                               return yii\helpers\Html::img("@web/imgs/actividades/{$modelo["imagen"]}",
                                       ['style' => 'width:200px']);                
                    }
                ],
                'duracion',
                'veces'
            ],
        ])?>
    </div>
    
</div>
