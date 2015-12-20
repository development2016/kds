<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use backend\models\CountState;
use backend\models\CountDistrict;
use backend\models\CountKampung;
use common\models\People;
use common\models\Volunteer;
use backend\models\User;
/**
 * VolunteerController implements the CRUD actions for Volunteer model.
 */
class KawasanController extends Controller
{
   

    public function actionIndex()
    {
        $role_id = Yii::$app->user->identity->role;
        $user_id =  Yii::$app->user->identity->id;

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM acl  WHERE user_id = '".$user_id."' AND role_id = '".$role_id."'");
        $data = $sql->queryAll();

        foreach ($data as $key => $value) {
            $state_id = $value['state_id'];

        }

        if ($role_id == 4 || $role_id == 1 || $role_id == 3) {

            $dataProvider = new ActiveDataProvider([
                'query' => LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya','state_id'=>$state_id]),
            ]);
        }
         else {
            $dataProvider = new ActiveDataProvider([
                'query' => LookupState::find()->where('state_id != :state_id AND kawasan_perlaksanaan = :kawasan_perlaksanaan',['state_id'=>13,'kawasan_perlaksanaan'=>'Ya'])
            ]);
        }



        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionState($state_id_get) 
    {

        $model = LookupState::find()->where(['state_id'=>$state_id_get])->one();
        $count_district = LookupDistrict::find()->where(['state_id' => $state_id_get])->count();
        $count_sub_base = LookupSubBase::find()->where(['state_id' => $state_id_get])->count();
        $count_cluster = LookupCluster::find()->where(['state_id' => $state_id_get])->count();
        $count_kampung = LookupKampung::find()->where(['state_id' => $state_id_get])->count();

        $count_profil = People::find()->where(['state_id' => $state_id_get])->count();
        $count_sukarelawan = Volunteer::find()->where(['state_id' => $state_id_get])->count();
        $count_microworker = User::find()->where(['state_area_id' => $state_id_get])->count();
        $count_microworker_collection = User::find()->where(['state_area_id' => $state_id_get,'role'=>12])->count();
        $count_microworker_task = User::find()->where(['state_area_id' => $state_id_get,'status_area'=>'Microworker Train'])->count();
        $count_microworker_tasktrain = User::find()->where(['state_area_id' => $state_id_get,'status_area'=>'Microworker Train & Task'])->count();



        $model_count = CountState::find()->where(['state_id'=>$state_id_get])->one();

        $connection = \Yii::$app->db;
        $issue = $connection->createCommand('SELECT lookup_kategori_isu.kategori_isu,COUNT(issue_conduit.issue_id) AS isu FROM issue_conduit 
        RIGHT JOIN lookup_kategori_isu ON issue_conduit.issue_category = lookup_kategori_isu.kategori_id 
        WHERE issue_conduit.state_id = '.$state_id_get.' GROUP BY issue_conduit.issue_category');
        $countIssue = $issue->queryAll();


        $demographic = $connection->createCommand('SELECT info_demographic.kemudahan_id,SUM(info_demographic.bilangan) AS jumlah FROM demographic 
        RIGHT JOIN info_demographic ON demographic.demographic_id = info_demographic.demographic_id 
        WHERE demographic.state_id = '.$state_id_get.' GROUP BY info_demographic.kemudahan_id');
        $countDemographic = $demographic->queryAll();


        return $this->render('state',[
            'model' => $model,
            'count_district'=>$count_district,
            'count_sub_base'=>$count_sub_base,
            'count_cluster'=>$count_cluster,
            'count_kampung'=>$count_kampung,
            'count_profil'=>$count_profil,
            'count_sukarelawan'=>$count_sukarelawan,
            'count_microworker'=>$count_microworker,
            'model_count' => $model_count,
            'countIssue' => $countIssue,
            'count_microworker_task' => $count_microworker_task,
            'count_microworker_tasktrain' => $count_microworker_tasktrain,
            'count_microworker_collection' => $count_microworker_collection,
            'countDemographic' => $countDemographic,
        ]);
                




    }




    
}
