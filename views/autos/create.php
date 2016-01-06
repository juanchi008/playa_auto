<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Autos */

$this->title = 'Vender mi auto';
$this->params['breadcrumbs'][] = ['label' => 'Autos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--========================================================
                              CONTENT
=========================================================-->
	<section id="content">

        <div class="container">
             <div class="row wrap_11">
                <div class="col-lg-12">
                    <h2 class="header_2 indent_4"><?= Html::encode($this->title) ?></h2>

                    <div style="border: 1px solid #cccccc; padding: 20px; margin-bottom: 20px;">
                    
                    	<!-- <legend><p class="text_7 color_6">Ingrese su datos</p></legend> -->
                    	
					    <?php echo $this->render('_form', ['model' => $model, 'msg' => $msg])  ?>
					    
			    	</div>
    			</div>
    		</div>
    	</div>
	</section>
