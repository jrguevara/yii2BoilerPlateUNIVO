<?php

use yii\helpers\Html;

$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card card-dark card-outline" style="padding:15px;">
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="150px" rowspan="9">
                            <img src="<?= Yii::$app->request->hostInfo . $model->imagen ?>" width="150" />
                        </td>
                        <td width="200px"><b>Usuario:</b></td>
                        <td><?= $model->username ?></td>
                    </tr>
                    <tr>
                        <td><b>Nombre:</b></td>
                        <td><?= $model->nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Apellido:</b></td>
                        <td><?= $model->apellido ?></td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td><?= $model->email ?></td>
                    </tr>
                    <tr>
                        <td><b>Estado:</b></td>
                        <td>
                            <span class="badge bg-<?= $model->status == 1 ? "green" : "red"; ?>"><?= $model->status == 1 ? "Activo" : "Inactivo"; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Fecha de creación:</b></td>
                        <td><?= date('d-m-Y H:i:s', $model->created_at) ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha de actualización:</b></td>
                        <td><?= date('d-m-Y H:i:s', $model->updated_at) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id_usuario' => $model->id_usuario], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>
