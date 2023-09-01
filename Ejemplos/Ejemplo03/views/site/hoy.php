<?php

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="text-center"> 
        <?= \yii\helpers\Html::img("@web/imgs/site/1.png")?>
    </div>
    
    <div>
        <h2>Las actividades disponibles para hoy son: </h2>
        
>        <?= \yii\grid\GridView::widget([
            "dataProvider" => $dataProvider1,
            "columns"  => [
                [
                    "label" => "actividad",
                    "value" => "actividad0.nombre",
                ],
                "actividad0.duracion", 
                "actividad0.descripcion",
                [
                    "label" => "imagen",
                    "format" => "raw",
                    "value" => function ($modelo) {
                        return yii\Helpers\Html::img("@web/imgs/actividades/{$modelo->actividad0->imagen}",
                                ['style' => 'width:200px']);                        
                        }
                    ],
                [
                    "label" => "sala",
                    "value" => "sala0.nombre",
                ],
                [
                    "label" => "monitor",
                    "value" => "monitor0.nombre",
                ],
                "fechahora",
                [
                    "label" => "otros datos",
                    "format" => "raw",
                    "value" => function ($modelo) {
                        return yii\Helpers\Html::a("ver datos...",
                               ["realizan/view", "id" => $modelo->id]);                        
                        }
                ],
            ]
        ])?>

    </div>
    
</div>

