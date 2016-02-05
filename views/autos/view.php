<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Autos */

$this->title = $model->marca.' '.$model->modelo.' '.$model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Autos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Info';
?>
<section id="content">
<div class="container">

<div class="autos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Upload Foto', ['upload', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			[
				'label' => $model->getAttributeLabel('id_admin'),
				'value' =>$model->getAdmin(),
			],
            'marca',
            'modelo',
            'ano',
            'color',
            'no_motor',
            'matricula_auto',
            'no_chassis',
            'observaciones',
            'kilometraje',
            'no_chapa',
            'precio',
            'fecha_registro',
			[
				'label' => $model->getAttributeLabel('id_estado'),
				'value' => Yii::$app->fn->GetAutoStatus($model->id_estado),
			],
			[
				'label' => $model->getAttributeLabel('img'),
				'value' => basename($model->img),
			],
        ],
    ]) ?>
    
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

</div>

</div>
</section>
</div>