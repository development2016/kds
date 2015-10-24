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





    
}
