<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Compran $model */

$this->title = 'Create Compran';
$this->params['breadcrumbs'][] = ['label' => 'Comprans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
