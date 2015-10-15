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



    public function actionSd2(){
        
    }

    public function actionSp1()
    {


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


       return $this->render('padanan-minat/sp1',[
            'model'=>$model,
            'model2'=>$model2,
        ]);


    }

    public function actionPerbandingan()
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

    }


    
}
