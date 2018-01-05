<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--导航条-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

            </button>
            <a class="navbar-brand" href="#">RBAC</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页</a></li>

            </ul>
            <p class="navbar-text navbar-right"><a href="#" class="navbar-link">Hi,xxx</a></p>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
    <div class="container-fluid"  style="margin-top:50px;" >
    <div class="col-sm-2 col-lg-2 col-md-2 sidebar" >
        <ul class="nav nav-sidebar">
            <li>权限演示页面</li>
            <li><a href="">测试页面一</a></li>
            <li><a href="">测试页面二</a></li>
            <li><a href="">测试页面三</a></li>
            <li><a href="">测试页面四</a></li>
            <li>系统设置</li>
            <li><a href="">用户管理</a></li>
            <li><a href="">角色管理</a></li>
            <li><a href="">权限管理</a></li>

        </ul>

    </div>
        <div class="col-sm-10 col-sm-offset-2 col-lg-10 col-lg-offset-2 col-md-offset-2 col-md-10" >内容区

            <hr/>
            <footer>
                <p class="pull-left">@felix</p>
                <p class="pull-right" >悦无限</p>
            </footer>
        </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>