<?php

namespace app\controllers;

use Yii;
use app\models\Favoritos;
use app\models\FavoritosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoritosController implements the CRUD actions for Favoritos model.
 */
class FavoritosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Favoritos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FavoritosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Favoritos model.
     * @param integer $Clientes_idClientes
     * @param integer $Inmuebles_idInmuebles
     * @param string $idFavorito
     * @return mixed
     */
    public function actionView($Clientes_idClientes, $Inmuebles_idInmuebles, $idFavorito)
    {
        return $this->render('view', [
            'model' => $this->findModel($Clientes_idClientes, $Inmuebles_idInmuebles, $idFavorito),
        ]);
    }

    /**
     * Creates a new Favoritos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Favoritos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Clientes_idClientes' => $model->Clientes_idClientes, 'Inmuebles_idInmuebles' => $model->Inmuebles_idInmuebles, 'idFavorito' => $model->idFavorito]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Favoritos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Clientes_idClientes
     * @param integer $Inmuebles_idInmuebles
     * @param string $idFavorito
     * @return mixed
     */
    public function actionUpdate($Clientes_idClientes, $Inmuebles_idInmuebles, $idFavorito)
    {
        $model = $this->findModel($Clientes_idClientes, $Inmuebles_idInmuebles, $idFavorito);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Clientes_idClientes' => $model->Clientes_idClientes, 'Inmuebles_idInmuebles' => $model->Inmuebles_idInmuebles, 'idFavorito' => $model->idFavorito]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Favoritos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Clientes_idClientes
     * @param integer $Inmuebles_idInmuebles
     * @param string $idFavorito
     * @return mixed
     */
    public function actionDelete($Clientes_idClientes, $Inmuebles_idInmuebles, $idFavorito)
    {
        $this->findModel($Clientes_idClientes, $Inmuebles_idInmuebles, $idFavorito)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Favoritos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Clientes_idClientes
     * @param integer $Inmuebles_idInmuebles
     * @param string $idFavorito
     * @return Favoritos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Clientes_idClientes, $Inmuebles_idInmuebles, $idFavorito)
    {
        if (($model = Favoritos::findOne(['Clientes_idClientes' => $Clientes_idClientes, 'Inmuebles_idInmuebles' => $Inmuebles_idInmuebles, 'idFavorito' => $idFavorito])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
