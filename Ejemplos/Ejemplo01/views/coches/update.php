<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Coches $model */

$this->title = 'Update Coches: ' . $model->bastidor;
$this->params['breadcrumbs'][] = ['label' => 'Coches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bastidor, 'url' => ['view', 'bastidor' => $model->bastidor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
