<?php

namespace backend\controllers;

use Yii;
use common\models\CountMap;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountMapController implements the CRUD actions for CountMap model.
 */
class CountMapController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CountMap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CountMap::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CountMap model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CountMap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CountMap();

        $connection = \Yii::$app->db;

        $state = $connection->createCommand('SELECT COUNT(people_id) AS total,state_id FROM people_tmp GROUP BY state_id');
        $countState = $state->queryAll();




        if ($model->load(Yii::$app->request->post()) ) {

        $connection ->createCommand('DELETE FROM count_map ')
            ->execute();


           $count = count($_POST['CountMap']['count_state']);
            for ($i=0; $i < $count; $i++) { 
                $model =new CountMap;
                $model->count_state = $_POST['CountMap']['count_state'][$i];
                $model->state_id = $_POST['CountMap']['state_id'][$i];
                $model->save();
            } 
            return $this->redirect('create');
        } else {
            return $this->render('create', [
                'model' => $model,
                'countState'=>$countState,
            ]);
        }
    }

    /**
     * Updates an existing CountMap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CountMap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CountMap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CountMap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CountMap::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
