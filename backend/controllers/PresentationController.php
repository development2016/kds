<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;

/**
 * VolunteerController implements the CRUD actions for Volunteer model.
 */
class PresentationController extends Controller
{
  
    public function actionIndex() 
    {

        return $this->render('index');
    }


    // DEMOGRAFI = P1
    public function actionP1_1()
    {
    	$this->layout = 'presentation';
    	return $this->render('demografi/p1_1');
    }
    public function actionP1_2()
    {
    	$this->layout = 'presentation';
    	return $this->render('demografi/p1_2');
    }
    public function actionP1_3()
    {
        $this->layout = 'presentation';
        return $this->render('demografi/p1_3');
    }


    // SOSIO EKONOMI = P2
    public function actionP2_1()
    {
    	$this->layout = 'presentation';
    	return $this->render('sosio-ekonomi/p2_1');
    }
    public function actionP2_2()
    {
    	$this->layout = 'presentation';
    	return $this->render('sosio-ekonomi/p2_2');
    }
    public function actionP2_3_pie()
    {
        $this->layout = 'presentation';
        return $this->render('sosio-ekonomi/p2_3_pie');
    }
    public function actionP2_3_bar()
    {
        $this->layout = 'presentation';
        return $this->render('sosio-ekonomi/p2_3_bar');
    }
    public function actionP2_4()
    {
        $this->layout = 'presentation';
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT 2015 - YEAR(DATE_FORMAT(STR_TO_DATE(dob, '%d/%m/%Y'), '%Y-%m-%d')) AS age,YEAR(DATE_FORMAT(STR_TO_DATE(dob, '%d/%m/%Y'), '%Y-%m-%d')) AS year_only  FROM people WHERE state_id = 12 AND profession_status = 'Bekerja'");
        $model = $sql->queryAll();
        return $this->render('sosio-ekonomi/p2_4',['model'=>$model]);
    }



    // PADANAN MINAT = P3
    public function actionP3_1_pie()
    {
        $this->layout = 'presentation';
        return $this->render('padanan-minat/p3_1_pie');
    }
    public function actionP3_1_bar()
    {
        $this->layout = 'presentation';
        return $this->render('padanan-minat/p3_1_bar');
    }


    // OKU = P4
    public function actionP4_1()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_1');
    }
    public function actionP4_2()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_2');   
    }
    public function actionP4_4()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_4');   
    }
    public function actionP4_5()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_5');   
    }
    public function actionP4_6()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_6');   
    }
    public function actionP4_7()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_7');   
    }
    public function actionP4_7_bar()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_7_bar');   
    }
     public function actionP4_8()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_8');   
    }
     public function actionP4_8_pie()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_8_pie');   
    }

     public function actionP4_9()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_9');   
    }
     public function actionP4_9_pie()
    {
        $this->layout = 'presentation';
        return $this->render('oku/p4_9_pie');   
    }




    // MICROWOKER = P5
    public function actionP5_1()
    {
        $this->layout = 'presentation';
        return $this->render('microworker/p5_1');
    }
    public function actionP5_2()
    {
        $this->layout = 'presentation';
        return $this->render('microworker/p5_2');
    }
    public function actionP5_4()
    {
        $this->layout = 'presentation';
        return $this->render('microworker/p5_4');
    }


    // SUKARELAWAN = P6
    public function actionP6_1()
    {
        $this->layout = 'presentation';
        return $this->render('sukarelawan/p6_1');
    }
    public function actionP6_3()
    {
        $this->layout = 'presentation';
        return $this->render('sukarelawan/p6_3');
    }
    public function actionP6_4()
    {
        $this->layout = 'presentation';
        return $this->render('sukarelawan/p6_4');
    }


    // ISU = P7
    public function actionP7_1_pie()
    {
        $this->layout = 'presentation';
        return $this->render('isu/p7_1_pie');
    }
    public function actionP7_1_bar()
    {
        $this->layout = 'presentation';
        return $this->render('isu/p7_1_bar');
    }



    // IBU TUNGGAL = P8
    public function actionP8_1()
    {
        $this->layout = 'presentation';
        return $this->render('ibu-tunggal/p8_1');
    }
    public function actionP8_3()
    {
        $this->layout = 'presentation';
        return $this->render('ibu-tunggal/p8_3');
    }
    public function actionP8_4()
    {
        $this->layout = 'presentation';
        return $this->render('ibu-tunggal/p8_4');
    }
}
