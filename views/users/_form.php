<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'passwordConfirm')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'lang')->dropdownList(
    		Yii::$app->fn->GetLang(),
    		['prompt'=>'--- Select and Admin ---']
    	) ?>

    <?= $form->field($model, 'is_super_admin')->checkbox() ?>
    
    <?= $form->field($model, 'added_by_id')->dropdownList(
    		Users::find()->select(['id', 'fullname'])->indexBy('id')->column(),
    		['prompt'=>'--- Select and Admin ---']
    	) ?>

    <?php //echo $form->field($model, 'is_super_admin')->textInput() ?>
    
    <?php //echo $form->field($model, 'added_by')->textInput() ?>
    
    <?php echo $form->field($model, 'date_login')->textInput() ?>
    
    <?php echo $form->field($model, 'date_modify')->textInput() ?>

    <?php echo $form->field($model, 'date_create')->textInput() ?>
    
    <?= $form->field($model, 'status_id')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    
</div>
