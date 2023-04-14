<?php
Yii::$app->language = 'es_ES';

use app\models\Usuarios;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de usuarios del sistema';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="tbl-osig-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>
            <?php
            $gridColumns = [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'contentOptions' => ['class' => 'kartik-sheet-style'],
                    'width' => '36px',
                    'header' => '#',
                    'headerOptions' => ['class' => 'kartik-sheet-style']
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'username',
                    'width' => '200px',
                    'vAlign' => 'middle',
                    'format' => 'raw',
                    'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->username,  ['view', 'id_usuario' => $model->id_usuario]);
                    },
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'nombre',
                    'vAlign' => 'middle',
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'apellido',
                    'vAlign' => 'middle',
                ],
                [
                    'class' => 'kartik\grid\BooleanColumn',
                    'width' => '120px',
                    'attribute' => 'status',
                    'vAlign' => 'middle',
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, Usuarios $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_usuario' => $model->id_usuario]);
                    }
                ],
            ];

            $exportmenu = ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_CSV => false,
                ],
            ]);

            echo GridView::widget([
                'id' => 'kv-grid-demo',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' =>  [
                    [
                        'content' =>
                            Html::a('<i class="fas fa-plus"></i> Agregar', ['create'], [
                                'class' => 'btn btn-success',
                                'data-pjax' => 0,
                            ]) . ' '.
                            Html::a('<i class="fas fa-redo"></i>', ['index'], [
                                'class' => 'btn btn-outline-success',
                                'title'=>Yii::t('kvgrid', 'Limpiar filtros'),
                                'data-pjax' => 0, 
                            ]), 
                        'options' => ['class' => 'btn-group mr-2']
                    ],
                    '{toggleData}',
                    $exportmenu,
                    
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                // set export properties
                // parameters from the demo form
                'bordered'=> true,
                'striped'=> true,
                'condensed'=> true,
                'responsive'=> true,
                'hover'=> true,
                //'showPageSummary'=>$pageSummary,
                'panel' => [
                    'type' => GridView::TYPE_DARK,
                    'heading'=> 'Usuarios',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>