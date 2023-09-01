<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Alquiler $model */

$this->title = 'Update Alquiler: ' . $model->idAlquiler;
$this->params['breadcrumbs'][] = ['label' => 'Alquilers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAlquiler, 'url' => ['view', 'idAlquiler' => $model->idAlquiler]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alquiler-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
