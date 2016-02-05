<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autos-index">

    <h2 class="header_2 indent_4"><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Autos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'marca',
            'modelo',
            'ano',
            //'color',
            // 'no_motor',
            // 'matricula_auto',
            // 'no_chassis',
            // 'observaciones',
            // 'kilometraje',
            // 'no_chapa',
			[
				'attribute' => 'precio',
				'value' => function ($data) {
					return number_format($data->precio, 0,',', '.'). ' $';
				}
			],
            'fecha_registro',
			[
				'attribute' => 'id_estado',
				'value' => function ($data) {
					return Yii::$app->fn->GetAutoStatus($data->id_estado);
				}
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
