<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>

<style>
    body {
        background: #202229 !important;
    }
</style>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yii2 | Inicio de sesión</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="hold-transition login-page">
    <?php $this->beginBody() ?>
    <div class="login-box">
        <div class="login-logo">
            <!--a href="<?= Yii::$app->homeUrl ?>"></!--a><br-->
            <?= Html::a('<img src="/logo.png" class="logo-lg" align="middle" height="80px"' . Yii::$app->name . '</span>') ?>
        </div>
        <!-- /.login-logo -->
        <?= $content ?>
        <!-- /.login-box -->
        <?php $this->endBody() ?>
    </div>
</body>

</html>
<?php $this->endPage() ?>