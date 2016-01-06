<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Autos */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="autos-form">

    <?php $form = ActiveForm::begin(); ?>
    
	<h2 class="header_1 indent_2 color_3"><?php echo $msg; ?></h2>
	<?php echo $form->errorSummary($model); ?>
	
    <?php //echo $form->field($model, 'id')->textInput() ?>

    <?php echo $form->field($model, 'marca')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'modelo')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'ano')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'color')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'no_motor')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'matricula_auto')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'no_chassis')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'observaciones')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'kilometraje')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'no_chapa')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'precio')->textInput() ?>

    <?php //echo $form->field($model, 'fecha_registro')->textInput() ?>

    <?php echo $form->field($model, 'id_estado')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
