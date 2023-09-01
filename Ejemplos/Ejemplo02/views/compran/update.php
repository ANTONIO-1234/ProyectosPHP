<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Compran $model */

$this->title = 'Update Compran: ' . $model->idCompran;
$this->params['breadcrumbs'][] = ['label' => 'Comprans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCompran, 'url' => ['view', 'idCompran' => $model->idCompran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
