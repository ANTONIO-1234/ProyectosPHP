<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Alquiler $model */

$this->title = 'Create Alquiler';
$this->params['breadcrumbs'][] = ['label' => 'Alquilers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alquiler-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
