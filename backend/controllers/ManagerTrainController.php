<?php

namespace backend\controllers;

use Yii;
use common\models\ManagerTrain;
use common\models\ManagerTrainSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\LookupMukim;
/**
 * ManagerTrainController implements the CRUD actions for ManagerTrain model.
 */
class ManagerTrainController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ManagerTrain models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ManagerTrainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ManagerTrain model.
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
     * Creates a new ManagerTrain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ManagerTrain();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ManagerTrain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ManagerTrain model.
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
     * Finds the ManagerTrain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ManagerTrain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ManagerTrain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

        public function actionListstate($id)
    {
        $countPosts = LookupState::find()
        ->where(['country_id' => $id])
        ->count();
         
        $posts = LookupState::find() 
        ->where(['country_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->state_id."'>".$post->state."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

    public function actionListdistrict($id)
    {
        $countPosts = LookupDistrict::find()
        ->where(['state_id' => $id])
        ->count();
         
        $posts = LookupDistrict::find() 
        ->where(['state_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->district_id."'>".$post->district."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }
    public function actionListmukim($id)
    {
        $countPosts = LookupMukim::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupMukim::find() 
        ->where(['district_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->mukim_id."'>".$post->mukim."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

    public function actionListsubbase($id)
    {
        $countPosts = LookupSubBase::find()
        ->where(['mukim_id' => $id])
        ->count();
         
        $posts = LookupSubBase::find() 
        ->where(['mukim_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->sub_base_id."'>".$post->sub_base."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }
    public function actionListcluster($id)
    {
        $countPosts = LookupCluster::find()
        ->where(['sub_base_id' => $id])
        ->count();
         
        $posts = LookupCluster::find() 
        ->where(['sub_base_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->cluster_id."'>".$post->cluster."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

    public function actionListkampung($id)
    {
        $countPosts = LookupKampung::find()
        ->where(['cluster_id' => $id])
        ->count();
         
        $posts = LookupKampung::find() 
        ->where(['cluster_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->kampung_id."'>".$post->kampung."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

// search

        public function actionListdistrictsearch($id)
    {
        $countPosts = LookupDistrict::find()
        ->where(['state_id' => $id])
        ->count();
         
        $posts = LookupDistrict::find() 
        ->where(['state_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value=''>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->district_id."'>".$post->district."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

    public function actionListmukimsearch($id)
    {
        $countPosts = LookupMukim::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupMukim::find() 
        ->where(['district_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value=''>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->mukim_id."'>".$post->mukim."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }



    public function actionListkampungsearch($id)
    {
        $countPosts = LookupKampung::find()
        ->where(['mukim_id' => $id])
        ->count();
         
        $posts = LookupKampung::find() 
        ->where(['mukim_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value=''>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->kampung_id."'>".$post->kampung."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

    
}
