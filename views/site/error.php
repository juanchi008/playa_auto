<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        El siguiente error ha ocurrido mientras usted proceso la solicitud.
    </p>
    <p>
        Por favor contactese con nosotros  si usted piensa que es un error de servidor. Gracias
    </p>

</div>
