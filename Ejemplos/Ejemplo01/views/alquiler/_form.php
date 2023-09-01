<?php

use app\models\Alquiler;
use app\models\Clientes;
use app\models\Coches;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var View $this */
/** @var Alquiler $model */
/** @var ActiveForm $form */
?>

<div class="alquiler-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
//        $clientes= \app\models\Clientes::find()->all(); ----> SELECT * FROM CLIENTES
//        $datos= yii\helpers\ArrayHelper::map($clientes, "nif", "nombre"); --> CONVIERTE EL RESULTADO DE LA CONSULTA EN UN ARRAY PARA DROPDOWNLIST
//        echo $form->field($model, 'cliente')->dropDownList($datos)
        echo $form->field($model, 'cliente')->dropDownList(Clientes::Dropdown())
    ?>

    <?php
//        $coches= \app\models\Coches::find()->all();
//        $datos2= yii\helpers\ArrayHelper::map($coches, "bastidor", "bastidor");
//        echo $form->field($model, 'coche')->dropDownList($datos2)
        echo $form->field($model, 'coche')->dropDownList(Coches::Dropdown())
    ?>

    <?= $form->field($model, 'fechaAlquiler')->input("datetime-local") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>