<?php

namespace backend\controllers;

use Yii;
use common\models\StatusHarian;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\People;
use common\models\Volunteer;
use common\models\Pfn;
use common\models\IssueConduit;
use backend\models\User;
use kartik\mpdf\Pdf;
use common\models\Status;
/**
 * StatusHarianController implements the CRUD actions for StatusHarian model.
 */
class SummaryController extends Controller
{





    public function actionIndex()
    {

       /* $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT lookup_state.state,lookup_district.district,lookup_sub_base.sub_base,lookup_cluster.cluster,lookup_kampung.kampung,COUNT(people.people_id) AS total FROM people 
RIGHT JOIN lookup_state ON people.state_id = lookup_state.state_id 
RIGHT JOIN lookup_district ON people.district_id = lookup_district.district_id 
RIGHT JOIN lookup_sub_base ON people.sub_base_id = lookup_sub_base.sub_base_id
RIGHT JOIN lookup_cluster ON people.cluster_id = lookup_cluster.cluster_id
RIGHT JOIN lookup_kampung ON people.kampung_id = lookup_kampung.kampung_id GROUP BY lookup_kampung.kampung_id");
        $model = $sql->queryAll();*/
        $state = LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->all();


        return $this->render('index',[
            'state'=>$state,

        ]);
    }

    public function actionSummary($id)
    {
         $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT lookup_state.state,lookup_district.district,lookup_sub_base.sub_base,lookup_cluster.cluster,lookup_kampung.kampung,COUNT(people.people_id) AS total FROM people 
        RIGHT JOIN lookup_state ON people.state_id = lookup_state.state_id 
        RIGHT JOIN lookup_district ON people.district_id = lookup_district.district_id 
        RIGHT JOIN lookup_sub_base ON people.sub_base_id = lookup_sub_base.sub_base_id
        RIGHT JOIN lookup_cluster ON people.cluster_id = lookup_cluster.cluster_id
        RIGHT JOIN lookup_kampung ON people.kampung_id = lookup_kampung.kampung_id WHERE lookup_state.state_id = '".$id."' GROUP BY lookup_kampung.kampung_id ORDER BY lookup_district.district_id");
        $model = $sql->queryAll();

        $state = LookupState::find()->where(['state_id'=>$id])->one();

        return $this->render('summary',[
            'model'=>$model,
            'state'=>$state,

        ]);
    }


}
