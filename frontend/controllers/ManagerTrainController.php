<?php

namespace frontend\controllers;

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

        $id = base64_decode(Yii::$app->getRequest()->getQueryParam('id'));

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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
