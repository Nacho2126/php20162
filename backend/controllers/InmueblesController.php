<?php

namespace backend\controllers;

use Yii;
use app\models\Inmuebles;
use app\models\InmueblesSearch;
use app\models\FormUpload;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
/**
 * InmueblesController implements the CRUD actions for Inmuebles model.
 */
class InmueblesController extends Controller
{
    /**
     * @inheritdoc
     */
    public $file;
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
     * Lists all Inmuebles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InmueblesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inmuebles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Inmuebles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inmuebles();
    if ($model->load(Yii::$app->request->post())  && $model->validate()) {
            
            if($model->save()) {           
                $filePath = 'uploads/inmuebles/'.$model->idInmuebles;
                FileHelper::createDirectory($filePath);
                $model->file = UploadedFile::getInstances($model, 'file');
                foreach ($model->file as $i=>$file) {
                    $file->saveAs($filePath . '/' . $i . '.' . $file->extension);
                }
            } else {                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->idInmuebles]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inmuebles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idInmuebles]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inmuebles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Inmuebles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inmuebles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inmuebles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
    * Rertorno todos los Departamentos
    **/
    public function findAll(){
        return Inmuebles::find()->select(['nombre', 'idInmuebles'])->indexBy('idInmuebles')->column();
    }
    public function actionUpload()
    {
        $model = new FormUpload();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstances($model, 'file');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);    
        }
    
}
