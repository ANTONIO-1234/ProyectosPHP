<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Monitor $model */

$this->title = 'Create Monitor';
$this->params['breadcrumbs'][] = ['label' => 'Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
