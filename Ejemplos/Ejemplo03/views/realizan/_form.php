<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Realizan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="realizan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'actividad')->dropDownList(app\models\Actividades::dropDown(),[
        'prompt' => 'Selecciona una actividad'
    ]) ?>

    <?= $form->field($model, 'sala')->dropDownList(app\models\Salas::dropDown(),[
        'prompt' => 'Selecciona una sala'
    ]) ?>

    <?= $form->field($model, 'monitor')->dropDownList(app\models\Monitor::dropDown(),[
        'prompt' => 'Selecciona un monitor'
    ]) ?>

    <?= $form->field($model, 'fechahora')->input("datetime-local") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    

</div>
