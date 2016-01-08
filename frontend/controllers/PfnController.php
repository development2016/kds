<?php

namespace frontend\controllers;

use Yii;
use common\models\Pfn;
use common\models\PfnEquip;
use common\models\PfnSearch;
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
 * PfnController implements the CRUD actions for Pfn model.
 */
class PfnController extends Controller
{
    public function behaviors()
    {
        return [
             /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * Lists all Pfn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PfnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pfn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
   {
        $id = base64_decode(Yii::$app->getRequest()->getQueryParam('id'));
        $model_equip = PfnEquip::find()->where(['pfn_id'=>$id])->all();
       
        return $this->render('view', [
            'model' => $this->findModel($id),
            'model_equip' => $model_equip,
           
        ]);
    }


    /**
     * Finds the Pfn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pfn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pfn::findOne($id)) !== null) {
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
