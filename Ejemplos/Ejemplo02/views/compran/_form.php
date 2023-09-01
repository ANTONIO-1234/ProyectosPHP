<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Compran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="compran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliente')->dropDownList(app\models\Clientes::dropDown()) ?>

    <?= $form->field($model, 'idProducto')->dropDownList(app\models\Productos::dropDown()) ?>

    <?= $form->field($model, 'fecha')->input("date") ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
