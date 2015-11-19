<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AutosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'ano') ?>

    <?= $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'no_motor') ?>

    <?php // echo $form->field($model, 'matricula_auto') ?>

    <?php // echo $form->field($model, 'no_chassis') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'kilometraje') ?>

    <?php // echo $form->field($model, 'no_chapa') ?>

    <?php // echo $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'fecha_registro') ?>

    <?php // echo $form->field($model, 'id_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
