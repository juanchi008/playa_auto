<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title; 
?>
 <!--========================================================
                              CONTENT
    =========================================================-->
   <section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - September08, 2014!</div>
        <div class="container">
            <div class="row wrap_11">
                <div class="grid_12">
                    <h2 class="header_2 indent_4">Ubicación</h2>
                </div>
            </div>
        </div>
        <div class="bg_1 wrap_17 wrap_19">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <iframe class="map"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24214.807650104907!2d-73.94846048422478!3d40.65521573400813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1395650655094"
                                style="border:0">
                        </iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="grid_6">
                        <div class="wrap_18">
                            <h2 class="header_2 indent_5">
                                Información
                            </h2>
                            <address>
                                <p class="text_7 color_6">
                                    Avda. Mcal. López esq. Madame Lynch.

                                </p>
                                <p class="text_8">
                         
                                    <br/>
                                    Telefono: 524-646/7 0981 754-821
                                    <br/>
                                    E-mail: <a href="#">Email: ventasconigliaro@gmail.com</a>
                                </p>
                            </address>
                        </div>
                    </div>
                    <div class="grid_6">
                        <div class="wrap_18">
                            <h2 class="header_2 indent_2">
                                Contactenos
                            </h2>
                            <!-- <form id="contact-form" method="post" action="/site/contactajax"> -->
                            <!-- <form id="contact-form"> -->
                            <?php $form = ActiveForm::begin([
                            		'id' => 'contact-form',
                            		'action' => Yii::$app->request->url.'ajax',
                            	  ]); ?>
                                <div class="contact-form-loader"></div>
                                <?php echo $form->errorSummary($model); ?>
                                <fieldset>
                                    <div class="row">
                                        <div class="grid_2">
                                            <label class="name">
                                                <input type="text" name="name" placeholder="Nombre:" value=""
                                                       data-constraints="@Required @JustLetters"/>
                                                <span class="empty-message">*Este Campo es requerido.</span>
                                                <span class="error-message"><?php echo Html::error($model,'name'); ?>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="grid_2">
                                            <label class="email">
                                                <input type="text" name="email" placeholder="E-mail:" value=""
                                                       data-constraints="@Required @Email"/>
                                                <span class="empty-message">*Este Campo es requerido.</span>
                                                <span class="error-message"><?php echo Html::error($model,'email'); ?>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="grid_2">
                                            <label class="phone">
                                                <input type="text" name="phone" placeholder="Telefono:" value=""
                                                       data-constraints="@JustNumbers"/>
                                                <span class="empty-message">*Este Campo es requerido.</span>
                                                <span class="error-message"><?php echo Html::error($model,'phone'); ?>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <label class="message">
                                     <input type="text" name="subject" placeholder="Sujeto:" value=""
                                     		data-constraints="@Required "/>
                                     	<span class="empty-message">*Este Campo es requerido.</span>
                                     	<span class="error-message"><?php echo Html::error($model,'subject'); ?>
                                     	</span>
                                    </label>
                                    <label class="message">
                                        <textarea name="body" placeholder="Mensaje"
                                                  data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                                        <span class="empty-message">*Este Campo es requerido.</span>
                                        <span class="error-message"><?php echo Html::error($model,'body'); ?>
                                        </span>
                                    </label>
                                    <div class="btn-wrap">
                                        <a class="btn_3" href="#" data-type="reset">Limpiar</a>
                                        <a class="btn_3" href="#" data-type="submit">Enviar</a>
                                        <input type="submit" name="submit"/>
                                    </div>
                                </fieldset>
                                <div class="modal fade response-message">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Modal title</h4>
                                            </div>
                                            <div class="modal-body">
                                                Su mensaje ya fue enviado!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
</div>

<?php 
$jsParams = ['pageUrl' =>Yii::$app->request->url.'ajax'];
$jsScript = <<<EOD
$(document).ready(function () {
	$('#contact-form').TMForm({
		recaptchaPublicKey:'6LeZwukSAAAAAG8HbIAE0XeNvCon_cXThgu9afkj',	
		mailHandlerURL:'{$jsParams['pageUrl']}'	
	});
});
EOD;
//$this->getView()->registerJs( $jsScript);
$this->registerJs($jsScript);

?>
