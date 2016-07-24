<?php

namespace app\controllers;

use Yii;
use app\models\Resource;
use app\models\ResourceQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ResourceController implements the CRUD actions for Resource model.
 */
class ResourceController extends BaseController
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
     * Lists all Resource models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResourceQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resource model.
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
     * Creates a new Resource model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resource();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                $uploadFile = UploadedFile::getInstance($model, 'uploadFile');
                if($model->type == Resource::TYPE_VIDEO){
                    $filename = 'upload/videos/' .md5_file($uploadFile->tempName).'.'.$uploadFile->extension;
                    $uploadFile->saveAs($filename);
                    $model->location = $filename;
                }else{
                    $filename = 'upload/images/' .md5_file($uploadFile->tempName).'.'.$uploadFile->extension;
                    $uploadFile->saveAs($filename);
                    $model->location = $filename;
                }
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Resource model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $uploadFile = UploadedFile::getInstance($model, 'uploadFile');
                if($uploadFile){
                    if($model->type == Resource::TYPE_VIDEO){
                        $filename = 'upload/videos/' .md5_file($uploadFile->tempName).'.'.$uploadFile->extension;
                        $uploadFile->saveAs($filename);
                        $model->location = $filename;
                    }else{
                        $filename = 'upload/images/' .md5_file($uploadFile->tempName).'.'.$uploadFile->extension;
                        $uploadFile->saveAs($filename);
                        $model->location = $filename;
                    }
                }
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
            return $this->render('update', [
                'model' => $model,
            ]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Resource model.
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
     * Finds the Resource model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resource the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resource::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
