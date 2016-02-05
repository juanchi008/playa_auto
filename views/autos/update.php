<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Autos */

$this->title = $model->marca.' '.$model->modelo.' '.$model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Autos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section id="content">
<div class="container">

<div class="autos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Upload Foto', ['upload', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
</section>
</div>
