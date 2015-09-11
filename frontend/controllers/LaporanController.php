<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CountState;
use frontend\models\CountDistrict;
use frontend\models\CountKampung;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VolunteerController implements the CRUD actions for Volunteer model.
 */
class LaporanController extends Controller
{
   
    public function actionIndex()
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM count_state RIGHT JOIN lookup_state ON count_state.state_id = lookup_state.state_id WHERE lookup_state.kawasan_perlaksanaan = 'YA'");
        $data = $sql->queryAll();

        return $this->render('index', [
            'data' => $data,
        ]);
    }

    public function actionState($id)
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM count_district RIGHT JOIN lookup_district ON count_district.district_id = lookup_district.district_id WHERE count_district.state_id ='".$id."' ");
        $data = $sql->queryAll();

        return $this->render('state', [
            'data' => $data,
        ]);
    }

    public function actionKampung($id)
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM count_kampung RIGHT JOIN lookup_kampung ON count_kampung.kampung_id = lookup_kampung.kampung_id WHERE count_kampung.district_id ='".$id."' ");
        $data = $sql->queryAll();

        return $this->render('kampung', [
            'data' => $data,
        ]);
    }

}
