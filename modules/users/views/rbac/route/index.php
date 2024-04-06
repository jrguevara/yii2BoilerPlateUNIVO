<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii2mod\rbac\RbacRouteAsset;

Yii::$app->language = 'es_ES';

RbacRouteAsset::register($this);

/* @var $this yii\web\View */
/* @var $routes array */

$this->title = Yii::t('yii2mod.rbac', 'Rutas');
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div class="col-md-12">
    <div class="card card-dark card-outline">
        <div class="card-body">
            <?php echo Html::a(Yii::t('yii2mod.rbac', 'Actualizar Rutas'), ['refresh'], [
                'class' => 'btn btn-primary',
                'id' => 'btn-refresh',
            ]); ?>
            <?php echo $this->render('../_dualListBox', [
                'opts' => Json::htmlEncode([
                    'items' => $routes,
                ]),
                'assignUrl' => ['assign'],
                'removeUrl' => ['remove'],
            ]); ?>
        </div>
    </div>
</div>