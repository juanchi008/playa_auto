<?php
use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Autos */

$this->title = $model->marca.' '.$model->modelo.' '.$model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Autos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Upload';
?>
<section id="content">
<div class="container">

<div class="autos-upload">

    <h2 class="header_2 indent_4"><?= Html::encode($this->title) ?></h2>
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	
		<?php echo $form->errorSummary($upload); ?>
		
		<?php if (!empty($errorMsg) ) { 
			echo '<div style="padding: 10px; background-color: #ff8888; font-weight: bold;">'.
					$errorMsg.
				 '</div>'; 
		}?>
		<?php if (!empty($successMsg) ) { 
			echo '<div style="padding: 10px; background-color: #5cb85c; font-weight: bold;">'.
					$successMsg.
				 '</div>'; 
		}?>
		
		<?= $form->field($upload, 'file')->fileInput() ?>
	
	    <div class="form-group">
	        <?php echo Html::submitButton('Upload', ['class' =>  'btn btn-success']); ?>
	    </div>
	    
	    <hr/>
	    
		<?php 
			$files = $model->GetUploadedPictures();
			
			foreach ($files as $value => $label) {

				$checked = false;
				$return = '<label class="modal-radio">';
				$return .= '<a href="'.$label.'" target="_blank">';
				$return .= '<img src="'.$label.'" width="200" border="0"/>';
				$return .= '</a><br/>';
				/*
				$return .= Html::a('Delete', ['deleteUploadedFiles', 'id' => $model->id,'filePath' => $label], [
						'class' => 'btn btn-danger',
						'data' => [
								'confirm' => 'Are you sure you want to delete : '.basename($label).'?',
								'method' => 'post',
								],
						]);
						*/
				//$return .= '<br/><input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3"'. (($checked) ? " checked" : "").'>';
				$return .= '<i'. (($checked) ? " style=\"font-weight: normal; color: #0000FF;\"" : "").'>  '.basename($label).'</i> <br/>';
				$return .= '</label> ';
				
				echo $return;
			}
		?>
		    
	<?php ActiveForm::end(); ?>

</div>

</div>
</section>
</div>