<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

Yii::$app->language = 'es_ES';

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */
/* @var $searchModel \yii2mod\rbac\models\search\AuthItemSearch */

$labels = $this->context->getLabels();
$this->title = Yii::t('yii2mod.rbac', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<div class="item-index">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <p>
        <?php echo Html::a(Yii::t('yii2mod.rbac', 'Crear ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php Pjax::begin(['timeout' => 5000, 'enablePushState' => false]); ?>
    <div class="col-md-12">
        <div class="card card-dark card-outline">
            <div class="card-body">
                <?php echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'name',
                            'label' => Yii::t('yii2mod.rbac', 'Nombre'),
                        ],
                        [
                            'attribute' => 'description',
                            'format' => 'ntext',
                            'label' => Yii::t('yii2mod.rbac', 'Descripción'),
                        ],
                        [
                            'header' => Yii::t('yii2mod.rbac', 'Acción'),
                            'class' => 'yii\grid\ActionColumn',
                        ],
                    ],
                ]); ?>

                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>