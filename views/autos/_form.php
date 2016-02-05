<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\Autos */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="autos-form">

    <?php $form = ActiveForm::begin(); ?>
    
		<?php echo $form->errorSummary($model); ?>
		
	    <?php //echo $form->field($model, 'id')->textInput() ?>
	
    	<?php echo $form->field($model, 'id_admin')->dropdownList(
	    		Users::findAllForDropDownList(),
	    		['prompt'=>'--- Select  ---']
    		); ?>
    		
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

    	<?php if (!$model->isNewRecord) : ?>
    	
		    <?php echo $form->field($model, 'fecha_registro')->textInput()->hint('AAAA-MM-DD'); ?>
		    
    	<?php endif; ?>
	    	
	    <?php //echo $form->field($model, 'fecha_registro')->textInput() ?>
	    
    	<?php echo $form->field($model, 'id_estado')->dropdownList(
	    		Yii::$app->fn->GetAutoStatus(),
	    		['prompt'=>'--- Select Status ---']
    		); ?>

	    <?php //echo $form->field($model, 'img')->textInput(['maxlength' => true])->hint('Si no imajen, deja vacio.'); ?>
	    <?php echo $form->field($model, 'img')->radioList(
				$model->GetUploadedPictures(),
				['item' => 
					function($index, $label, $name, $checked, $value) {
						
						$subDirList = explode('/', $label);
						
						$return = '<label class="modal-radio">';
						$return .= '<a href="'.$label.'" target="_blank">';
						$return .= '<img src="'.$label.'" width="200" border="0"/>';
						$return .= '</a><br/>';
						$return .= Html::a('Delete', ['deleteuploadedfiles', 'id' => $subDirList[3],'filePath' => $label], [
							            'class' => 'btn btn-danger',
							            'data' => [
							                'confirm' => 'Are you sure you want to delete : '.basename($label).'?',
							                'method' => 'post',
							            ],
							        ]);
						$return .= '<br/><input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3"'. (($checked) ? " checked" : "").'>';
						$return .= '<i'. (($checked) ? " style=\"font-weight: normal; color: #0000FF;\"" : "").'>  '.basename($label).'</i> <br/>';
						$return .= '</label>';
						
						return $return;
					}
				]
				)->label($model->getAttributeLabel('img')); ?>
	    
	    <div class="form-group">
	        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
	    </div>

    <?php ActiveForm::end(); ?>

</div>
