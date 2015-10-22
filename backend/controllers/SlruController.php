<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use backend\models\CountState;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupKampung;
use common\models\LookupPerkahwinan;
/**
 * VolunteerController implements the CRUD actions for Volunteer model.
 */
class SlruController extends Controller
{
   


    public function actionIndex() 
    {

        return $this->render('index');
    }


    // DEMOGRAFI
    public function actionSd1()
    {

    	//build your own quoery here and render to view
    	return $this->render('demografi/sd1');
    }




    // SLRU PADANAN MINAT KESELURUHAN
    public function actionSp1()
    {

        $this->layout = 'graf';
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT 
            SUM(ict) AS ict,
            SUM(kesihatan) AS kesihatan,
            SUM(pendidikan) AS pendidikan,
            SUM(keusahawanan) AS keusahawanan,
            SUM(riadah) AS riadah
            FROM count_state");
        $model = $sql->queryAll();

        $sql2 = $connection->createCommand("SELECT * FROM count_state");
        $model2 = $sql2->queryAll();


       return $this->render('padanan-minat/kawasan/sp1',[
            'model'=>$model,
            'model2'=>$model2,
        ]);


    }
    public function actionSp1_1()
    {

        $this->layout = 'graf';
        $connection = \Yii::$app->db;


        $sql2 = $connection->createCommand("SELECT * FROM count_state");
        $model2 = $sql2->queryAll();


       return $this->render('padanan-minat/kawasan/sp1_1',[
            'model2'=>$model2,
        ]);


    }





    public function actionState($id)
    {
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT 
            SUM(count_district.ict) AS ict,
            SUM(count_district.kesihatan) AS kesihatan,
            SUM(count_district.pendidikan) AS pendidikan,
            SUM(count_district.keusahawanan) AS keusahawanan,
            SUM(count_district.riadah) AS riadah,
            lookup_state.state
            FROM count_district 
            RIGHT JOIN lookup_state ON count_district.state_id = lookup_state.state_id
            WHERE count_district.state_id = '".$id."'");
        $model = $sql->queryAll();

        $sql2 = $connection->createCommand("SELECT * FROM count_district 
            RIGHT JOIN lookup_state ON count_district.state_id = lookup_state.state_id 
            RIGHT JOIN lookup_district ON count_district.district_id = lookup_district.district_id 
            WHERE count_district.state_id = '".$id."'");
        $model2 = $sql2->queryAll();

        return $this->render('padanan-minat/kawasan/state',[
            'model'=>$model,
            'model2'=>$model2,
            ]);
    }







    //MICRO WORKER JANTINA
    public function actionSm1(){

        // SQL MICRO WORKER JANTINA
        $jantina = "SELECT lookup_state.state,`user`.state_area_id,lookup_state.kawasan_perlaksanaan,SUM(CASE WHEN jantina='Lelaki' THEN 1 ELSE 0 END) AS lelaki, SUM(CASE WHEN jantina='Perempuan' THEN 1 ELSE 0 END) AS perempuan FROM `user` RIGHT JOIN lookup_state ON `user`.state_area_id = lookup_state.state_id GROUP BY `user`.state_area_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($jantina);
        $model3 = $command->queryAll();

         $model_state = LookupState::find()
             ->where(['kawasan_perlaksanaan'=>'Ya']) 
             ->all();

        return $this->render('micro/sm1',['model3'=>$model3,'model_state'=>$model_state]); 
        
    }
    
    /*public function actionPerbandingan()
    {
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM count_state");
        $model = $sql->queryAll();

        return $this->renderAjax('padanan-minat/perbandingan',[
            'model'=>$model,
        ]);

/* SELECT COUNT(answer.question_id) AS total,question.soalan,answer.answer,answer.question_id FROM people 
RIGHT JOIN answer ON people.people_id = answer.people_id 
RIGHT JOIN question ON answer.question_id = question.question_id 
WHERE  people.state_id = 22  AND  answer.question_id IN (21,22,23,24,25) AND answer.answer = "Ya" GROUP BY  answer.question_id; */

    //}







// HERE FOR SUKARELAWAN 
    /* SUKARELAWAN JANTINA */
    public function actionSs1(){

      $this->layout = 'graf';
        $jantina = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan,SUM(CASE WHEN jantina='Lelaki' THEN 1 ELSE 0 END) AS lelaki, SUM(CASE WHEN jantina='Perempuan' THEN 1 ELSE 0 END) AS perempuan FROM `volunteer`RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya'GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($jantina);
        $model2 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss1',['model2'=>$model2,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN JANTINA DISTRICT */
    public function actionSs1_district($state_id){

      $this->layout = 'graf';
      $jantina = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN jantina='Lelaki' THEN 1 ELSE 0 END) AS lelaki, SUM(CASE WHEN jantina='Perempuan' THEN 1 ELSE 0 END) AS perempuan FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id";
      $connection=Yii::$app->db;
      $command=$connection->createCommand($jantina);
      $model4 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss1_district',['model4'=>$model4,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

    /* SUKARELAWAN JANTINA KAMPUNG */
    public function actionSs1_kampung($district_id){

      $this->layout = 'graf';
      $jantina = "SELECT lookup_kampung.kampung,`volunteer`.state_id, SUM(CASE WHEN jantina='Lelaki' THEN 1 ELSE 0 END) AS lelaki, SUM(CASE WHEN jantina ='Perempuan' THEN 1 ELSE 0 END) AS perempuan FROM `volunteer` RIGHT JOIN lookup_kampung ON `volunteer`.kampung_id = lookup_kampung.kampung_id WHERE `volunteer`.district_id = $district_id GROUP BY `volunteer`.kampung_id";
      $connection=Yii::$app->db;
      $command=$connection->createCommand($jantina);
      $model5 = $command->queryAll();

      // show list kampung
      $model_kampung = LookupKampung::find()
        ->where(['district_id'=>$district_id])
        ->all();

        return $this->render('sukarelawan/ss1_kampung',['model5'=>$model5,'model_kampung'=>$model_kampung]);

    }

     /* SUKARELAWAN PROGRAM KANAK-KANAK */
    public function actionSs2_progkanak(){

      $this->layout = 'graf';
        $progkanak = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN prog_kanak_kanak ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_kanak_kanak ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progkanak);
        $model6 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_progkanak',['model6'=>$model6,'model_state'=>$model_state]); 

    }

     /* SUKARELAWAN PROGRAM KANAK-KANAK DISTRICT */
    public function actionSs2_progkanak_district($state_id){
$this->layout = 'graf';
     $progkanak = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN prog_kanak_kanak ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_kanak_kanak ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progkanak);
        $model7 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss2_progkanak_district',['model7'=>$model7,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

    /* SUKARELAWAN PROGRAM KEMASYARAKATAN */
    public function actionSs2_progkemasyarakatan(){

      $this->layout = 'graf';
        $progkemasyarakatan = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN prog_kemasyarakatan ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_kemasyarakatan ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progkemasyarakatan);
        $model8 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_progkemasyarakatan',['model8'=>$model8,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN PROGRAM KEMASYARAKATAN DISTRICT */
    public function actionSs2_progkemasyarakatan_district($state_id){

      $this->layout = 'graf';
     $progkemasyarakatan = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN prog_kemasyarakatan ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_kemasyarakatan ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progkemasyarakatan);
        $model9 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss2_progkemasyarakatan_district',['model9'=>$model9,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

    /* SUKARELAWAN PROGRAM WARGA EMAS */
    public function actionSs2_progwarga(){

$this->layout = 'graf';
        $progwarga = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN prog_warga_emas ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_warga_emas ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progwarga);
        $model11 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_progwarga',['model11'=>$model11,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN PROGRAM WARGA EMAS DISTRICT */
    public function actionSs2_progwarga_district($state_id){

$this->layout = 'graf';
     $progwarga = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN prog_warga_emas ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_warga_emas ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progwarga);
        $model12 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss2_progwarga_district',['model12'=>$model12,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

     /* SUKARELAWAN PROGRAM OKU */
    public function actionSs2_progoku(){

$this->layout = 'graf';
        $progoku = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN prog_oku ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_oku ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progoku);
        $model13 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_progoku',['model13'=>$model13,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN PROGRAM OKU DISTRICT */
    public function actionSs2_progoku_district($state_id){

$this->layout = 'graf';
     $progoku = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN prog_oku ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_oku ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progoku);
        $model14 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss2_progoku_district',['model14'=>$model14,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

    /* SUKARELAWAN AKTIVITI REKREASI */
    public function actionSs2_rekreasi(){

$this->layout = 'graf';
        $rekreasi = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN aktiviti_rekreasi ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN aktiviti_rekreasi ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($rekreasi);
        $model15 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_rekreasi',['model15'=>$model15,'model_state'=>$model_state]); 

    }

     /* SUKARELAWAN AKTIVITI REKREASI DISTRICT */
    public function actionSs2_rekreasi_district($state_id){

$this->layout = 'graf';
     $rekreasi = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN aktiviti_rekreasi ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN aktiviti_rekreasi ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($rekreasi);
        $model16 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss2_rekreasi_district',['model16'=>$model16,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

     /* SUKARELAWAN PROGRAM KESIHATAN */
    public function actionSs2_progkesihatan(){

$this->layout = 'graf';
        $progkesihatan = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN prog_kesihatan ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_kesihatan ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progkesihatan);
        $model17 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_progkesihatan',['model17'=>$model17,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN PROGRAM KESIHATAN DISTRICT */
    public function actionSs2_progkesihatan_district($state_id){

$this->layout = 'graf';
     $progkesihatan = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN prog_kesihatan ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_kesihatan ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progkesihatan);
        $model18 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss2_progkesihatan_district',['model18'=>$model18,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

    /* SUKARELAWAN PROGRAM AKADEMIK */
    public function actionSs2_progakademik(){

$this->layout = 'graf';
        $progakademik = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN prog_akademik ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_akademik ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progakademik);
        $model19 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_progakademik',['model19'=>$model19,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN PROGRAM AKADEMIK DISTRICT */
    public function actionSs2_progakademik_district($state_id){

$this->layout = 'graf';
     $progakademik = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN prog_akademik ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN prog_akademik ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($progakademik);
        $model20 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss2_progakademik_district',['model20'=>$model20,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

    /* SUKARELAWAN LAIN-LAIN */
    public function actionSs2_lain(){

$this->layout = 'graf';
        $lain = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN lain_lain ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN lain_lain ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($lain);
        $model21 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_lain',['model21'=>$model21,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN LAIN-LAIN DISTRICT */
    public function actionSs2_lain_district($state_id){

$this->layout = 'graf';
     $lain = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN lain_lain ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN lain_lain ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($lain);
        $model22 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss2_lain_district',['model22'=>$model22,'model_district'=>$model_district,'model_state'=>$model_state]);

    }




     /* SUKARELAWAN MINAT PROGRAM ALL */
    public function actionSs2_prog_minat_all(){

$this->layout = 'graf';
        $minat_all = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan,SUM(CASE WHEN prog_kanak_kanak ='Ya' THEN 1 ELSE 0 END) AS prog_kanak_ya, SUM(CASE WHEN prog_kanak_kanak ='Tidak' THEN 1 ELSE 0 END) AS prog_kanak_tidak, SUM(CASE WHEN prog_kemasyarakatan ='Ya' THEN 1 ELSE 0 END) AS prog_kemasyarakatan_ya, SUM(CASE WHEN prog_kemasyarakatan ='Tidak' THEN 1 ELSE 0 END) AS prog_kemasyarakatan_tidak, SUM(CASE WHEN prog_warga_emas ='Ya' THEN 1 ELSE 0 END) AS prog_warga_ya, SUM(CASE WHEN prog_warga_emas ='Tidak' THEN 1 ELSE 0 END) AS prog_warga_tidak, SUM(CASE WHEN prog_oku ='Ya' THEN 1 ELSE 0 END) AS prog_oku_ya, SUM(CASE WHEN prog_oku ='Tidak' THEN 1 ELSE 0 END) AS prog_oku_tidak, SUM(CASE WHEN aktiviti_rekreasi ='Ya' THEN 1 ELSE 0 END) AS aktiviti_rekreasi_ya, SUM(CASE WHEN aktiviti_rekreasi ='Tidak' THEN 1 ELSE 0 END) AS aktiviti_rekreasi_tidak, SUM(CASE WHEN prog_kesihatan ='Ya' THEN 1 ELSE 0 END) AS prog_kesihatan_ya, SUM(CASE WHEN prog_kesihatan ='Tidak' THEN 1 ELSE 0 END) AS prog_kesihatan_tidak, SUM(CASE WHEN prog_akademik ='Ya' THEN 1 ELSE 0 END) AS prog_akademik_ya, SUM(CASE WHEN prog_akademik ='Tidak' THEN 1 ELSE 0 END) AS prog_akademik_tidak, SUM(CASE WHEN lain_lain ='Ya' THEN 1 ELSE 0 END) AS lain_ya, SUM(CASE WHEN lain_lain ='Tidak' THEN 1 ELSE 0 END) AS lain_tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($minat_all);
        $model10 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_prog_minat_all',['model10'=>$model10,'model_state'=>$model_state]); 

    }


      /* SUKARELAWAN SUKARELAWAN MINAT PROGRAM YA  */
    public function actionSs2_prog_minat_ya(){

$this->layout = 'graf';
        $minat_ya = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN prog_kanak_kanak ='Ya' THEN 1 ELSE 0 END) AS prog_kanak_ya, SUM(CASE WHEN prog_kemasyarakatan ='Ya' THEN 1 ELSE 0 END) AS prog_kemasyarakatan_ya, SUM(CASE WHEN prog_warga_emas ='Ya' THEN 1 ELSE 0 END) AS prog_warga_ya, SUM(CASE WHEN prog_oku ='Ya' THEN 1 ELSE 0 END) AS prog_oku_ya, SUM(CASE WHEN aktiviti_rekreasi ='Ya' THEN 1 ELSE 0 END) AS aktiviti_rekreasi_ya, SUM(CASE WHEN prog_kesihatan ='Ya' THEN 1 ELSE 0 END) AS prog_kesihatan_ya, SUM(CASE WHEN prog_akademik ='Ya' THEN 1 ELSE 0 END) AS prog_akademik_ya, SUM(CASE WHEN lain_lain ='Ya' THEN 1 ELSE 0 END) AS lain_ya FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($minat_ya);
        $model23 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_prog_minat_ya',['model23'=>$model23,'model_state'=>$model_state]); 

    }

     /* SUKARELAWAN SUKARELAWAN MINAT PROGRAM TIDAK  */
    public function actionSs2_prog_minat_tidak(){

$this->layout = 'graf';
        $minat_tidak = "SELECT lookup_state.state, `volunteer`.state_id, lookup_state.kawasan_perlaksanaan,SUM(CASE WHEN prog_kanak_kanak ='Tidak' THEN 1 ELSE 0 END) AS prog_kanak_tidak,  SUM(CASE WHEN prog_kemasyarakatan ='Tidak' THEN 1 ELSE 0 END) AS prog_kemasyarakatan_tidak, SUM(CASE WHEN prog_warga_emas ='Tidak' THEN 1 ELSE 0 END) AS prog_warga_tidak,  SUM(CASE WHEN prog_oku ='Tidak' THEN 1 ELSE 0 END) AS prog_oku_tidak,  SUM(CASE WHEN aktiviti_rekreasi ='Tidak' THEN 1 ELSE 0 END) AS aktiviti_rekreasi_tidak,  SUM(CASE WHEN prog_kesihatan ='Tidak' THEN 1 ELSE 0 END) AS prog_kesihatan_tidak,  SUM(CASE WHEN prog_akademik ='Tidak' THEN 1 ELSE 0 END) AS prog_akademik_tidak,  SUM(CASE WHEN lain_lain ='Tidak' THEN 1 ELSE 0 END) AS lain_tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($minat_tidak);
        $model24 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss2_prog_minat_tidak',['model24'=>$model24,'model_state'=>$model_state]); 

    }


     /* SUKARELAWAN SUMBANGAN FASILITATOR */
    public function actionSs3_fasilitator(){

$this->layout = 'graf';
        $fasilitator = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN fasilitator ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN fasilitator ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($fasilitator);
        $model28 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss3_fasilitator',['model28'=>$model28,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN SUMBANGAN FASILITATOR DISTRICT */
    public function actionSs3_fasilitator_district($state_id){

$this->layout = 'graf';
     $fasilitator = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN fasilitator ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN fasilitator ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($fasilitator);
        $model29 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss3_fasilitator_district',['model29'=>$model29,'model_district'=>$model_district,'model_state'=>$model_state]);

    }


     /* SUKARELAWAN SUMBANGAN TENAGA */
    public function actionSs3_tenaga(){

$this->layout = 'graf';
        $tenaga = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN tenaga ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN tenaga ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($tenaga);
        $model30 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss3_tenaga',['model30'=>$model30,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN SUMBANGAN  TENAGA DISTRICT */
    public function actionSs3_tenaga_district($state_id){

$this->layout = 'graf';
     $tenaga = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN tenaga ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN tenaga ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($tenaga);
        $model31 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss3_tenaga_district',['model31'=>$model31,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

     /* SUKARELAWAN SUMBANGAN FOTOGRAFI */
    public function actionSs3_fotografi(){

$this->layout = 'graf';
        $fotografi = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN fotografi ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN fotografi ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($fotografi);
        $model32 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss3_fotografi',['model32'=>$model32,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN SUMBANGAN  FOTOGRAFI DISTRICT */
    public function actionSs3_fotografi_district($state_id){

$this->layout = 'graf';
     $fotografi = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN fotografi ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN fotografi ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($fotografi);
        $model33 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss3_fotografi_district',['model33'=>$model33,'model_district'=>$model_district,'model_state'=>$model_state]);

    }

     /* SUKARELAWAN SUMBANGAN LAIN */
    public function actionSs3_lain(){

$this->layout = 'graf';
        $lain = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN lain_lain_3  ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN lain_lain_3  ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($lain);
        $model34 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss3_lain',['model34'=>$model34,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN SUMBANGAN  LAIN DISTRICT */
    public function actionSs3_lain_district($state_id){

$this->layout = 'graf';
     $lain = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN lain_lain_3 ='Ya' THEN 1 ELSE 0 END) AS ya, SUM(CASE WHEN lain_lain_3  ='Tidak' THEN 1 ELSE 0 END) AS tidak FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($lain);
        $model35 = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss3_lain_district',['model35'=>$model35,'model_district'=>$model_district,'model_state'=>$model_state]);

    }


    /* SUKARELAWAN SUMBANGAN ALL */
    public function actionSs3_sumbangan_all(){

$this->layout = 'graf';
        $sumbangan_all = "SELECT lookup_state.state, `volunteer`.state_id, lookup_state.kawasan_perlaksanaan, SUM(CASE WHEN fasilitator ='Ya' THEN 1 ELSE 0 END) AS fasilitator_ya, SUM(CASE WHEN fasilitator ='Tidak' THEN 1 ELSE 0 END) AS fasilitator_tidak, SUM(CASE WHEN tenaga ='Ya' THEN 1 ELSE 0 END) AS tenaga_ya, SUM(CASE WHEN tenaga ='Tidak' THEN 1 ELSE 0 END) AS tenaga_tidak, SUM(CASE WHEN fotografi ='Ya' THEN 1 ELSE 0 END) AS fotografi_ya, SUM(CASE WHEN fotografi ='Tidak' THEN 1 ELSE 0 END) AS fotografi_tidak,SUM(CASE WHEN lain_lain_3 ='Ya' THEN 1 ELSE 0 END) AS lain_ya, SUM(CASE WHEN lain_lain_3 ='Tidak' THEN 1 ELSE 0 END) AS lain_tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($sumbangan_all);
        $model25 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss3_sumbangan_all',['model25'=>$model25,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN SUMBANGAN ALL YA */
    public function actionSs3_sumbangan_ya(){

$this->layout = 'graf';
        $sumbangan_ya = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan,SUM(CASE WHEN fasilitator ='Ya' THEN 1 ELSE 0 END) AS fasilitator_ya,  SUM(CASE WHEN tenaga ='Ya' THEN 1 ELSE 0 END) AS tenaga_ya,  SUM(CASE WHEN fotografi ='Ya' THEN 1 ELSE 0 END) AS fotografi_ya,  SUM(CASE WHEN lain_lain_3 ='Ya' THEN 1 ELSE 0 END) AS lain_ya FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($sumbangan_ya);
        $model26 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss3_sumbangan_ya',['model26'=>$model26,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN SUMBANGAN ALL TIDAK */
    public function actionSs3_sumbangan_tidak(){

$this->layout = 'graf';
        $sumbangan_tidak = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan,  SUM(CASE WHEN fasilitator ='Tidak' THEN 1 ELSE 0 END) AS fasilitator_tidak,  SUM(CASE WHEN tenaga ='Tidak' THEN 1 ELSE 0 END) AS tenaga_tidak,SUM(CASE WHEN fotografi ='Tidak' THEN 1 ELSE 0 END) AS fotografi_tidak,  SUM(CASE WHEN lain_lain_3 ='Tidak' THEN 1 ELSE 0 END) AS lain_tidak FROM `volunteer` RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya' GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($sumbangan_tidak);
        $model27 = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss3_sumbangan_tidak',['model27'=>$model27,'model_state'=>$model_state]); 

    }





























    
}
