<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre_usuario',
            'contrasena',
            'nombre',
            'email:email',
            // 'estado_civil',
            // 'direccion',
            // 'numero_oficina',
            // 'ciudad',
            // 'provincia',
            // 'id_provincia',
            // 'codigo_postal',
            // 'id_pais',
            // 'numero_casa',
            // 'numero_trabajo',
            // 'numero_movil',
            // 'cargo_trabajo',
            // 'fecha_registro',
            // 'fecha_conexion',
            // 'fecha_modif',
            // 'id_estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
