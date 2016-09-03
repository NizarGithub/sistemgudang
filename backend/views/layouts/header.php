<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */
Yii::$app->name = 'Manajemen Gudang';
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">SMG</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                
                <li class="user-menu">
                    <a class="dropdown-toggle disable">
                        <span class="hidden-xs"><i class="fa fa-user"></i>&nbsp;<span>Hello &nbsp;<?= Yii::$app->user->identity->username ?>! </span></span>
                    </a>
                    
                </li>

                
            </ul>
        </div>
    </nav>
</header>
