<?php

namespace backend\controllers;

use Yii;
use common\models\Demographic;
use common\models\DemographicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\InfoDemographic;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\LookupMukim;
use common\models\LookupKemudahan;
/**
 * DemographicController implements the CRUD actions for Demographic model.
 */
class DemographicController extends Controller
{
    public function behaviors()
    {
        return [
           /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * Lists all Demographic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DemographicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Demographic model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT 
            info_demographic.bilangan AS bil,
            info_demographic.status_kemudahan AS status,
            info_demographic.nama AS nama,
            info_demographic.catatan AS catatan,
            lookup_kemudahan.kemudahan_awam AS kemudahan,
            lookup_kemudahan.id AS id_kemudahan
            FROM info_demographic 
            RIGHT JOIN lookup_kemudahan ON info_demographic.kemudahan_id = lookup_kemudahan.id
            WHERE info_demographic.demographic_id = '.$id.'');
        $kemudahan = $sql->queryAll();


        return $this->render('view', [
            'model' => $this->findModel($id),
            'kemudahan' => $kemudahan,
        ]);
    }

    /**
     * Creates a new Demographic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new Demographic();
        $info = new InfoDemographic();
        $kemudahan = LookupKemudahan::find()->all();



        if ($model->load(Yii::$app->request->post()) && $info->load(Yii::$app->request->post())) {

            if ($model->save()) {

                $last_id = Yii::$app->db->getLastInsertID();

                $count = count($_POST['InfoDemographic']['bilangan']);
                for ($i=1; $i <= $count; $i++) { 
                    $info =new InfoDemographic;
                    $info->bilangan = $_POST['InfoDemographic']['bilangan'][$i];
                    $info->status_kemudahan = $_POST['InfoDemographic']['status_kemudahan'][$i];
                    $info->nama = $_POST['InfoDemographic']['nama'][$i];
                    $info->catatan = $_POST['InfoDemographic']['catatan'][$i];
                    $info->kemudahan_id = $i;
                    $info->demographic_id = $last_id;
                    $info->save();
                }   

                    Yii::$app->getSession()->setFlash('create', 'Maklumat Demographic Berjaya Di Simpan');
                    return $this->redirect(['index']);

            } else {
                return $this->render('create', [
                    'model' => $model,
                    'info' => $info,
                    'kemudahan' => $kemudahan,
                ]);
            }
            
            
        } else {
                return $this->render('create', [
                    'model' => $model,
                    'info' => $info,
                    'kemudahan' => $kemudahan,
                ]);
        }
    }

    /**
     * Updates an existing Demographic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $connection = \Yii::$app->db;

        $sql = $connection->createCommand('SELECT *,info_demographic.id AS ids FROM info_demographic 
                RIGHT JOIN lookup_kemudahan ON info_demographic.kemudahan_id = lookup_kemudahan.id
                WHERE info_demographic.demographic_id = '.$id.'');
        $kemudahan = $sql->queryAll();


        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {


                Yii::$app->getSession()->setFlash('update', 'Maklumat Demographic Berjaya Di Kemaskini');
                return $this->redirect(['demographic/update', 'id' => $model->demographic_id,'#'=>'tab_1']);

            } else {

                return $this->render('update', [
                    'model' => $model,
                    'kemudahan' => $kemudahan,
                ]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
                'kemudahan' => $kemudahan,
            ]);
        }
    }


    public function actionChange($id)
    {
        $model = InfoDemographic::find()->where(['id'=>$id])->one();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {

                Yii::$app->getSession()->setFlash('change', 'Maklumat Info Demographic Berjaya Di Kemaskini');
                return $this->redirect(['demographic/update', 'id' => $model->demographic_id,'#'=>'tab_2']);
            }

        } else {

            return $this->renderAjax('change', [
                'model' => $model,
            ]);

        }




    }

    /**
     * Deletes an existing Demographic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        InfoDemographic::deleteAll(['demographic_id'=>$id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Demographic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Demographic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Demographic::findOne($id)) !== null) {
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


    public function actionListsubbase($id)
    {
        $countPosts = LookupSubBase::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupSubBase::find() 
        ->where(['district_id' => $id])
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

        /* search */

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

    public function actionListsubbasesearch($id)
    {
        $countPosts = LookupSubBase::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupSubBase::find() 
        ->where(['district_id' => $id])
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
    public function actionListclustersearch($id)
    {
        $countPosts = LookupCluster::find()
        ->where(['sub_base_id' => $id])
        ->count();
         
        $posts = LookupCluster::find() 
        ->where(['sub_base_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value=''>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->cluster_id."'>".$post->cluster."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

    public function actionListkampungsearch($id)
    {
        $countPosts = LookupKampung::find()
        ->where(['cluster_id' => $id])
        ->count();
         
        $posts = LookupKampung::find() 
        ->where(['cluster_id' => $id])
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
