<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserMicroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\UserAkademik;
use common\models\UserPengalaman;
use common\models\UserBahasa;
use common\models\UserKemahiran;
use common\models\UserMinat;
use common\models\LookupPerkahwinan;
use common\models\LookupBangsa;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserMicroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   

        $model_userminat = UserMinat::find()->where(['user_id' => $id])->one();

        $model_userakademik = UserAkademik::find()->where(['user_id' => $id])->all();

        $model_userpengalaman = UserPengalaman::find()->where(['user_id' => $id])->all();

        $model_bahasa = UserBahasa::find()->where(['user_id'=>$id])->one();

        $model_kemahiran = UserKemahiran::find()->where(['user_id'=>$id])->one();
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('kemaskini', 'Maklumat Anda Berjaya DiKemaskini');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', [

                'model' => $model,
                'model_userakademik' => $model_userakademik,
                'model_userpengalaman' => $model_userpengalaman,
                'model_userminat' => $model_userminat,
                'model_bahasa' => $model_bahasa,
                'model_kemahiran' => $model_kemahiran,
            ]);
        }

    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('update', 'Maklumat Miroworker Berjaya Di Kemaskini');
            return $this->redirect(['index']);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
