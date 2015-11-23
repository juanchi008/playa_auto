<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--========================================================
                              CONTENT
=========================================================-->
	<section id="content">

        <div class="container">
            <div class="row wrap_11">
                <div class="grid_12">
                    <h2 class="header_2 indent_4"><?= Html::encode($this->title) ?></h2>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">

                <div class="grid_7">
                
                    <div id="contact-form">

					    <?php 
					    $form = ActiveForm::begin([
					        'id' => 'login-form',
					        'options' => ['class' => 'form-horizontal'],
							'method' => 'post',
					        'fieldConfig' => [
					            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
					            'labelOptions' => ['class' => 'col-lg-1 control-label'],
					        ],
					    ]); ?>
					    
                            <fieldset style="border: 1px solid #cccccc; padding-top: 10px; padding-bottom: 20px;">
                            
                            	<legend style="margin-left: 15px;"><p class="text_7 color_6">Ingrese su datos</p></legend>
                            	
								<div class="grid_6">
						        	<?= $form->field($model, 'username') ?>
								</div>
								
								<div class="grid_6">
						        	<?= $form->field($model, 'password')->passwordInput(['class' => 'message']) ?>
								</div>
								
								<div class="grid_6">
							        <?= $form->field($model, 'rememberMe')->checkbox() ?>
								</div>
								
						        <div class="grid_6">
                                    <a class="btn_3" href="#" data-type="submit" data-method="POST">Enviar</a>
						            <?= Html::submitButton('Login', ['name' => 'login-button']) ?>
						        </div>
					
                            </fieldset>
					    <?php ActiveForm::end(); ?>
    				</div>
    			</div>
    		</div>
    	</div>
	</section>
