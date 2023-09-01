<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Realizan $model */

$this->title = 'Create Realizan';
$this->params['breadcrumbs'][] = ['label' => 'Realizans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realizan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <div>
        <h2>Las salas disponibles son: </h2>
        <?= \yii\grid\GridView::widget([
            "dataProvider" => $dataProvider1
        ])?>
    </div>
    
     <div>
        <h2>Los monitores disponibles son: </h2>
        <?= \yii\grid\GridView::widget([
            "dataProvider" => $dataProvider2
        ])?>
    </div>
    
    <div>
        <h2>Las actividades disponibles son: </h2>
        <?= \yii\grid\GridView::widget([
            "dataProvider" => $dataProvider3
        ])?>
    </div>
  
</div>
