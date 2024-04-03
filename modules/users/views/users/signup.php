<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;

Yii::$app->language = 'es_ES';

$this->title = 'Nuevo usuario';
$this->params['breadcrumbs'][] = ['label' => 'Listado de Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="card card-dark card-outline">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="card-body">
            <form role="form">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'autofocus' => true])->label('Nombre') ?>
                        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true])->label('Apellido') ?>
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Nombre de usuario') ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email') ?>                        <?= Html::activeLabel($model, 'status', ['class' => 'control-label']) ?>
                        <?= $form->field($model, 'status', ['showLabels' => false])->label('Estado')->widget(SwitchInput::class, [
                            'value' => $model->status,
                            'options' => ['uncheck' => 0, 'value' => 1],
                            'pluginOptions' => [
                                'handleWidth' => 80,
                                'onColor' => 'success',
                                'offColor' => 'danger',
                                'onText' => 'Activo',
                                'offText' => 'Inactivo'
                            ]
                        ]); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'picture')->label('Avatar')->widget(FileInput::class, [
                            'options' => ['accept' => 'image/*'],
                            'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'gif', 'png'],],
                        ]); ?>
                    </div>
                </div>
                <div class="box-footer">
                    <?= Html::submitButton('Aceptar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                    <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
                </div>
        </div>
        </form>
        <?php ActiveForm::end(); ?>
    </div>
</div>