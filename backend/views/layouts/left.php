<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
/* @var $this \yii\web\View */
/* @var $content string */
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="pull-left image">
                <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim(Yii::$app->user->identity->email) ) );?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Usuario: <?php echo (Yii::$app->user->identity->username);?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            <?php
                }
            ?>
        </div>

        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'ABM Clientes', 'icon' => 'fa fa-dashboard', 'url' => ['/user/admin/index'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'ABM Inmuebles', 'icon' => 'fa fa-dashboard', 'url' => ['/inmuebles/index'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'ABM Tipo Inmuebles', 'icon' => 'fa fa-dashboard', 'url' => ['/tipoinmueble/index'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Login', 'url' => ['user/security/login'], 'visible' => Yii::$app->user->isGuest],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
