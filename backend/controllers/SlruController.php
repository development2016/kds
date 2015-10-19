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




    /* SUKARELAWAN JANTINA */
    public function actionSs1(){

         $this->layout = 'graf';
        $jantina = "SELECT lookup_state.state,`volunteer`.state_id, lookup_state.kawasan_perlaksanaan,SUM(CASE WHEN jantina='Lelaki' THEN 1 ELSE 0 END) AS lelaki, SUM(CASE WHEN jantina='Perempuan' THEN 1 ELSE 0 END) AS perempuan FROM `volunteer`RIGHT JOIN lookup_state ON `volunteer`.state_id = lookup_state.state_id WHERE kawasan_perlaksanaan = 'Ya'GROUP BY `volunteer`.state_id ORDER BY lookup_state.state_id ASC;";
        $connection=Yii::$app->db;
        $command=$connection->createCommand($jantina);
        $model = $command->queryAll();

        $model_state = LookupState::find()
            ->where(['kawasan_perlaksanaan'=>'Ya']) 
            ->all();

        return $this->render('sukarelawan/ss1',['model'=>$model,'model_state'=>$model_state]); 

    }

    /* SUKARELAWAN JANTINA DISTRICT */
    public function actionSs1_district($state_id){

         $this->layout = 'graf';
      $jantina = "SELECT lookup_district.district,`volunteer`.state_id, SUM(CASE WHEN jantina='Lelaki' THEN 1 ELSE 0 END) AS lelaki, SUM(CASE WHEN jantina='Perempuan' THEN 1 ELSE 0 END) AS perempuan FROM `volunteer` RIGHT JOIN lookup_district ON `volunteer`.district_id = lookup_district.district_id WHERE `volunteer`.state_id = $state_id GROUP BY `volunteer`.district_id";
      $connection=Yii::$app->db;
      $command=$connection->createCommand($jantina);
      $model = $command->queryAll();

      // show list district
      $model_district = LookupDistrict::find()
          ->where(['state_id'=>$state_id])
          ->all();

     //show list state
      $model_state = LookupState::find()
          ->where(['state_id'=>$state_id])
          ->all();

        return $this->render('sukarelawan/ss1_district',['model'=>$model,'model_district'=>$model_district,'model_state'=>$model_state]);

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


    
}
