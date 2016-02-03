<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {   
        $connection = \Yii::$app->db;
        $id = Yii::$app->user->identity->id;
        $role = Yii::$app->user->identity->role;

        $total = 0;
        $sql = $connection->createCommand("SELECT d.state_id,s.state,d.total_by_state,d.total_sah_by_state,d.total_today,d.total_sah_today,d.total_yesterday,d.total_sah_yesterday from daily_count d right join lookup_state s on s.state_id = d.state_id where s.kawasan_perlaksanaan = 'Ya'");
        $data = $sql->queryAll(); // retrieve from table daily_count(event count)

        foreach ($data as $key => $value) {
            $total += $value['total_by_state'];
        }
        return $this->render('index',[
            'role'=>$role,
            'data'=>$data,
            'total'=>$total,
            ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
