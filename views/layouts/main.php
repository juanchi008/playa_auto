<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\Fn;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <?php  //echo Html::csrfMetaTags(); ?>
    
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
    
    <?php $this->head() ?>
    
    <link rel="stylesheet" href="../../css/grid.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/camera.css"/>
    <link rel="stylesheet" href="../../css/owl.carousel.css"/>
    <link rel="stylesheet" href="../../css/isotope.css"/>
    <link rel="stylesheet" href="../../css/contact-form.css"/>
    
    <title><?= Html::encode($this->title) ?></title>
    
    
</head>

<body>
<?php $this->beginBody() ?>


<div class="page">
<!--========================================================
                          HEADER
=========================================================-->
<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand put-left">
                        <h1>
                            <a href="<?= Yii::$app->homeUrl ?>">
                                <img src="../../images/logo.png" alt="Logo"/>
                            </a>
                        </h1>
                    </div>
                    <nav class="nav put-right">
                        <ul class="sf-menu">
                            <li class="current"><a href="<?php echo Yii::$app->homeUrl; ?>site/index">Inicio</a></li>
                            <li><a href="<?php echo Yii::$app->homeUrl; ?>autos/catalogo">Catálogo</a>

                            <li>
                                <a href="<?php echo Yii::$app->homeUrl; ?>site/about">Acerca</a>
                            </li>
                            <li><a href="<?php echo Yii::$app->homeUrl; ?>site/contact">Contactos</a></li>
                            <?php 

                            if(Yii::$app->user->isGuest ) {
								?>
	                            <li><a href="<?php echo Yii::$app->homeUrl; ?>site/login">Login</a></li>
	                        	<?php 
	                        }
	                        else {
								?>
    							<?php if( !Yii::$app->user->Identity->isAdmin()) {?>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>clientes/view?id=<?php echo Yii::$app->user->Identity->id; ?>" >Mi Cuenta</a></li>
    							<?php }?>
								<li><a href="#">Administracion</a>
									<ul>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>users">Admins/</a></li>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>autos">Autos/index</a>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>paises">Paises</a>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>clientes">Clientes</a>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>logs">Logs</a>
									<!--  
									<li><a href="<?php echo Yii::$app->homeUrl; ?>provincias">Provincias</a>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>contratos">Contratos</a>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>estados">Estados</a>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>formsDatos">Forms Datos</a>
									-->
									</ul>
								<li>
								
	                            <li><a id="logoutLink" href="#">Logout</a></li>
								<?php
								//  'linkOptions' => ['data-method' => 'post']
								// <li><form method="POST" action="<?php echo Yii::$app->homeUrl; site/logout"> <a href="#" data-method = "post">Logout</a></form></li>
							}
	                        ?>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<?php 
echo '<div class="container">'.
			Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]).
	 '</div>';

echo $content; 
?>

<form id="logoutForm" method="POST" action="<?php echo Yii::$app->homeUrl; ?>site/logout">
	<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
</form>
</div><!-- class="page" -->

<!--========================================================
                          FOOTER
=========================================================-->

<footer id="footer" class="color_9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="info text_4 color_4">
                    &copy; <span id="copyright-year"></span> Conigliaro Automóviles | <a href="#">Privacy Policy</a> <br/>
                    Created by <a href="#" rel="nofollow">Juanchi</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>

<!--     <script src="../../js/jquery.js"></script> -->
    <script src="../../js/jquery-migrate-1.2.1.js"></script>
    <script src="../../js/jquery.equalheights.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="../../js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    <script src="../../js/camera.js"></script>
    <script src="../../js/owl.carousel.js"></script>
    <script src='../../js/isotope.min.js'></script>
    <script src="../../js/jquery.equalheights.js"></script>
    <script src="../../js/modal.js"></script>
    <script src="../../js/TMForm.js"></script>
    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="../../js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
    <![endif]-->
    
	<script src="../../js/script.js"></script>
	
	<script language="javascript">
		$(document).ready(function () {
			$('#logoutLink').click(function() {
				$('#logoutForm').submit();
			});
		});
	</script>
</body>
</html>
<?php $this->endPage() ?>
