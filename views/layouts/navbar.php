<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" id="hamburger" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <h3 style="color:#fff;">Yii2 Boilerplate</h3>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= Yii::$app->request->hostInfo . Yii::$app->user->identity->imagen ?>" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><?= Yii::$app->user->identity->username ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-dark">
                    <img src="<?= Yii::$app->request->hostInfo . Yii::$app->user->identity->imagen ?>" class="img-circle elevation-2" alt="User Image">
                    <p>
                        <?= Yii::$app->user->identity->nombre . ' ' . Yii::$app->user->identity->apellido ?>
                        <small>
                                USUARIO
                        </small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <?= Html::a('Ver Perfil', ['/usuarios/view', 'id_usuario' => Yii::$app->user->identity->id], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>
                    <?= Html::a('Cerrar Sesión', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat float-right']) ?>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>
    </ul>
</nav>
<!-- /.navbar -->