<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'nombre_usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contrasena')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_civil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_oficina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provincia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_provincia')->textInput() ?>

    <?= $form->field($model, 'codigo_postal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pais')->textInput() ?>

    <?= $form->field($model, 'numero_casa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_trabajo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_movil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo_trabajo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_registro')->textInput() ?>

    <?= $form->field($model, 'fecha_conexion')->textInput() ?>

    <?= $form->field($model, 'fecha_modif')->textInput() ?>

    <?= $form->field($model, 'id_estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
