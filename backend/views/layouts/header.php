<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <?php if (Yii::$app->user->isGuest) { ?>
                    
                        <li class="dropdown user user-menu">
                        <?= Html::a(
                                        'Login',
                                        ['user/security/login'],
                                        ['data-method' => 'post', 'class' => 'nav navbar-nav']
                        ) ?>
                        </li>    
                <?php
                }
                ?>
                <?php if (!Yii::$app->user->isGuest) { ?>
                    <li class="dropdown user user-menu">
                            <?= Html::a(
                                        'ABM Clientes',
                                        ['/user/admin/index'],
                                        ['data-method' => 'post', 'class' => 'nav navbar-nav']
                            ) ?>
                        </li>
                        <li class="dropdown user user-menu">
                            <?= Html::a(
                                        'ABM Inmuebles',
                                        ['/inmuebles/index'],
                                        ['data-method' => 'post', 'class' => 'nav navbar-nav']
                            ) ?>
                        </li>
                        <li class="dropdown user user-menu">
                            <?= Html::a(
                                        'Tipo Inmuebles',
                                        ['/tipoinmueble/index'],
                                        ['data-method' => 'post', 'class' => 'nav navbar-nav']
                            ) ?>
                        </li>
                    <li class="dropdown user user-menu">
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim(Yii::$app->user->identity->email) ) );?>" alt="User Image" width="20" height="20" class="img-circle" />
                            <span class="hidden-xs"><?php Yii::$app->user->identity->username; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim(Yii::$app->user->identity->email) ) );?>" alt="User Image"  class="img-circle" />

                                <p>

                                    <?php echo Yii::$app->user->identity->username; ?>
                                </p>
                            </li>
                            <!-- Menu Body 
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                            
                                <!--<div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Inmuebles</a>
                                </div>-->
                                <div class="pull-right">
                                    <?= Html::a(
                                        'Sign out',
                                        ['/site/logout'],
                                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    ) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <!-- User Account: style can be found in dropdown.less -->
                <!--<li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>