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
 	<section id="content">
   
   		<!-- <div class="ic">More Website Templates @ TemplateMonster.com - September08, 2014!</div> -->
        <div class="container">
            <div class="row wrap_11">
                <div class="col-lg-12">
                    <h2 class="header_2 indent_4">Ubicación</h2>
                </div>
            </div>
        </div>
        <div class="bg_1 wrap_17 wrap_19">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                       <iframe class="map"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1275.2329701451713!2d-57.55339603635406!3d-25.307445283447727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x5cb2e660c64bfcc4!2sPMT+Policia+Municipal+de+transito+de+Asuncion!5e0!3m2!1ses-419!2spy!4v1448247429391" 
                                style="border:0">
                        </iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
                        <div class="wrap_18">
                            <h2 class="header_2 indent_2">
                                Contactenos
                            </h2>
                            <!-- <form id="contact-form" method="post" action="/site/contactajax"> -->
                            <!-- <form id="contact-form"> -->
                            <?php $form = ActiveForm::begin([
                            		'id' => 'contact-form',
                            		'action' => '/site/contactajax',
                            	  ]); ?>
                                <div class="contact-form-loader"></div>
                                <?php echo $form->errorSummary($model); ?>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="name">
                                                <input type="text" name="name" placeholder="Nombre:" value=""
                                                       data-constraints="@Required @JustLetters"/>
                                                <span class="empty-message">*Este Campo es requerido.</span>
                                                <span class="error-message">*This is not a valid name.</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="email">
                                                <input type="text" name="email" placeholder="E-mail:" value=""
                                                       data-constraints="@Required @Email"/>
                                                <span class="empty-message">*Este Campo es requerido.</span>
                                                <span class="error-message">*This is not a valid email.</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="phone">
                                                <input type="text" name="phone" placeholder="Telefono:" value=""/>
                                                <span class="empty-message">*Este Campo es requerido.</span>
                                                <span class="error-message">*This is not a valid phone.</span>
                                            </label>
                                        </div>
                                    </div>
                                    <label class="message">
                                     <input type="text" name="subject" placeholder="Sujeto:" value=""
                                     		data-constraints="@Required "/>
                                     	<span class="empty-message">*Este Campo es requerido.</span>
                                     	<span class="error-message">*This is not a valid sbject.</span>
                                    </label>
                                    <label class="message">
                                        <textarea name="body" placeholder="Mensaje"
                                                  data-constraints='@Required @Length(min=10,max=999999)'></textarea>
                                        <span class="empty-message">*Este Campo es requerido.</span>
                                        <span class="error-message">*The message is too short.</span>
                                    </label>
                                    <div class="btn-wrap">
                                        <a class="btn_3" href="#" data-type="reset">Limpiar</a>
                                        <a class="btn_3" href="#" data-type="submit">Enviar</a>
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

<?php 
$jsParams = ['pageUrl' => '/site/contactajax'];
$jsScript = <<<EOD
$(document).ready(function () {
	$('#contact-form').TMForm({
		mailHandlerURL:'{$jsParams['pageUrl']}'	
	});
});
EOD;
//$this->getView()->registerJs( $jsScript);
$this->registerJs($jsScript);

?>
