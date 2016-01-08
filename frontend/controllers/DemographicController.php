<?php

namespace frontend\controllers;

use Yii;
use common\models\Demographic;
use common\models\DemographicSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;

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
        $id = base64_decode(Yii::$app->getRequest()->getQueryParam('id'));

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


    public function actionGetdistrict($id)
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

    public function actionGetkampung($id)
    {
        $countPosts = LookupKampung::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupKampung::find() 
        ->where(['district_id' => $id])
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
