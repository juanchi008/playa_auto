<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormsDatosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forms Datos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forms-datos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Forms Datos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'datos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
