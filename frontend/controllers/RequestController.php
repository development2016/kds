<?php

namespace frontend\controllers;

use Yii;
use common\models\Request;
use common\models\RequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
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

    public function actionCreate($id,$menu_id)
    {
        $model = new Request();

        if ($model->load(Yii::$app->request->post())) {

            $model->menu_id=$menu_id;
            $model->request_id=$id;
            $model->status='Di Terima';
            $model->enter_by= Yii::$app->user->identity->id;
            $model->enter_date=date('d/m/Y');


            if ($model->save()) {
            
                Yii::$app->getSession()->setFlash('request', 'Permintaan Anda Di Terima & Akan Di Proses');

                if ($menu_id == 4) {
                    return $this->redirect(['/people/viewp', 'id' => base64_encode($model->request_id)]);
                    
                } else if ($menu_id == 2) {

                    return $this->redirect(['/volunteer/view', 'id' => base64_encode($model->request_id)]);

                } else if ($menu_id == 3) {

                    return $this->redirect(['/issue-conduit/view', 'id' => base64_encode($model->request_id)]);

                } else if ($menu_id == 5) {

                    return $this->redirect(['/pfn/view', 'id' => base64_encode($model->request_id)]);

                } else if ($menu_id == 6) {

                    return $this->redirect(['/demographic/view', 'id' => base64_encode($model->request_id)]);
                }
                
            }

        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }


    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
