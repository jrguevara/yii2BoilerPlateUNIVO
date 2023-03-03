<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var \yii\web\View $this */
/** @var \app\models\LoginForm $model */

$this->title = 'Inicio de sesión';
?>
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg"><b>Inicio de sesión</b></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-user"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3'
            ]
        ])
            ->label(false)
            ->textInput(['placeholder' => 'Nombre de usuario']); ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-lock"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3'
            ]
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]); ?>

        <div class="row">
            <div class="col-12">
                <?= Html::submitButton('Aceptar', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']); ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
<ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>