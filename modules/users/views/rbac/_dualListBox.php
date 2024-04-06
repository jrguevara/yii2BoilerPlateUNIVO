<?php

use yii\helpers\Html;
use yii\web\View;

Yii::$app->language = 'es_ES';


/* @var $this yii\web\View */
/* @var $assignUrl array */
/* @var $removeUrl array */
/* @var $opts string */

$this->registerJs("var _opts = {$opts};", View::POS_BEGIN);
?>
<style>
    .move-buttons {
        margin: 30px !important;
    }
</style>

<div class="row">
    <div class="col-md-5">
        <input class="form-control search" data-target="available" placeholder="<?php echo Yii::t('yii2mod.rbac', 'Buscar disponibles'); ?>">
        <br />
        <select multiple size="20" class="form-control list" data-target="available"></select>
    </div>
    <div class="col-md-2">
        <div class="move-buttons">
            <br><br>
            <?php echo Html::a('Asignar  <i class="fas fa-arrow-right"></i>', $assignUrl, [
                'class' => 'btn btn-success btn-assign',
                'data-target' => 'available',
                'title' => Yii::t('yii2mod.rbac', 'Assign'),
            ]); ?>
            <br /><br />
            <?php echo Html::a('<i class="fas fa-arrow-left"></i> Remover', $removeUrl, [
                'class' => 'btn btn-danger btn-assign',
                'data-target' => 'assigned',
                'i class' => 'fa fa-trash',
                'title' => Yii::t('yii2mod.rbac', 'Remove'),
            ]); ?>
        </div>
    </div>
    <div class="col-md-5">
        <input class="form-control search" data-target="assigned" placeholder="<?php echo Yii::t('yii2mod.rbac', 'Buscar asignadas'); ?>">
        <br />
        <select multiple size="20" class="form-control list" data-target="assigned"></select>
    </div>
</div>