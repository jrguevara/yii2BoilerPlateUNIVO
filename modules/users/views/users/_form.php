<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;

Yii::$app->language = 'es_ES';
?>
<div class="col-md-12">
    <div class="card card-dark card-outline">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="card-body">
            <form role="form">
                <div class="row">
                    <div class="col-md-6">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Escribir si desea cambiar el password', 'value' => '']) ?>
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            <?php if (Yii::$app->user->can('Administrador')) {
                                echo $form->field($model, 'status')->widget(SwitchInput::class, [
                                    'pluginOptions' => [
                                        'handleWidth' => 80,
                                        'onColor' => 'success',
                                        'offColor' => 'danger',
                                        'onText' => '<i class="fa fa-check"></i> Activo',
                                        'offText' => '<i class="fa fa-ban"></i> Inactivo'
                                    ]
                                ]);
                            }
                            ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'picture')->widget(
                            FileInput::class,
                            ['options' => ['accept' => 'image/*'],]
                        ); ?>
                    </div>
                </div>
                <div class="box-footer">
                    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Save' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['view', 'id_user' => $model->id_user], ['class' => 'btn btn-danger']) ?>
                </div>
        </div>
        </form>
    </div>
    <?php ActiveForm::end(); ?>
</div>