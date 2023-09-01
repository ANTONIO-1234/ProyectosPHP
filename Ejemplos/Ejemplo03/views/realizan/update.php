<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Realizan $model */

$this->title = 'Update Realizan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Realizans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="realizan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
