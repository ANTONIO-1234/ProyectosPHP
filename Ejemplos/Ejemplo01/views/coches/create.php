<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Coches $model */

$this->title = 'Create Coches';
$this->params['breadcrumbs'][] = ['label' => 'Coches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
