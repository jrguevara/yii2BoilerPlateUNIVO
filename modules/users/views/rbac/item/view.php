<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;
use yii2mod\rbac\RbacAsset;

RbacAsset::register($this);

/* @var $this yii\web\View */
/* @var $model \yii2mod\rbac\models\AuthItemModel */

$labels = $this->context->getLabels();
$this->title = Yii::t('yii2mod.rbac', $labels['Item'] . ' : {0}', $model->name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.rbac', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
$this->render('/layouts/_sidebar');
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div class="row">
    <div class="col-md-12">
        <div class="card card-dark card-outline">
            <div class="card-body">
                <p>
                <?php echo Html::a(Yii::t('yii2mod.rbac', 'Crear'), ['create'], ['class' => 'btn btn-success']); ?>
                    <?php echo Html::a(Yii::t('yii2mod.rbac', 'Actualizar'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']); ?>
                    <?php echo Html::a(Yii::t('yii2mod.rbac', 'Eliminar'), ['delete', 'id' => $model->name], [
                        'class' => 'btn btn-danger',
                        'data-confirm' => Yii::t('yii2mod.rbac', 'AEta seguro de querer eliminar este item?'),
                        'data-method' => 'post',
                    ]); ?>

                </p>

                <div class="col-sm-12">
                    <?php echo DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute' => 'name',
                                'label' => Yii::t('yii2mod.rbac', 'Nombre'),
                            ],
                            [
                                'attribute' => 'description',
                                'label' => Yii::t('yii2mod.rbac', 'Descripción'),
                            ],
                            //'name',
                            //'description:ntext',
                            //'ruleName',
                            //'data:ntext',
                        ],
                    ]); ?>
                </div>
                <?php echo $this->render('../_dualListBox', [
                    'opts' => Json::htmlEncode([
                        'items' => $model->getItems(),
                    ]),
                    'assignUrl' => ['assign', 'id' => $model->name],
                    'removeUrl' => ['remove', 'id' => $model->name],
                ]); ?>
            </div>
        </div>
    </div>
</div>