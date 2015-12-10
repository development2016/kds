<?php

namespace backend\controllers;

use Yii;

use common\models\LookupClusterSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupMukim;
use backend\models\CountCluster;

/**
 * LookupClusterController implements the CRUD actions for LookupCluster model.
 */
class LookupClusterController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                /*'actions' => [
                    'delete' => ['post'],
                ],*/
            ],
        ];
    }

    /**
     * Lists all LookupCluster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LookupClusterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LookupCluster model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LookupCluster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LookupCluster();

        $model_count = new CountCluster();

        if ($model->load(Yii::$app->request->post()) ) {

            if ($model->save()) {
                $last_id = Yii::$app->db->getLastInsertID();
                
                $model_count->state_id =  $_POST['LookupCluster']['state_id'];
                $model_count->district_id =  $_POST['LookupCluster']['district_id'];
                $model_count->mukim_id = $_POST['LookupCluster']['mukim_id'];
                $model_count->sub_base_id = $_POST['LookupCluster']['sub_base_id'];
                $model_count->cluster_id = $last_id;
                $model_count->save();
            }
            Yii::$app->getSession()->setFlash('berjaya', 'Maklumat Cluster <b>('.$model->cluster.')</b> Berjaya Di Simpan');
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LookupCluster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model_count = CountCluster::find()->where(['cluster_id'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) ) {

            if ($model->save()) {

                $model_count->state_id =  $_POST['LookupCluster']['state_id'];
                $model_count->district_id =  $_POST['LookupCluster']['district_id'];
                $model_count->mukim_id = $_POST['LookupCluster']['mukim_id'];
                $model_count->sub_base_id = $_POST['LookupCluster']['sub_base_id'];
                $model_count->save();
            }
            Yii::$app->getSession()->setFlash('berjaya', 'Maklumat Cluster <b>('.$model->cluster.')</b> Berjaya Di Kemaskini');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LookupCluster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        CountCluster::deleteAll(['cluster_id'=>$id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the LookupCluster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LookupCluster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LookupCluster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
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
    public function actionListsubbasesearch($id)
    {
        $countPosts = LookupSubBase::find()
        ->where(['mukim_id' => $id])
        ->count();
         
        $posts = LookupSubBase::find() 
        ->where(['mukim_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value=''>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->sub_base_id."'>".$post->sub_base."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }
   
    
}
