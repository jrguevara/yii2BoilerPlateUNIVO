<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$publishedRes = Yii::$app->assetManager->publish('@vendor/hail812/yii2-adminlte3/src/web/js');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<style>
    .brand-link {
        border-bottom: none !important;
    }

    .sidebar-dark-warning .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-light-warning .nav-sidebar>.nav-item>.nav-link.active {
        background-color: #ffc107 !important;
        color: #000 !important;
    }

    .nav-item>.nav-link.active {
        /*background-color: #332940 !important;*/
        background-color: #000 !important;
        color: #fff !important;
    }

    .elevation-4 {
        box-shadow: none !important;
    }

    .dark-mode .kv-table-header {
        background-image: none !important;
    }

    .dark-mode .kv-panel-before {
        border-bottom-color: #6c757d !important;
    }

    .dark-mode .kv-panel-after {
        border-top-color: #6c757d !important;
    }

    .dark-mode .bg-dark {
        background-color: #000 !important;
    }
</style>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <link rel="stylesheet" href="custom.css">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="hold-transition sidebar-mini">
    <?php $this->beginBody() ?>

    <div class="wrapper">
        <!-- Navbar -->
        <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <?= $this->render('control-sidebar') ?>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?= $this->render('footer') ?>
    </div>

    <?php $this->endBody() ?>
</body>
<script type="text/javascript">
    //? Recobra el estado del left menu
    (function() {
        if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
            var body = document.getElementsByTagName('body')[0];
            body.className = body.className + ' sidebar-collapse';
        }
    })();

    (function() {
        //? Guarda en localStorage el estado de left menu
        $('#hamburger').click(function(event) {
            event.preventDefault();
            if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
                localStorage.setItem('sidebar-toggle-collapsed', '');
            } else {
                localStorage.setItem('sidebar-toggle-collapsed', '1');
            }
        });
    })();

    //? Recobra el estado del tema (claro-oscuro)
    (function() {
        if (Boolean(localStorage.getItem('dark-mode-enable'))) {
            var body = document.getElementsByTagName('body')[0];
            body.className = body.className + ' dark-mode';
            var i = document.getElementById('theme-icon');
            i.className = i.className + ' fa-sun';
        } else {
            var i = document.getElementById('theme-icon');
            i.className = i.className + ' fa-moon';
        }
    })();

    (function() {
        //? Guarda en localStorage el estado del tema
        $('#theme-switch').click(function(event) {
            event.preventDefault();
            if (Boolean(localStorage.getItem('dark-mode-enable'))) {
                localStorage.setItem('dark-mode-enable', '');
                location.reload();
            } else {
                localStorage.setItem('dark-mode-enable', '1');
                location.reload();
            }
        });
    })();
</script>

</html>
<?php $this->endPage() ?>