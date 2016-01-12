<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'nombre_usuario',
            'contrasena',
            'nombre',
            'email:email',
            'estado_civil',
            'direccion',
            'numero_oficina',
            'ciudad',
            'provincia',
            'id_provincia',
            'codigo_postal',
            'id_pais',
            'numero_casa',
            'numero_trabajo',
            'numero_movil',
            'cargo_trabajo',
            'fecha_registro',
            'fecha_conexion',
            'fecha_modif',
            'id_estado',
            'password_reset_token',
            'role',
            'auth_key',
        ],
    ]) ?>

</div>
