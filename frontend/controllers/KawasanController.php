<?php

namespace frontend\controllers;

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
use frontend\models\CountState;
use frontend\models\CountDistrict;
use frontend\models\CountKampung;
use common\models\People;
use common\models\Volunteer;
use frontend\models\User;
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

        $role_id = Yii::$app->user->identity->role;
        $user_id =  Yii::$app->user->identity->id;

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM acl  WHERE user_id = '".$user_id."' AND role_id = '".$role_id."'");
        $data = $sql->queryAll();

        foreach ($data as $key => $value) {
            $state_id = $value['state_id'];
            $district_id = $value['district_id'];
            $kampung_id = $value['kampung_id'];
        }

        if ($role_id == 1) {

            $model = LookupKampung::find()->where(['kampung_id'=>$kampung_id])->one();
            $count_profil = People::find()->where(['state_id'=>$state_id,'district_id'=>$district_id,'kampung_id'=>$kampung_id])->count();
            $count_sukarelawan = Volunteer::find()->where(['state_id'=>$state_id,'district_id'=>$district_id,'kampung_id'=>$kampung_id])->count();
            $count_microworker = User::find()->where(['state_id'=>$state_id,'district_id'=>$district_id,'kampung_id'=>$kampung_id])->count();
            $model_count = CountKampung::find()->where(['state_id'=>$state_id,'district_id'=>$district_id,'kampung_id'=>$kampung_id])->one();

           $issue = $connection->createCommand('SELECT lookup_kategori_isu.kategori_isu,COUNT(issue_conduit.issue_id) AS isu FROM issue_conduit 
            RIGHT JOIN lookup_kategori_isu ON issue_conduit.issue_category = lookup_kategori_isu.kategori_id 
            WHERE issue_conduit.state_id = '.$state_id.' AND issue_conduit.district_id = '.$district_id.' AND issue_conduit.kampung_id = '.$kampung_id.' GROUP BY issue_conduit.issue_category');
            $countIssue = $issue->queryAll();

            $demographic = $connection->createCommand('SELECT info_demographic.kemudahan_id,SUM(info_demographic.bilangan) AS jumlah FROM demographic 
            RIGHT JOIN info_demographic ON demographic.demographic_id = info_demographic.demographic_id 
            WHERE demographic.state_id = '.$state_id.' AND demographic.district_id = '.$district_id.' AND  demographic.kampung_id = '.$kampung_id.' GROUP BY info_demographic.kemudahan_id');
            $countDemographic = $demographic->queryAll();

        } else if ($role_id == 3) {

            $model = LookupDistrict::find()->where(['state_id'=>$state_id,'district_id'=>$district_id])->one();
            $count_profil = People::find()->where(['state_id'=>$state_id,'district_id'=>$district_id])->count();
            $count_sukarelawan = Volunteer::find()->where(['state_id'=>$state_id,'district_id'=>$district_id])->count();
            $count_microworker = User::find()->where(['state_id'=>$state_id,'district_id'=>$district_id])->count();
            $model_count = CountDistrict::find()->where(['state_id'=>$state_id,'district_id'=>$district_id])->one();
            $count_kampung = LookupKampung::find()->where(['state_id' => $state_id,'district_id'=>$district_id])->count();

            $issue = $connection->createCommand('SELECT lookup_kategori_isu.kategori_isu,COUNT(issue_conduit.issue_id) AS isu FROM issue_conduit 
            RIGHT JOIN lookup_kategori_isu ON issue_conduit.issue_category = lookup_kategori_isu.kategori_id 
            WHERE issue_conduit.state_id = '.$state_id.' AND issue_conduit.district_id = '.$district_id.' GROUP BY issue_conduit.issue_category');
            $countIssue = $issue->queryAll();

            $demographic = $connection->createCommand('SELECT info_demographic.kemudahan_id,SUM(info_demographic.bilangan) AS jumlah FROM demographic 
            RIGHT JOIN info_demographic ON demographic.demographic_id = info_demographic.demographic_id 
            WHERE demographic.state_id = '.$state_id.' AND demographic.district_id = '.$district_id.' GROUP BY info_demographic.kemudahan_id');
            $countDemographic = $demographic->queryAll();

        } elseif ($role_id == 4) {

            $model = LookupState::find()->where(['state_id'=>$state_id])->one();
            $count_profil = People::find()->where(['state_id'=>$state_id])->count();
            $count_sukarelawan = Volunteer::find()->where(['state_id'=>$state_id])->count();
            $count_microworker = User::find()->where(['state_id'=>$state_id])->count();
            $model_count = CountState::find()->where(['state_id'=>$state_id])->one();
            $count_district = LookupDistrict::find()->where(['state_id' => $state_id])->count();
            $count_kampung = LookupKampung::find()->where(['state_id' => $state_id])->count();

            $issue = $connection->createCommand('SELECT lookup_kategori_isu.kategori_isu,COUNT(issue_conduit.issue_id) AS isu FROM issue_conduit 
            RIGHT JOIN lookup_kategori_isu ON issue_conduit.issue_category = lookup_kategori_isu.kategori_id 
            WHERE issue_conduit.state_id = '.$state_id.' GROUP BY issue_conduit.issue_category');
            $countIssue = $issue->queryAll();

            $demographic = $connection->createCommand('SELECT info_demographic.kemudahan_id,SUM(info_demographic.bilangan) AS jumlah FROM demographic 
            RIGHT JOIN info_demographic ON demographic.demographic_id = info_demographic.demographic_id 
            WHERE demographic.state_id = '.$state_id.' GROUP BY info_demographic.kemudahan_id');
            $countDemographic = $demographic->queryAll();

        } else {

        $model = LookupState::find()->where(['state_id'=>$state_id_get])->one();
        $count_district = LookupDistrict::find()->where(['state_id' => $state_id_get])->count();
        $count_sub_base = LookupSubBase::find()->where(['state_id' => $state_id_get])->count();
        $count_cluster = LookupCluster::find()->where(['state_id' => $state_id_get])->count();
        $count_kampung = LookupKampung::find()->where(['state_id' => $state_id_get])->count();

        $count_profil = People::find()->where(['state_id' => $state_id_get])->count();
        $count_sukarelawan = Volunteer::find()->where(['state_id' => $state_id_get])->count();
        $count_microworker = User::find()->where(['state_area_id' => $state_id_get])->count();

        $model_count = CountState::find()->where(['state_id'=>$state_id_get])->one();

        $issue = $connection->createCommand('SELECT lookup_kategori_isu.kategori_isu,COUNT(issue_conduit.issue_id) AS isu FROM issue_conduit 
        RIGHT JOIN lookup_kategori_isu ON issue_conduit.issue_category = lookup_kategori_isu.kategori_id 
        WHERE issue_conduit.state_id = '.$state_id_get.' GROUP BY issue_conduit.issue_category');
        $countIssue = $issue->queryAll();

        $demographic = $connection->createCommand('SELECT info_demographic.kemudahan_id,SUM(info_demographic.bilangan) AS jumlah FROM demographic 
        RIGHT JOIN info_demographic ON demographic.demographic_id = info_demographic.demographic_id 
        WHERE demographic.state_id = '.$state_id_get.' GROUP BY info_demographic.kemudahan_id');
        $countDemographic = $demographic->queryAll();


        }
        

                if ($role_id == 1) {
                    return $this->render('state',[
                        'data' => $data,
                        'model' => $model,
                        'count_profil'=>$count_profil,
                        'count_sukarelawan'=>$count_sukarelawan,
                        'count_microworker'=>$count_microworker,
                        'model_count' => $model_count,
                        'countIssue' => $countIssue,
                        'countDemographic' => $countDemographic,
                    ]);
                } elseif ($role_id == 3) {
                    return $this->render('state',[
                        'data' => $data,
                        'model' => $model,
                        'count_kampung'=>$count_kampung,
                        'count_profil'=>$count_profil,
                        'count_sukarelawan'=>$count_sukarelawan,
                        'count_microworker'=>$count_microworker,
                        'model_count' => $model_count,
                        'countIssue' => $countIssue,
                        'countDemographic' => $countDemographic,
                    ]);
                } elseif ($role_id == 4) {
                    return $this->render('state',[
                        'data' => $data,
                        'model' => $model,
                        'count_district'=>$count_district,
                        'count_kampung'=>$count_kampung,
                        'count_profil'=>$count_profil,
                        'count_sukarelawan'=>$count_sukarelawan,
                        'count_microworker'=>$count_microworker,
                        'model_count' => $model_count,
                        'countIssue' => $countIssue,
                        'countDemographic' => $countDemographic,
                    ]);   
                } else {
                    return $this->render('state',[
                        'data' => $data,
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
                        'countDemographic' => $countDemographic,
                    ]);
                }

    }

    public function actionDistrict($district_id) 
    {
        //$count_district = LookupDistrict::find()->where(['state_id' => $state_id])->count();
        $model = LookupDistrict::find()->where(['district_id'=>$district_id])->one();
        $count_sub_base = LookupSubBase::find()->where(['district_id' => $district_id])->count();
        $count_cluster = LookupCluster::find()->where(['district_id' => $district_id])->count();
        $count_kampung = LookupKampung::find()->where(['district_id' => $district_id])->count();

        $count_profil = People::find()->where(['district_id' => $district_id])->count();
        $count_sukarelawan = Volunteer::find()->where(['district_id' => $district_id])->count();
        $count_microworker = User::find()->where(['district_area_id' => $district_id])->count();

        $model_count = CountDistrict::find()->where(['district_id'=>$district_id])->one();

        $connection = \Yii::$app->db;

        $issue = $connection->createCommand('SELECT lookup_kategori_isu.kategori_isu,COUNT(issue_conduit.issue_id) AS isu FROM issue_conduit 
        RIGHT JOIN lookup_kategori_isu ON issue_conduit.issue_category = lookup_kategori_isu.kategori_id 
        WHERE issue_conduit.district_id = '.$district_id.' GROUP BY issue_conduit.issue_category');
        $countIssue = $issue->queryAll();

        $demographic = $connection->createCommand('SELECT 
                SUM(runcit + makanan + gerai) AS premis_perniagaan,
                SUM(bengkel_kereta + bengkel_motor) AS bengkel,
                SUM(industri_pert + industri_lain) AS premise_industri,
                SUM(balairaya ) AS balairaya,
                SUM(dewan_or ) AS dewan_orang_ramai,
                SUM(dewan_sbguna ) AS dewan_serbaguna,
                SUM(tele_centre ) AS tele_center,
                SUM(pusat_ict ) AS pusat_ict,
                SUM(klinik_desa ) AS klinik_desa,
                SUM(klinik_kesihatan ) AS klinik_kesihatan,
                SUM(klinik_swasta ) AS klinik_swasta,
                SUM(sek_rendah ) AS sek_rendah,
                SUM(sek_menengah ) AS sek_menengah,
                SUM(sek_agama ) AS sek_agama,
                SUM(kolej_voka ) AS kolej_voka,
                SUM(kolej ) AS kolej,
                SUM(tadika_kemas ) AS tadika_kemas,
                SUM(tadika_swasta ) AS tadika_swasta,
                SUM(perpustakaan_desa ) AS perpustakaan_desa,
                SUM(perpustakaan_gerak ) AS perpustakaan_gerak,
                SUM(surau ) AS surau,
                SUM(masjid ) AS masjid,
                SUM(ibadah_lain ) AS ibadah_lain,
                SUM(tp_kanak ) AS tp_kanak,
                SUM(tp_gelanggang ) AS tp_gelanggang,
                SUM(tp_p_bola ) AS tp_p_bola,
                SUM(homestay ) AS homestay
                FROM demographic 
                WHERE district_id = '.$district_id.'');
        $countDemographic = $demographic->queryAll();
        



        return $this->render('district',[
            'model' => $model,
            'count_sub_base'=>$count_sub_base,
            'count_cluster'=>$count_cluster,
            'count_kampung'=>$count_kampung,
            'count_profil'=>$count_profil,
            'count_sukarelawan'=>$count_sukarelawan,
            'count_microworker'=>$count_microworker,
            'model_count' => $model_count,
            'countIssue' => $countIssue,
            'countDemographic' => $countDemographic,
            ]);
    }


    
}
