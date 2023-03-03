<?php
Yii::$app->language = 'es_ES';
use yii\helpers\Html;
Yii::$app->formatter->locale = 'en-US';

/** @var yii\web\View $this */
/** @var app\models\TblCategorias $model */

$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title"><?= $model->nombre ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Id:</b></td>
                        <td width="34%"><?= $model->id_categoria ?></td>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"> <?= $model->nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:m:i', strtotime($model->fecha_ing)) ?></td>
                        <td><b>Fecha modificacion:</b></td>
                        <td><?= date('d-m-Y H:m:i', strtotime($model->fecha_mod)) ?></td>
                    </tr>
                    <tr>
                        <td><b>Descripcion: </b></td>
                        <td colspan="3"><?= $model->descripcion ?></td>
                    </tr>
                    <tr>
                        <td><b>Visible: </b></td>
                        <td><span class="badge bg-<?= $model->visible == 1 ? "green" : "red"; ?>"><?= $model->visible == 1 ? "Visible" : "No Visible"; ?></span></td>
                        <td><b>Creado por: </b></td>
                        <td><?= $model->usuario->nombreCompleto ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_categoria' => $model->id_categoria], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-undo"></i> Regresar', ['index'], ['class' => 'btn btn-warning', 'data-toggle' => 'tooltip', 'title' => 'Regresar']) ?>
                <?= Html::a('<i class="fa fa-trash"></i> Eliminar', ['delete', 'id_categoria' => $model->id_categoria], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Esta seguro de querer eliminar este registro?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>