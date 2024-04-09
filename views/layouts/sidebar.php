<?php

use yii\helpers\Url;
?>

<aside class="main-sidebar sidebar-dark-warning elevation-4" style="z-index: 1040 !important;">
    <!-- Brand Logo -->
    <a href="<?= Url::home() ?>" class="brand-link logo-switch">
        <img src="/logo-mini.png" alt="Logo" class="brand-image-xl logo-xs">
        <img src="/logo.png" alt="Logo" class="brand-image-xs logo-xl" style="left: 12px">
        </br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-flat" data-widget="treeview" role="menu" data-accordion="false">

                <!------- DASHBOARD ------->
                <?php if (Yii::$app->controller->id == 'site' && in_array(\Yii::$app->controller->action->id, ['index'])) {
                    $li = "nav-item active";
                    $a = "nav-link active";
                } else {
                    $li = "nav-item ";
                    $a = "nav-link ";
                }
                ?>
                <li class="<?= $li ?>"><a class="<?= $a ?>" href="<?php echo Url::toRoute(['/site/index']); ?>"><i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!------- END DASHBOARD ------->

                <!------- MENU USUARIOS ------->
                <?php if (Yii::$app->controller->id == 'users' || Yii::$app->controller->id == 'route' || Yii::$app->controller->id == 'permission' || Yii::$app->controller->id == 'role' || Yii::$app->controller->id == 'assignment') {
                    $li = "nav-item has-treeview active menu-open";
                    $a = "nav-link active";
                } else {
                    $li = "nav-item has-treeview";
                    $a = "nav-link";
                } ?>
                <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="#"><i class="nav-icon fas fa-users"></i>
                        <p>Usuarios <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-------------------------------------------------->
                        <?php if (Yii::$app->controller->id == 'users' && in_array(\Yii::$app->controller->action->id, ['index', 'view', 'create', 'update'])) {
                            $li = "nav-item active";
                            $a = "nav-link active";
                        } else {
                            $li = "nav-item";
                            $a = "nav-link";
                        }
                        ?>
                        <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="<?php echo Url::toRoute(['/users/users/index']); ?>"><i class="nav-icon far fa-circle text-yellow"></i>
                                <p>Gestionar Usuarios</p>
                            </a></li>
                        <!-------------------------------------------------->
                        <?php if (Yii::$app->controller->id == 'route' && in_array(\Yii::$app->controller->action->id, ['index'])) {
                            $li = "nav-item active";
                            $a = "nav-link active";
                        } else {
                            $li = "nav-item";
                            $a = "nav-link";
                        }
                        ?>
                        <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="<?php echo Url::toRoute(['/rbac/route']); ?>"><i class="nav-icon far fa-circle text-blue"></i>
                                <p>Gestionar rutas </p>
                            </a></li>

                        <?php if (Yii::$app->controller->id == 'permission' && in_array(\Yii::$app->controller->action->id, ['index'])) {
                            $li = "nav-item active";
                            $a = "nav-link active";
                        } else {
                            $li = "nav-item";
                            $a = "nav-link";
                        }
                        ?>
                        <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="<?php echo Url::toRoute(['/rbac/permission']); ?>"><i class="nav-icon far fa-circle text-purple"></i>
                                <p>Gestionar permisos </p>
                            </a></li>

                        <?php if (Yii::$app->controller->id == 'role' && in_array(\Yii::$app->controller->action->id, ['index'])) {
                            $li = "nav-item active";
                            $a = "nav-link active";
                        } else {
                            $li = "nav-item";
                            $a = "nav-link";
                        }
                        ?>
                        <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="<?php echo Url::toRoute(['/rbac/role']); ?>"><i class="nav-icon far fa-circle text-green"></i>
                                <p>Gestionar roles </p>
                            </a></li>

                        <?php if (Yii::$app->controller->id == 'assignment' && in_array(\Yii::$app->controller->action->id, ['index', 'view', 'create', 'update'])) {
                            $li = "nav-item active";
                            $a = "nav-link active";
                        } else {
                            $li = "nav-item";
                            $a = "nav-link";
                        }
                        ?>
                        <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="<?php echo Url::toRoute(['/rbac/assignment']); ?>"><i class="nav-icon far fa-circle text-yellow"></i>
                                <p>Asignar rol </p>
                            </a></li>
                    </ul>
                </li>
                <!------- FIN MENU USUARIOS ------->

                <!------- MENU DEVS ------->
                <?php if (Yii::$app->controller->id == 'gii' || Yii::$app->controller->id == 'debug') {
                    $li = "nav-item has-treeview active menu-open";
                    $a = "nav-link active";
                } else {
                    $li = "nav-item has-treeview";
                    $a = "nav-link";
                } ?>
                <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="#"><i class="nav-icon fas fa-file-code"></i>
                        <p>Devs <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (Yii::$app->controller->id == 'gii') {
                            $li = "nav-item active";
                            $a = "nav-link active";
                        } else {
                            $li = "nav-item";
                            $a = "nav-link";
                        }
                        ?>
                        <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="<?php echo Url::toRoute(['/gii']); ?>" target="_blank"><i class="nav-icon far fa-circle text-danger"></i>
                                <p>Gii </p>
                            </a></li>

                        <?php if (Yii::$app->controller->id == 'debug') {
                            $li = "nav-item active";
                            $a = "nav-link active";
                        } else {
                            $li = "nav-item";
                            $a = "nav-link";
                        }
                        ?>
                        <li class="<?= $li; ?>"><a class="<?= $a; ?>" href="<?php echo Url::toRoute(['/debug']); ?>" target="_blank"><i class="nav-icon far fa-circle text-blue"></i>
                                <p>Debug </p>
                            </a></li>
                    </ul>
                </li>
                <!------- FIN MENU DEVS ------->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>