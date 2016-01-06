<?php

/* @var $this yii\web\View */

//use yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\Fn;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
 <!--========================================================
                              CONTENT
    =========================================================-->
<div class="bg_1 wrap_16 wrap_10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="header_1 indent_2 color_3">
                    Toda Clase de Modelos
                </h2>
                <div id="owl_2">
                    <div class="item">
                        <div class="row">
                            <div class="preffix_1 col-lg-10">
                                <ul class="list_3">
                                    <li><a href="#"><img src="../../images/index-1_img09.png" alt="Image 9"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img10.png" alt="Image 10"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img11.png" alt="Image 11"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img12.png" alt="Image 12"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img13.png" alt="Image 13"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img14.png" alt="Image 14"/></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="preffix_1 col-lg-10">
                                <ul class="list_3">
                                    <li><a href="#"><img src="../../images/index-1_img09.png" alt="Image 9"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img10.png" alt="Image 10"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img11.png" alt="Image 11"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img12.png" alt="Image 12"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img13.png" alt="Image 13"/></a></li>
                                    <li><a href="#"><img src="../../images/index-1_img14.png" alt="Image 14"/></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="content">

	<div class="ic">More Website Templates @ TemplateMonster.com - September08, 2014!</div>
    <div class="container">
        <div class="row wrap_11 wrap_20">
            <div class="col-lg-12">
                <div class="text_7 color_2">
<!--                 	<form id="search" name="search" action="#"> -->
                    <?php $form = ActiveForm::begin([ 'id' => 'catalogoSearch', 'method' => 'get', 'action' => Yii::$app->homeUrl.'autos/catalogoajax',] ); 
                    
                    	echo $form->errorSummary($modelSearch); 
                    	?>
                    	
                        <div class="contact-form-loader"></div>
                    	
	                	Busqueda: 
	                    <ul id="filters">
	                        <li>
	                        	<select id="marca" name="AutosSearch[marca]" class="name">
	                        		<option value="">---Marcas ---</option>
	                        		<option value="toyota">Toyota</option>
	                        		<option value="Mercedez">Mercedez</option>
	                        		<option value="Audi">Audi</option>
	                        		<option value="Nissan">Nissan</option>
	                        		<option value="Volvo">Volvo</option>
	                        	</select>
	                        </li>
	                        <li>
	                        	<select id="precioRange" name="AutosSearch[precioRange]">
	                        		<option value="">--- Precios---</option>
	                        		<option value="0 - 5000">Menor a 5000</option>
	                        		<option value="5000 - 10000">5000 $ -10000 $</option>
	                        		<option value="10000 - 20000">10000 $ -20000 $</option>
	                        		<option value="20000 - 30000">20000 $ - 30000 $</option>
	                        		<option value="30000 - 40000">30000 $ - 40000 $</option>
	                        		<option value="40000 - 50000">40000 $ - 50000 $</option>
	                        		<option value="50000 - 60000">50000 $ - 60000 $</option>
	                        		<option value="60000 - 70000">60000 $ - 70000 $</option>
	                        		<option value="70000 - 80000">70000 $ - 80000 $</option>
	                        		<option value="80000 - 90000">80000 $ - 90000 $</option>
	                        		<option value="90000 - 100000">90000 $ - 100000 $</option>
	                        		<option value="100000 - 1000000">1000000 $ o mas </option>
	                        	</select>
	                        </li>
	                        <li>
	                        	<select id="sort" name="AutosSearch[sort]">
	                        		<option value="">--- Nuevos ---</option>
	                        		<option value="1">Ascendente</option>
	                        		<option value="2">Descendente</option>
	                        	</select>
	                        </li>
	                        <li>
<!--  	                        	<a class="btn_3" href="#" data-type="submit">Buscar</a> -->
	                        	<input type="submit" name="AutosSearch[submit]" value="search"/>
	                        	<div class="contact-form-loader"></div>
	                        </li>
	                    </ul>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_1 wrap_17">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="ajaxContainer" class="isotope row">
                    
                    <?php 
                    foreach($models as $model) {
                    	?>
                        <div class="element-item col-lg-4 c1">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="../../images/index-2_img01.jpg" alt="Image 1"/>
                                    
                                    
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#"><?php echo $model->marca.' - '.$model->modelo; ?></a></h3>
                                    <p class="text_3">
                                        <span style="font-weight: bold;">Ano:</span> <?php echo $model->ano; ?><br/>
                                        <span style="font-weight: bold;">Color:</span> <?php echo $model->color; ?><br/>
                                        <span style="font-weight: bold;">observaciones:</span> <?php echo $model->observaciones; ?><br/>
                                        <span style="font-weight: bold;">kilometraje:</span> <?php echo $model->kilometraje; ?><br/>
                                        <span style="font-weight: bold;">Precio:</span> <?php echo number_format($model->precio, 0, '.', '.'); ?> $
                                    </p>
                                    <a class="btn_2" href="#">Más Detalles</a>
                                 </div>
                                 <!-- <a class="btn_2" href="#">Reservar</a></div>-->
                            </div>
                        </div>
                        <?php 
                    }
                    /*
                    ?>
                        <div class="element-item grid_4 c1">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="../../images/index-2_img01.jpg" alt="Image 1"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Tertomino verto</a></h3>
                                    <p class="text_3">
                                        Horem ipsum dolor sit amettetur ing elit. In mollis erat mattis neque
                                        cilisis, sit amet <br/>
                                        ultries wertolio dasererat rutrume. In mollis erat mattis
                                        neque cilisis, sit amet ultries
                                    </p>
                                    <a class="btn_2" href="#">Más Detalles</a></div>
                                    <!-- <a class="btn_2" href="#">Reservar</a></div>-->
                            </div>
                        </div>
                        <div class="element-item grid_4 c1">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="../../images/index-2_img02.jpg" alt="Image 2"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Dertomino vertom</a></h3>
                                    <p class="text_3">
                                        Gorem ipsum dolor sit amettetur ing elit. In mollis erat mattis neque
                                        cilisis, sit amet <br/>
                                        ultries wertolio dasererat rutrume. In mollis erat mattis
                                        neque cilisis, sit amet ultrie
                                    </p>
                                    <a class="btn_2" href="#">Más Detalles</a></div>
                            </div>
                        </div>
                        <div class="element-item grid_4 c1">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="../../images/index-2_img03.jpg" alt="Image 3"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Kertomino vertu</a></h3>
                                    <p class="text_3">
                                        Lorem ipsum dolor sit amettetur ing elit. In mollis erat mattis neque
                                        cilisis, sit amet <br/>
                                        ultries wertolio dasererat rutrume. In mollis erat mattis
                                        neque cilisis, sit amet ultesas
                                    </p>
                                    <a class="btn_2" href="#">Más Detalles</a></div>
                            </div>
                        </div>
                        <div class="element-item grid_4 c2">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="../../images/index-2_img04.jpg" alt="Image 4"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Hertomino ertoq</a></h3>
                                    <p class="text_3">
                                        Horem ipsum dolor sit amettetur ing elit. In mollis erat mattis neque
                                        cilisis, sit amet <br/>
                                        ultries wertolio dasererat rutrume. In mollis erat mattis
                                        neque cilisis, sit amet ultries
                                    </p>
                                    <a class="btn_2" href="#">Más Detalles</a></div>
                            </div>
                        </div>
                        <div class="element-item grid_4 c2">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="../../images/index-2_img05.jpg" alt="Image 5"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Tertomino verto</a></h3>
                                    <p class="text_3">
                                        Forem ipsum dolor sit amettetur ing elit. In mollis erat mattis neque
                                        cilisis, sit amet <br/>
                                        ultries wertolio dasererat rutrume. In mollis erat mattis
                                        neque cilisis, sit amet ultries
                                    </p>
                                    <a class="btn_2" href="#">Más Detalles</a></div>
                            </div>
                        </div>
                        <div class="element-item grid_4 c3">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="../../images/index-2_img06.jpg" alt="Image 6"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Nertomino rtoas</a></h3>
                                    <p class="text_3">
                                        Korem ipsum dolor sit amettetur ing elit. In mollis erat mattis neque cilisis,
                                        sit amet <br/>
                                        ultries wertolio dasererat rutrume. In mollis erat mattis neque
                                        cilisis, sit amet ultriede
                                    </p>
                                    <a class="btn_2" href="#">Más Detalles</a></div>
                            </div>
                        </div>
                        <?php 
                        */
                    	?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

<?php 
$jsParams = ['pageUrl' => Yii::$app->homeUrl.'autos/catalogoajax'];
$jsScript = <<<EOD
$(document).ready(function () {
	$('#catalogoSearch').TMForm({	
		mailHandlerURL:'{$jsParams['pageUrl']}',
		targetDivId: 'ajaxContainer',
		responseType: 'html',
		method: 'GET'
	});
});
EOD;
//$this->getView()->registerJs( $jsScript);
$this->registerJs($jsScript);

?>
