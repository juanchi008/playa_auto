<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FormsDatos */

$this->title = 'Create Forms Datos';
$this->params['breadcrumbs'][] = ['label' => 'Forms Datos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forms-datos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
