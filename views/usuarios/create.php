<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */

$this->title = 'Create Tbl Usuarios';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
