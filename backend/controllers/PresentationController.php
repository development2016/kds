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
        $sql2 = $connection->createCommand("SELECT dob FROM people WHERE state_id = 12 AND profession_status = 'Bekerja'");
$model2 = $sql2->queryAll();
        return $this->render('sosio-ekonomi/p2_4');
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
}
