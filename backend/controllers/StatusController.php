<?php

namespace backend\controllers;

use Yii;
use common\models\Status;
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
use common\models\ManagerTrain;
use backend\models\User;
use kartik\mpdf\Pdf;
/**
 * StatusController implements the CRUD actions for Status model.
 */
class StatusController extends Controller
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


    public function actionPrint(){
        $kg_pahang = LookupKampung::find()->where(['state_id' => 12])->count();
        $kg_perlis = LookupKampung::find()->where(['state_id' => 14])->count();
        $kg_terengganu = LookupKampung::find()->where(['state_id' => 18])->count();
        $kg_perak = LookupKampung::find()->where(['state_id' => 15])->count();
        $kg_johor = LookupKampung::find()->where(['state_id' => 22])->count();
        $kg_kedah = LookupKampung::find()->where(['state_id' => 16])->count();
        $kg_selangor = LookupKampung::find()->where(['state_id' => 13])->count();

        // volunteer
        $v_pahang = Volunteer::find()->where(['state_id' => 12])->count();
        $v_perlis = Volunteer::find()->where(['state_id' => 14])->count();
        $v_terengganu = Volunteer::find()->where(['state_id' => 18])->count();
        $v_perak = Volunteer::find()->where(['state_id' => 15])->count();
        $v_johor = Volunteer::find()->where(['state_id' => 22])->count();
        $v_kedah = Volunteer::find()->where(['state_id' => 16])->count();
        $v_selangor = Volunteer::find()->where(['state_id' => 13])->count();

        // train
        $mwt_pahang = User::find()->where(['state_area_id' => 12,'status_area' => 'Microworker Train'])->count();
        $mwt_perlis = User::find()->where(['state_area_id' => 14,'status_area' => 'Microworker Train'])->count();
        $mwt_terengganu = User::find()->where(['state_area_id' => 18,'status_area' => 'Microworker Train'])->count();
        $mwt_perak = User::find()->where(['state_area_id' => 15,'status_area' => 'Microworker Train'])->count();
        $mwt_johor = User::find()->where(['state_area_id' => 22,'status_area' => 'Microworker Train'])->count();
        $mwt_kedah = User::find()->where(['state_area_id' => 16,'status_area' => 'Microworker Train'])->count();
        $mwt_selangor = User::find()->where(['state_area_id' => 13,'status_area' => 'Microworker Train'])->count();

        // train & task
        $mwtt_pahang = User::find()->where(['state_area_id' => 12,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_perlis = User::find()->where(['state_area_id' => 14,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_terengganu = User::find()->where(['state_area_id' => 18,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_perak = User::find()->where(['state_area_id' => 15,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_johor = User::find()->where(['state_area_id' => 22,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_kedah = User::find()->where(['state_area_id' => 16,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_selangor = User::find()->where(['state_area_id' => 13,'status_area' => 'Microworker Train & Task'])->count();

        //pfn audit
        $pfna_pahang = Pfn::find()->where(['state_id' => 12,'status_audit'=>'Ya'])->count();
        $pfna_perlis = Pfn::find()->where(['state_id' => 14,'status_audit'=>'Ya'])->count();
        $pfna_terengganu = Pfn::find()->where(['state_id' => 18,'status_audit'=>'Ya'])->count();
        $pfna_perak = Pfn::find()->where(['state_id' => 15,'status_audit'=>'Ya'])->count();
        $pfna_johor = Pfn::find()->where(['state_id' => 22,'status_audit'=>'Ya'])->count();
        $pfna_kedah = Pfn::find()->where(['state_id' => 16,'status_audit'=>'Ya'])->count();
        $pfna_selangor = Pfn::find()->where(['state_id' => 13,'status_audit'=>'Ya'])->count();

        //pfn network
        $pfnn_pahang = Pfn::find()->where(['state_id' => 12,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_perlis = Pfn::find()->where(['state_id' => 14,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_terengganu = Pfn::find()->where(['state_id' => 18,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_perak = Pfn::find()->where(['state_id' => 15,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_johor = Pfn::find()->where(['state_id' => 22,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_kedah = Pfn::find()->where(['state_id' => 16,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_selangor = Pfn::find()->where(['state_id' => 13,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();

        //manager trained
        $mngt_pahang = ManagerTrain::find()->where(['state_id' => 12])->count();
        $mngt_perlis = ManagerTrain::find()->where(['state_id' => 14])->count();
        $mngt_terengganu = ManagerTrain::find()->where(['state_id' => 18])->count();
        $mngt_perak = ManagerTrain::find()->where(['state_id' => 15])->count();
        $mngt_johor = ManagerTrain::find()->where(['state_id' => 22])->count();
        $mngt_kedah = ManagerTrain::find()->where(['state_id' => 16])->count();
        $mngt_selangor = ManagerTrain::find()->where(['state_id' => 13])->count();

        // isu
        $i_pahang = IssueConduit::find()->where(['state_id' => 12])->count();
        $i_perlis = IssueConduit::find()->where(['state_id' => 14])->count();
        $i_terengganu = IssueConduit::find()->where(['state_id' => 18])->count();
        $i_perak = IssueConduit::find()->where(['state_id' => 15])->count();
        $i_johor = IssueConduit::find()->where(['state_id' => 22])->count();
        $i_kedah = IssueConduit::find()->where(['state_id' => 16])->count();
        $i_selangor = IssueConduit::find()->where(['state_id' => 13])->count();

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

        //status 2
        $reject_1 = Status::find()->where(['id'=>1])->all();
        $reject_2 = Status::find()->where(['id'=>2])->all();
        $reject_3 = Status::find()->where(['id'=>3])->all();
        $reject_4 = Status::find()->where(['id'=>4])->all();
        $reject_5 = Status::find()->where(['id'=>5])->all();
        $reject_6 = Status::find()->where(['id'=>6])->all();

        $content = $this->renderPartial('print',[
            'kg_pahang' => $kg_pahang,
            'kg_perlis' => $kg_perlis,
            'kg_terengganu' => $kg_terengganu,
            'kg_perak' => $kg_perak,
            'kg_johor' => $kg_johor,
            'kg_kedah' => $kg_kedah,
            'kg_selangor' => $kg_selangor,

            'v_pahang' => $v_pahang,
            'v_perlis' => $v_perlis,
            'v_terengganu' => $v_terengganu,
            'v_perak' => $v_perak,
            'v_johor' => $v_johor,
            'v_kedah' => $v_kedah,
            'v_selangor' => $v_selangor,

            'mwt_pahang' => $mwt_pahang,
            'mwt_perlis' => $mwt_perlis,
            'mwt_terengganu' => $mwt_terengganu,
            'mwt_perak' => $mwt_perak,
            'mwt_johor' => $mwt_johor,
            'mwt_kedah' => $mwt_kedah,
            'mwt_selangor' => $mwt_selangor,

            'mwtt_pahang' => $mwtt_pahang,
            'mwtt_perlis' => $mwtt_perlis,
            'mwtt_terengganu' => $mwtt_terengganu,
            'mwtt_perak' => $mwtt_perak,
            'mwtt_johor' => $mwtt_johor,
            'mwtt_kedah' => $mwtt_kedah,
            'mwtt_selangor' => $mwtt_selangor,

            'pfna_pahang' => $pfna_pahang,
            'pfna_perlis' => $pfna_perlis,
            'pfna_terengganu' => $pfna_terengganu,
            'pfna_perak' => $pfna_perak,
            'pfna_johor' => $pfna_johor,
            'pfna_kedah' => $pfna_kedah,
            'pfna_selangor' => $pfna_selangor,

            'pfnn_pahang' => $pfnn_pahang,
            'pfnn_perlis' => $pfnn_perlis,
            'pfnn_terengganu' => $pfnn_terengganu,
            'pfnn_perak' => $pfnn_perak,
            'pfnn_johor' => $pfnn_johor,
            'pfnn_kedah' => $pfnn_kedah,
            'pfnn_selangor' => $pfnn_selangor,

            'i_pahang' => $i_pahang,
            'i_perlis' => $i_perlis,
            'i_terengganu' => $i_terengganu,
            'i_perak' => $i_perak,
            'i_johor' => $i_johor,
            'i_kedah' => $i_kedah,
            'i_selangor' => $i_selangor,

            'p_pahang' => $p_pahang,
            'p_perlis' => $p_perlis,
            'p_terengganu' => $p_terengganu,
            'p_perak' => $p_perak,
            'p_johor' => $p_johor,
            'p_kedah' => $p_kedah,
            'p_selangor' => $p_selangor,

            'reject' => $reject,
            'reject_1' => $reject_1,
            'reject_2' => $reject_2,
            'reject_3' => $reject_3,
            'reject_4' => $reject_4,
            'reject_5' => $reject_5,
            'reject_6' => $reject_6,


            'mngt_pahang' => $mngt_pahang,
            'mngt_perlis' => $mngt_perlis,
            'mngt_terengganu' => $mngt_terengganu,
            'mngt_perak' => $mngt_perak,
            'mngt_johor' => $mngt_johor,
            'mngt_kedah' => $mngt_kedah,
            'mngt_selangor' => $mngt_selangor,

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
                'SetHeader'=>'Summary KDS - '.$date, 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();


    }

    public function actionStatus()
    {
        //$this->layout = 'graf';
        // kampung
        $kg_pahang = LookupKampung::find()->where(['state_id' => 12])->count();
        $kg_perlis = LookupKampung::find()->where(['state_id' => 14])->count();
        $kg_terengganu = LookupKampung::find()->where(['state_id' => 18])->count();
        $kg_perak = LookupKampung::find()->where(['state_id' => 15])->count();
        $kg_johor = LookupKampung::find()->where(['state_id' => 22])->count();
        $kg_kedah = LookupKampung::find()->where(['state_id' => 16])->count();
        $kg_selangor = LookupKampung::find()->where(['state_id' => 13])->count();

        // volunteer
        $v_pahang = Volunteer::find()->where(['state_id' => 12])->count();
        $v_perlis = Volunteer::find()->where(['state_id' => 14])->count();
        $v_terengganu = Volunteer::find()->where(['state_id' => 18])->count();
        $v_perak = Volunteer::find()->where(['state_id' => 15])->count();
        $v_johor = Volunteer::find()->where(['state_id' => 22])->count();
        $v_kedah = Volunteer::find()->where(['state_id' => 16])->count();
        $v_selangor = Volunteer::find()->where(['state_id' => 13])->count();

        // train
        $mwt_pahang = User::find()->where(['state_area_id' => 12,'status_area' => 'Microworker Train'])->count();
        $mwt_perlis = User::find()->where(['state_area_id' => 14,'status_area' => 'Microworker Train'])->count();
        $mwt_terengganu = User::find()->where(['state_area_id' => 18,'status_area' => 'Microworker Train'])->count();
        $mwt_perak = User::find()->where(['state_area_id' => 15,'status_area' => 'Microworker Train'])->count();
        $mwt_johor = User::find()->where(['state_area_id' => 22,'status_area' => 'Microworker Train'])->count();
        $mwt_kedah = User::find()->where(['state_area_id' => 16,'status_area' => 'Microworker Train'])->count();
        $mwt_selangor = User::find()->where(['state_area_id' => 13,'status_area' => 'Microworker Train'])->count();

        // train & task
        $mwtt_pahang = User::find()->where(['state_area_id' => 12,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_perlis = User::find()->where(['state_area_id' => 14,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_terengganu = User::find()->where(['state_area_id' => 18,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_perak = User::find()->where(['state_area_id' => 15,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_johor = User::find()->where(['state_area_id' => 22,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_kedah = User::find()->where(['state_area_id' => 16,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_selangor = User::find()->where(['state_area_id' => 13,'status_area' => 'Microworker Train & Task'])->count();

        //pfn audit
        $pfna_pahang = Pfn::find()->where(['state_id' => 12,'status_audit'=>'Ya'])->count();
        $pfna_perlis = Pfn::find()->where(['state_id' => 14,'status_audit'=>'Ya'])->count();
        $pfna_terengganu = Pfn::find()->where(['state_id' => 18,'status_audit'=>'Ya'])->count();
        $pfna_perak = Pfn::find()->where(['state_id' => 15,'status_audit'=>'Ya'])->count();
        $pfna_johor = Pfn::find()->where(['state_id' => 22,'status_audit'=>'Ya'])->count();
        $pfna_kedah = Pfn::find()->where(['state_id' => 16,'status_audit'=>'Ya'])->count();
        $pfna_selangor = Pfn::find()->where(['state_id' => 13,'status_audit'=>'Ya'])->count();

        //pfn network
        $pfnn_pahang = Pfn::find()->where(['state_id' => 12,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_perlis = Pfn::find()->where(['state_id' => 14,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_terengganu = Pfn::find()->where(['state_id' => 18,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_perak = Pfn::find()->where(['state_id' => 15,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_johor = Pfn::find()->where(['state_id' => 22,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_kedah = Pfn::find()->where(['state_id' => 16,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_selangor = Pfn::find()->where(['state_id' => 13,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();


        //manager trained
        $mngt_pahang = ManagerTrain::find()->where(['state_id' => 12])->count();
        $mngt_perlis = ManagerTrain::find()->where(['state_id' => 14])->count();
        $mngt_terengganu = ManagerTrain::find()->where(['state_id' => 18])->count();
        $mngt_perak = ManagerTrain::find()->where(['state_id' => 15])->count();
        $mngt_johor = ManagerTrain::find()->where(['state_id' => 22])->count();
        $mngt_kedah = ManagerTrain::find()->where(['state_id' => 16])->count();
        $mngt_selangor = ManagerTrain::find()->where(['state_id' => 13])->count();
        // isu
        $i_pahang = IssueConduit::find()->where(['state_id' => 12])->count();
        $i_perlis = IssueConduit::find()->where(['state_id' => 14])->count();
        $i_terengganu = IssueConduit::find()->where(['state_id' => 18])->count();
        $i_perak = IssueConduit::find()->where(['state_id' => 15])->count();
        $i_johor = IssueConduit::find()->where(['state_id' => 22])->count();
        $i_kedah = IssueConduit::find()->where(['state_id' => 16])->count();
        $i_selangor = IssueConduit::find()->where(['state_id' => 13])->count();

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

        //status 2
        $reject_1 = Status::find()->where(['id'=>1])->all();
        $reject_2 = Status::find()->where(['id'=>2])->all();
        $reject_3 = Status::find()->where(['id'=>3])->all();
        $reject_4 = Status::find()->where(['id'=>4])->all();
        $reject_5 = Status::find()->where(['id'=>5])->all();
        $reject_6 = Status::find()->where(['id'=>6])->all();

        return $this->render('status',[
            'kg_pahang' => $kg_pahang,
            'kg_perlis' => $kg_perlis,
            'kg_terengganu' => $kg_terengganu,
            'kg_perak' => $kg_perak,
            'kg_johor' => $kg_johor,
            'kg_kedah' => $kg_kedah,
            'kg_selangor' => $kg_selangor,

            'v_pahang' => $v_pahang,
            'v_perlis' => $v_perlis,
            'v_terengganu' => $v_terengganu,
            'v_perak' => $v_perak,
            'v_johor' => $v_johor,
            'v_kedah' => $v_kedah,
            'v_selangor' => $v_selangor,

            'mwt_pahang' => $mwt_pahang,
            'mwt_perlis' => $mwt_perlis,
            'mwt_terengganu' => $mwt_terengganu,
            'mwt_perak' => $mwt_perak,
            'mwt_johor' => $mwt_johor,
            'mwt_kedah' => $mwt_kedah,
            'mwt_selangor' => $mwt_selangor,

            'mwtt_pahang' => $mwtt_pahang,
            'mwtt_perlis' => $mwtt_perlis,
            'mwtt_terengganu' => $mwtt_terengganu,
            'mwtt_perak' => $mwtt_perak,
            'mwtt_johor' => $mwtt_johor,
            'mwtt_kedah' => $mwtt_kedah,
            'mwtt_selangor' => $mwtt_selangor,

            'pfna_pahang' => $pfna_pahang,
            'pfna_perlis' => $pfna_perlis,
            'pfna_terengganu' => $pfna_terengganu,
            'pfna_perak' => $pfna_perak,
            'pfna_johor' => $pfna_johor,
            'pfna_kedah' => $pfna_kedah,
            'pfna_selangor' => $pfna_selangor,

            'pfnn_pahang' => $pfnn_pahang,
            'pfnn_perlis' => $pfnn_perlis,
            'pfnn_terengganu' => $pfnn_terengganu,
            'pfnn_perak' => $pfnn_perak,
            'pfnn_johor' => $pfnn_johor,
            'pfnn_kedah' => $pfnn_kedah,
            'pfnn_selangor' => $pfnn_selangor,

            'i_pahang' => $i_pahang,
            'i_perlis' => $i_perlis,
            'i_terengganu' => $i_terengganu,
            'i_perak' => $i_perak,
            'i_johor' => $i_johor,
            'i_kedah' => $i_kedah,
            'i_selangor' => $i_selangor,

            'p_pahang' => $p_pahang,
            'p_perlis' => $p_perlis,
            'p_terengganu' => $p_terengganu,
            'p_perak' => $p_perak,
            'p_johor' => $p_johor,
            'p_kedah' => $p_kedah,
            'p_selangor' => $p_selangor,

            'reject' => $reject,
            'reject_1' => $reject_1,
            'reject_2' => $reject_2,
            'reject_3' => $reject_3,
            'reject_4' => $reject_4,
            'reject_5' => $reject_5,
            'reject_6' => $reject_6,

            'mngt_pahang' => $mngt_pahang,
            'mngt_perlis' => $mngt_perlis,
            'mngt_terengganu' => $mngt_terengganu,
            'mngt_perak' => $mngt_perak,
            'mngt_johor' => $mngt_johor,
            'mngt_kedah' => $mngt_kedah,
            'mngt_selangor' => $mngt_selangor,

            'ps_pahang' => $ps_pahang,
            'ps_perlis' => $ps_perlis,
            'ps_terengganu' => $ps_terengganu,
            'ps_perak' => $ps_perak,
            'ps_johor' => $ps_johor,
            'ps_kedah' => $ps_kedah,
            'ps_selangor' => $ps_selangor,
        ]);
    }




    public function actionKds()
    {
        $this->layout = 'status';
        // kampung
        $kg_pahang = LookupKampung::find()->where(['state_id' => 12])->count();
        $kg_perlis = LookupKampung::find()->where(['state_id' => 14])->count();
        $kg_terengganu = LookupKampung::find()->where(['state_id' => 18])->count();
        $kg_perak = LookupKampung::find()->where(['state_id' => 15])->count();
        $kg_johor = LookupKampung::find()->where(['state_id' => 22])->count();
        $kg_kedah = LookupKampung::find()->where(['state_id' => 16])->count();
        $kg_selangor = LookupKampung::find()->where(['state_id' => 13])->count();

        // volunteer
        $v_pahang = Volunteer::find()->where(['state_id' => 12])->count();
        $v_perlis = Volunteer::find()->where(['state_id' => 14])->count();
        $v_terengganu = Volunteer::find()->where(['state_id' => 18])->count();
        $v_perak = Volunteer::find()->where(['state_id' => 15])->count();
        $v_johor = Volunteer::find()->where(['state_id' => 22])->count();
        $v_kedah = Volunteer::find()->where(['state_id' => 16])->count();
        $v_selangor = Volunteer::find()->where(['state_id' => 13])->count();

        // train
        $mwt_pahang = User::find()->where(['state_area_id' => 12,'status_area' => 'Microworker Train'])->count();
        $mwt_perlis = User::find()->where(['state_area_id' => 14,'status_area' => 'Microworker Train'])->count();
        $mwt_terengganu = User::find()->where(['state_area_id' => 18,'status_area' => 'Microworker Train'])->count();
        $mwt_perak = User::find()->where(['state_area_id' => 15,'status_area' => 'Microworker Train'])->count();
        $mwt_johor = User::find()->where(['state_area_id' => 22,'status_area' => 'Microworker Train'])->count();
        $mwt_kedah = User::find()->where(['state_area_id' => 16,'status_area' => 'Microworker Train'])->count();
        $mwt_selangor = User::find()->where(['state_area_id' => 13,'status_area' => 'Microworker Train'])->count();

        // train & task
        $mwtt_pahang = User::find()->where(['state_area_id' => 12,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_perlis = User::find()->where(['state_area_id' => 14,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_terengganu = User::find()->where(['state_area_id' => 18,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_perak = User::find()->where(['state_area_id' => 15,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_johor = User::find()->where(['state_area_id' => 22,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_kedah = User::find()->where(['state_area_id' => 16,'status_area' => 'Microworker Train & Task'])->count();
        $mwtt_selangor = User::find()->where(['state_area_id' => 13,'status_area' => 'Microworker Train & Task'])->count();

        //pfn audit
        $pfna_pahang = Pfn::find()->where(['state_id' => 12,'status_audit'=>'Ya'])->count();
        $pfna_perlis = Pfn::find()->where(['state_id' => 14,'status_audit'=>'Ya'])->count();
        $pfna_terengganu = Pfn::find()->where(['state_id' => 18,'status_audit'=>'Ya'])->count();
        $pfna_perak = Pfn::find()->where(['state_id' => 15,'status_audit'=>'Ya'])->count();
        $pfna_johor = Pfn::find()->where(['state_id' => 22,'status_audit'=>'Ya'])->count();
        $pfna_kedah = Pfn::find()->where(['state_id' => 16,'status_audit'=>'Ya'])->count();
        $pfna_selangor = Pfn::find()->where(['state_id' => 13,'status_audit'=>'Ya'])->count();

        //pfn network
        $pfnn_pahang = Pfn::find()->where(['state_id' => 12,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_perlis = Pfn::find()->where(['state_id' => 14,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_terengganu = Pfn::find()->where(['state_id' => 18,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_perak = Pfn::find()->where(['state_id' => 15,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_johor = Pfn::find()->where(['state_id' => 22,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_kedah = Pfn::find()->where(['state_id' => 16,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();
        $pfnn_selangor = Pfn::find()->where(['state_id' => 13,'status_audit'=>'Ya','status_rangkaian'=>'Ya'])->count();


        //manager trained
        $mngt_pahang = ManagerTrain::find()->where(['state_id' => 12])->count();
        $mngt_perlis = ManagerTrain::find()->where(['state_id' => 14])->count();
        $mngt_terengganu = ManagerTrain::find()->where(['state_id' => 18])->count();
        $mngt_perak = ManagerTrain::find()->where(['state_id' => 15])->count();
        $mngt_johor = ManagerTrain::find()->where(['state_id' => 22])->count();
        $mngt_kedah = ManagerTrain::find()->where(['state_id' => 16])->count();
        $mngt_selangor = ManagerTrain::find()->where(['state_id' => 13])->count();
        // isu
        $i_pahang = IssueConduit::find()->where(['state_id' => 12])->count();
        $i_perlis = IssueConduit::find()->where(['state_id' => 14])->count();
        $i_terengganu = IssueConduit::find()->where(['state_id' => 18])->count();
        $i_perak = IssueConduit::find()->where(['state_id' => 15])->count();
        $i_johor = IssueConduit::find()->where(['state_id' => 22])->count();
        $i_kedah = IssueConduit::find()->where(['state_id' => 16])->count();
        $i_selangor = IssueConduit::find()->where(['state_id' => 13])->count();

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

        //status 2
        $reject_1 = Status::find()->where(['id'=>1])->all();
        $reject_2 = Status::find()->where(['id'=>2])->all();
        $reject_3 = Status::find()->where(['id'=>3])->all();
        $reject_4 = Status::find()->where(['id'=>4])->all();
        $reject_5 = Status::find()->where(['id'=>5])->all();
        $reject_6 = Status::find()->where(['id'=>6])->all();

        return $this->render('kds',[
            'kg_pahang' => $kg_pahang,
            'kg_perlis' => $kg_perlis,
            'kg_terengganu' => $kg_terengganu,
            'kg_perak' => $kg_perak,
            'kg_johor' => $kg_johor,
            'kg_kedah' => $kg_kedah,
            'kg_selangor' => $kg_selangor,

            'v_pahang' => $v_pahang,
            'v_perlis' => $v_perlis,
            'v_terengganu' => $v_terengganu,
            'v_perak' => $v_perak,
            'v_johor' => $v_johor,
            'v_kedah' => $v_kedah,
            'v_selangor' => $v_selangor,

            'mwt_pahang' => $mwt_pahang,
            'mwt_perlis' => $mwt_perlis,
            'mwt_terengganu' => $mwt_terengganu,
            'mwt_perak' => $mwt_perak,
            'mwt_johor' => $mwt_johor,
            'mwt_kedah' => $mwt_kedah,
            'mwt_selangor' => $mwt_selangor,

            'mwtt_pahang' => $mwtt_pahang,
            'mwtt_perlis' => $mwtt_perlis,
            'mwtt_terengganu' => $mwtt_terengganu,
            'mwtt_perak' => $mwtt_perak,
            'mwtt_johor' => $mwtt_johor,
            'mwtt_kedah' => $mwtt_kedah,
            'mwtt_selangor' => $mwtt_selangor,

            'pfna_pahang' => $pfna_pahang,
            'pfna_perlis' => $pfna_perlis,
            'pfna_terengganu' => $pfna_terengganu,
            'pfna_perak' => $pfna_perak,
            'pfna_johor' => $pfna_johor,
            'pfna_kedah' => $pfna_kedah,
            'pfna_selangor' => $pfna_selangor,

            'pfnn_pahang' => $pfnn_pahang,
            'pfnn_perlis' => $pfnn_perlis,
            'pfnn_terengganu' => $pfnn_terengganu,
            'pfnn_perak' => $pfnn_perak,
            'pfnn_johor' => $pfnn_johor,
            'pfnn_kedah' => $pfnn_kedah,
            'pfnn_selangor' => $pfnn_selangor,

            'i_pahang' => $i_pahang,
            'i_perlis' => $i_perlis,
            'i_terengganu' => $i_terengganu,
            'i_perak' => $i_perak,
            'i_johor' => $i_johor,
            'i_kedah' => $i_kedah,
            'i_selangor' => $i_selangor,

            'p_pahang' => $p_pahang,
            'p_perlis' => $p_perlis,
            'p_terengganu' => $p_terengganu,
            'p_perak' => $p_perak,
            'p_johor' => $p_johor,
            'p_kedah' => $p_kedah,
            'p_selangor' => $p_selangor,

            'reject' => $reject,
            'reject_1' => $reject_1,
            'reject_2' => $reject_2,
            'reject_3' => $reject_3,
            'reject_4' => $reject_4,
            'reject_5' => $reject_5,
            'reject_6' => $reject_6,

            'mngt_pahang' => $mngt_pahang,
            'mngt_perlis' => $mngt_perlis,
            'mngt_terengganu' => $mngt_terengganu,
            'mngt_perak' => $mngt_perak,
            'mngt_johor' => $mngt_johor,
            'mngt_kedah' => $mngt_kedah,
            'mngt_selangor' => $mngt_selangor,

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
     * Lists all Status models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Status::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Status model.
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
     * Creates a new Status model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Status();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Status model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('update', 'Maklumat Status <b>('.$model->item.')</b> Berjaya Di Kemaskini');
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Status model.
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
     * Finds the Status model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Status the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Status::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
