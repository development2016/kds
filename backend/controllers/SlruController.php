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
class SlruController extends Controller
{
   


    public function actionIndex() 
    {

        return $this->render('index');
    }

    public function actionDemografijantina()
    {

    	//build your own quoery here and render to view
    	return $this->render('demografi_jantina',[]);
    }


    
}
