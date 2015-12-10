<?php

namespace backend\controllers;

use Yii;
use backend\models\CountKampung;
use backend\models\CountKampungSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountKampungController implements the CRUD actions for CountKampung model.
 */
class CountKampungController extends Controller
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
     * Lists all CountKampung models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CountKampungSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCalculate($id)
    {
        $connection = \Yii::$app->db;

        $sql = $connection->createCommand('SELECT COUNT(DISTINCT(temp_id)) as jumlah, field_id
                FROM (SELECT people.people_id as temp_id, field_id 
                FROM people, answer, question WHERE answer = "Ya" AND field_id != "0" 
                AND people.people_id = answer.people_id AND answer.question_id = question.question_id 
                AND people.kampung_id = '.$id.') as temp_table
                GROUP BY field_id');
        $calculateState = $sql->queryAll();
        $jumlahICT = $jumlahKesihatan = $jumlahPendidikan = $jumlahKeusahawanan = $jumlahRiadah = 0;
        foreach ($calculateState as $key => $value) {
            if ($value['field_id'] == 1) {
                $jumlahPendidikan = $value['jumlah'];
            }
            if ($value['field_id'] == 3) {
                $jumlahKesihatan = $value['jumlah'];
            }
            if ($value['field_id'] == 4) {
                $jumlahRiadah = $value['jumlah'];
            }
            if ($value['field_id'] == 7) {
                $jumlahICT = $value['jumlah'];
            }
            if ($value['field_id'] == 8) {
                $jumlahKeusahawanan = $value['jumlah'];
            }
        }

        $model = CountKampung::find()->where(['kampung_id'=>$id])->one();

        $model->ict = $jumlahICT;
        $model->kesihatan = $jumlahKesihatan;
        $model->pendidikan = $jumlahPendidikan;
        $model->keusahawanan = $jumlahKeusahawanan;
        $model->riadah = $jumlahRiadah;
        $model->last_update = date('Y-m-d H:i:s');
        $model->save();

        return $this->redirect(['index','id'=> $model->cluster_id]);

    }
    /**
     * Displays a single CountKampung model.
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
     * Creates a new CountKampung model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CountKampung();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CountKampung model.
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
     * Deletes an existing CountKampung model.
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
     * Finds the CountKampung model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CountKampung the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CountKampung::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
