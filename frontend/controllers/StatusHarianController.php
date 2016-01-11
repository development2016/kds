<?php

namespace frontend\controllers;

use Yii;
use common\models\StatusHarian;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\People;
use common\models\Volunteer;
use common\models\Pfn;
use common\models\IssueConduit;
use frontend\models\User;
use kartik\mpdf\Pdf;
use common\models\Status;
/**
 * StatusHarianController implements the CRUD actions for StatusHarian model.
 */
class StatusHarianController extends Controller
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

    public function actionPrint()
    {

        $status = StatusHarian::find()->all();

         // people
        $p_pahang = People::find()->where(['state_id' => 12])->count();
        $p_perlis = People::find()->where(['state_id' => 14])->count();
        $p_terengganu = People::find()->where(['state_id' => 18])->count();
        $p_perak = People::find()->where(['state_id' => 15])->count();
        $p_johor = People::find()->where(['state_id' => 22])->count();
        $p_kedah = People::find()->where(['state_id' => 16])->count();
        $p_selangor = People::find()->where(['state_id' => 13])->count();

        //reject
        $reject = Status::find()->where(['id'=>7])->all();

        //data sah
        $ps_pahang = People::find()->where(['state_id' => 12,'data_status'=>'Sah'])->count();
        $ps_perlis = People::find()->where(['state_id' => 14,'data_status'=>'Sah'])->count();
        $ps_terengganu = People::find()->where(['state_id' => 18,'data_status'=>'Sah'])->count();
        $ps_perak = People::find()->where(['state_id' => 15,'data_status'=>'Sah'])->count();
        $ps_johor = People::find()->where(['state_id' => 22,'data_status'=>'Sah'])->count();
        $ps_kedah = People::find()->where(['state_id' => 16,'data_status'=>'Sah'])->count();
        $ps_selangor = People::find()->where(['state_id' => 13,'data_status'=>'Sah'])->count();


        $content = $this->renderPartial('print',[
            'status'=>$status,
            'p_pahang' => $p_pahang,
            'p_perlis' => $p_perlis,
            'p_terengganu' => $p_terengganu,
            'p_perak' => $p_perak,
            'p_johor' => $p_johor,
            'p_kedah' => $p_kedah,
            'p_selangor' => $p_selangor,

            'reject' => $reject,
            'ps_pahang' => $ps_pahang,
            'ps_perlis' => $ps_perlis,
            'ps_terengganu' => $ps_terengganu,
            'ps_perak' => $ps_perak,
            'ps_johor' => $ps_johor,
            'ps_kedah' => $ps_kedah,
            'ps_selangor' => $ps_selangor,
        ]);

        $date = date('d/m/Y');
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'KDS Report Summary'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>'Summary Harian - '.$date, 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();


        
    }



    public function actionStatus()
    {

        $status = StatusHarian::find()->all();

         // people
        $p_pahang = People::find()->where(['state_id' => 12])->count();
        $p_perlis = People::find()->where(['state_id' => 14])->count();
        $p_terengganu = People::find()->where(['state_id' => 18])->count();
        $p_perak = People::find()->where(['state_id' => 15])->count();
        $p_johor = People::find()->where(['state_id' => 22])->count();
        $p_kedah = People::find()->where(['state_id' => 16])->count();
        $p_selangor = People::find()->where(['state_id' => 13])->count();

        //reject
        $reject = Status::find()->where(['id'=>7])->all();

        //data sah
        $ps_pahang = People::find()->where(['state_id' => 12,'data_status'=>'Sah'])->count();
        $ps_perlis = People::find()->where(['state_id' => 14,'data_status'=>'Sah'])->count();
        $ps_terengganu = People::find()->where(['state_id' => 18,'data_status'=>'Sah'])->count();
        $ps_perak = People::find()->where(['state_id' => 15,'data_status'=>'Sah'])->count();
        $ps_johor = People::find()->where(['state_id' => 22,'data_status'=>'Sah'])->count();
        $ps_kedah = People::find()->where(['state_id' => 16,'data_status'=>'Sah'])->count();
        $ps_selangor = People::find()->where(['state_id' => 13,'data_status'=>'Sah'])->count();


        return $this->render('status',[
            'status'=>$status,
            'p_pahang' => $p_pahang,
            'p_perlis' => $p_perlis,
            'p_terengganu' => $p_terengganu,
            'p_perak' => $p_perak,
            'p_johor' => $p_johor,
            'p_kedah' => $p_kedah,
            'p_selangor' => $p_selangor,

            'reject' => $reject,
            'ps_pahang' => $ps_pahang,
            'ps_perlis' => $ps_perlis,
            'ps_terengganu' => $ps_terengganu,
            'ps_perak' => $ps_perak,
            'ps_johor' => $ps_johor,
            'ps_kedah' => $ps_kedah,
            'ps_selangor' => $ps_selangor,
        ]);
    }


    public function actionHarian()
    {

        $this->layout = 'status';
        $status = StatusHarian::find()->where('id != :id',['id'=>18])->all();

         // people
        $p_pahang = People::find()->where(['state_id' => 12])->count();
        $p_perlis = People::find()->where(['state_id' => 14])->count();
        $p_terengganu = People::find()->where(['state_id' => 18])->count();
        $p_perak = People::find()->where(['state_id' => 15])->count();
        $p_johor = People::find()->where(['state_id' => 22])->count();
        $p_kedah = People::find()->where(['state_id' => 16])->count();
        $p_selangor = People::find()->where(['state_id' => 13])->count();

        //reject
        $reject = Status::find()->where(['id'=>7])->all();

        //data sah
        $ps_pahang = People::find()->where(['state_id' => 12,'data_status'=>'Sah'])->count();
        $ps_perlis = People::find()->where(['state_id' => 14,'data_status'=>'Sah'])->count();
        $ps_terengganu = People::find()->where(['state_id' => 18,'data_status'=>'Sah'])->count();
        $ps_perak = People::find()->where(['state_id' => 15,'data_status'=>'Sah'])->count();
        $ps_johor = People::find()->where(['state_id' => 22,'data_status'=>'Sah'])->count();
        $ps_kedah = People::find()->where(['state_id' => 16,'data_status'=>'Sah'])->count();
        $ps_selangor = People::find()->where(['state_id' => 13,'data_status'=>'Sah'])->count();


        return $this->render('harian',[
            'status'=>$status,
            'p_pahang' => $p_pahang,
            'p_perlis' => $p_perlis,
            'p_terengganu' => $p_terengganu,
            'p_perak' => $p_perak,
            'p_johor' => $p_johor,
            'p_kedah' => $p_kedah,
            'p_selangor' => $p_selangor,

            'reject' => $reject,
            'ps_pahang' => $ps_pahang,
            'ps_perlis' => $ps_perlis,
            'ps_terengganu' => $ps_terengganu,
            'ps_perak' => $ps_perak,
            'ps_johor' => $ps_johor,
            'ps_kedah' => $ps_kedah,
            'ps_selangor' => $ps_selangor,
        ]);
    }


    /**
     * Lists all StatusHarian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => StatusHarian::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StatusHarian model.
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
     * Creates a new StatusHarian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StatusHarian();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StatusHarian model.
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
     * Deletes an existing StatusHarian model.
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
     * Finds the StatusHarian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StatusHarian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StatusHarian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
