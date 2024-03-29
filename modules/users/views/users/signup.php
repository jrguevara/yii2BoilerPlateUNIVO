<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;

$this->title = 'Nuevo usuario';
$this->params['breadcrumbs'][] = ['label' => 'Listado de Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-dark card-outline" style="padding:15px;">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <form role="form">
                <div class="box-body">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'autofocus' => true])->label('Nombre') ?>
                    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true])->label('Apellido') ?>
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Nombre de usuario') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'picture')->label('Avatar')->widget(FileInput::class, [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'gif', 'png'],],
                    ]); ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= Html::activeLabel($model, 'status', ['class' => 'control-label']) ?>
                    <div class="col-md-12">
                        <?= $form->field($model, 'status', ['showLabels' => false])->label('Estado')->widget(SwitchInput::class, [
                            'value' => $model->status, //checked status can change by db value
                            'options' => ['uncheck' => 0, 'value' => 1], //value if not set ,default is 1
                            'pluginOptions' => [
                                'handleWidth' => 80,
                                'onColor' => 'success',
                                'offColor' => 'danger',
                                'onText' => 'Activo',
                                'offText' => 'Inactivo'
                            ]
                        ]); ?>
                    </div>
                </div>
                <div class="box-footer">
                    <?= Html::submitButton('Aceptar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                    <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
                </div>
            </form>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>