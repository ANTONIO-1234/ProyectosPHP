<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Coches $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="coches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bastidor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cilindrada')->textInput() ?>

    <?= $form->field($model, 'tipo')->dropDownList([ 'turismo' => 'Turismo', 'suv' => 'Suv', 'furgoneta' => 'Furgoneta', '4x4' => '4x4', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'fechaCompra')->input("date") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
