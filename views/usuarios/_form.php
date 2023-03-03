<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;

Yii::$app->language = 'es_ES';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline" style="padding:15px;">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <form role="form">
                <div class="box-body">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'password_hash')->passwordInput(['value' => '']) ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'imagen')->widget(
                        FileInput::class,
                        ['options' => ['accept' => 'image/*'],]
                    ); ?>
                    <?= $form->field($model, 'imagen', ['showLabels' => false])->hiddenInput(['maxlength' => true]) ?>

                    <?php /* if (Yii::$app->user->can('MasterAccess')) {
                        echo $form->field($model, 'status')->widget(SwitchInput::class, [
                            'pluginOptions' => [
                                'handleWidth' => 70,
                                'onColor' => 'success',
                                'offColor' => 'danger',
                                'onText' => '<i class="fa fa-check"></i> Enable',
                                'offText' => '<i class="fa fa-close"></i> Disable'
                            ]
                        ]);
                    } else {
                        echo $form->field($model, 'status', ['showLabels' => false])->hiddenInput(['maxlength' => true]);
                    } */
                    ?>

                    <?php
                        echo $form->field($model, 'status')->widget(SwitchInput::class, [
                            'pluginOptions' => [
                                'handleWidth' => 80,
                                'onColor' => 'success',
                                'offColor' => 'danger',
                                'onText' => '<i class="fa fa-check"></i> Activo',
                                'offText' => '<i class="fa fa-ban"></i> Inactivo'
                            ]
                        ]);
                    ?>
                </div>
                <div class="box-footer">
                    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Save' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['view', 'id_usuario' => $model->id_usuario], ['class' => 'btn btn-danger']) ?>
                </div>
            </form>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>