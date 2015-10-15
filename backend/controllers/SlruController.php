<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use backend\models\CountState;
/**
 * VolunteerController implements the CRUD actions for Volunteer model.
 */
class SlruController extends Controller
{
   


    public function actionIndex() 
    {

        return $this->render('index');
    }

    public function actionSd1()
    {

    	//build your own quoery here and render to view
    	return $this->render('demografi/sd1');
    }

    public function actionSp1()
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM count_state");
        $model = $sql->queryAll();
    	return $this->render('padanan-minat/sp1',['model'=>$model]);
    }

    public function actionMinat()
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM count_state");
        $model = $sql->queryAll();
        return $this->render('padanan-minat/sp1',['model'=>$model]);
    }

    
}
