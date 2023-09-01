<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Actividades $model */

$this->title = 'Create Actividades';
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
