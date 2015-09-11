<?php

namespace backend\controllers;

use Yii;
use backend\models\CountCluster;
use backend\models\CountClusterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountClusterController implements the CRUD actions for CountCluster model.
 */
class CountClusterController extends Controller
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
     * Lists all CountCluster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CountClusterSearch();
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
                AND people.cluster_id = '.$id.') as temp_table
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

        $model = CountCluster::find()->where(['cluster_id'=>$id])->one();

        $model->ict = $jumlahICT;
        $model->kesihatan = $jumlahKesihatan;
        $model->pendidikan = $jumlahPendidikan;
        $model->keusahawanan = $jumlahKeusahawanan;
        $model->riadah = $jumlahRiadah;
        $model->last_update = date('Y-m-d H:i:s');
        $model->save();

        return $this->redirect(['index','id'=> $model->sub_base_id]);

    }
    /**
     * Displays a single CountCluster model.
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
     * Creates a new CountCluster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CountCluster();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CountCluster model.
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
     * Deletes an existing CountCluster model.
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
     * Finds the CountCluster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CountCluster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CountCluster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
