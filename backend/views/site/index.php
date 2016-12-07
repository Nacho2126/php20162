<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$mensage1 = 'Bienvenido!';
$mensage2 = 'Felicitaciones Ud ha ingresado Correctamente.';

echo Html::tag('div', $mensage1, ['class' => 'alert alert-warning']);
echo Html::tag('p', $mensage2, ['class' => 'alert alert-success']);

$this->title = 'QuieroCasa';
?>

<!-- background-image: url("/../images.jpg"); -->
<div class="site-index">

    <div class="jumbotron";>
        <h1>Bienvenido a QuieroCasa.com.uy</h1>

        <p class="lead">Taller de PHP 2016</p>   
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4"> 
            <h3>Registrar un Barrio</h3>
                <a href="http://localhost:8080/php20162/backend/web/index.php?r=barrios%2Findex&sort=nombre">Haz click <strong >AQUI</strong></a> 

             </div>
            <div class="col-lg-4">  
                <h3>Registrar un Departamento</h3>
                <a href="http://localhost:8080/php20162/backend/web/index.php?r=departamento%2Findex&sort=nombre">Haz click <strong>AQUI</strong></a> 

            </div>
             <div class="col-lg-4">  
                <h3>Registrar un Cliente</h3>
                <a href="http://localhost:8080/php20162/backend/web/index.php?r=user%2Fadmin%2Findex">Haz click <strong>AQUI</strong></a> 

            </div>
           
            
        </div>


     <!--   <div class="row">
            <div class="col-lg-4">
                
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>
        -->
    </div>
</div>
