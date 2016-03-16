<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "issue_conduit".
 *
 * @property integer $issue_id
 * @property string $issue_code
 * @property string $area_code
 * @property string $date
 * @property string $day
 * @property string $time
 * @property string $name
 * @property string $no_kp
 * @property string $no_kp_old
 * @property string $jantina
 * @property integer $age
 * @property integer $religion
 * @property integer $race
 * @property integer $marital_status
 * @property string $address
 * @property string $postcode
 * @property integer $kampung_id
 * @property integer $cluster_id
 * @property integer $sub_base_id
 * @property integer $district_id
 * @property integer $state_id
 * @property integer $country_id
 * @property string $no_tel
 * @property integer $issue_category
 * @property string $issue_report
 * @property string $report_by
 * @property string $witness_by
 * @property string $received_by
 * @property string $status
 * @property string $analisis_isu
 * @property string $cadangan
 * @property string $date_enter
 * @property integer $enter_by
 * @property string $kategori_oku
 */
class IssueConduit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue_conduit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age', 'religion', 'race', 'marital_status', 'kampung_id', 'cluster_id', 'sub_base_id', 'district_id', 'state_id', 'mukim_id', 'issue_category', 'enter_by','kategori_oku_id','bahagian_id'], 'integer'],
            //['no_kp', 'unique'],
            ['no_kp', 'required', 'message' => 'Sila Isi No Kad Pengenalan'],
            ['name', 'required', 'message' => 'Sila Isi Nama Pengadu'],
            ['state_id', 'required', 'message' => 'Sila Pilih Negeri '],
            //['mukim_id', 'required', 'message' => 'Sila Pilih Mukim '],
            ['district_id', 'required', 'message' => 'Sila Pilih Daerah'],
            ['sub_base_id', 'required', 'message' => 'Sila Pilih Sub Base'],
            ['cluster_id', 'required', 'message' => 'Sila Pilih Cluster'],
            ['kampung_id', 'required', 'message' => 'Sila Pilih Kampung'],
            [['issue_code', 'area_code'], 'string', 'max' => 50],
            [['date', 'day', 'time', 'date_enter'], 'string', 'max' => 45],
            [['name', 'address', 'report_by', 'witness_by', 'received_by'], 'string', 'max' => 225],
            [['no_kp', 'no_kp_old', 'jantina', 'kategori_oku'], 'string', 'max' => 15],
            [['postcode'], 'string', 'max' => 10],
            [['no_tel'], 'string', 'max' => 12],
            [['issue_report', 'analisis_isu', 'cadangan'], 'string', 'max' => 1000],
            [['status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'issue_id' => 'Issue ID',
            'issue_code' => 'Kod Isu',
            'area_code' => 'Area Code',
            'date' => 'Tarikh',
            'day' => 'Hari',
            'time' => 'Masa',
            'name' => 'Nama',
            'no_kp' => 'No Kad Pengenalan',
            'no_kp_old' => 'No Kad Pengenalan (Lama)',
            'jantina' => 'Jantina',
            'age' => 'Umur',
            'religion' => 'Agama',
            'race' => 'Bangsa',
            'marital_status' => 'Status Perkahwinan',
            'address' => 'Alamat',
            'postcode' => 'Poskod',
            'kampung_id' => 'Kampung',
            'cluster_id' => 'Cluster',
            'sub_base_id' => 'Sub Base',
            'district_id' => 'Daerah',
            'state_id' => 'Negeri',
            'mukim_id' => 'Mukim',
            'no_tel' => 'No Telefon',
            'issue_category' => 'Kategori isu',
            'issue_report' => 'Laporan Isu / Permasalahan',
            'report_by' => 'Dilaoprkan Oleh',
            'witness_by' => 'Disaksikan Oleh',
            'received_by' => 'Diterima Oleh',
            'status' => 'Status',
            'analisis_isu' => 'Tindakan Pengadu / Analisis Isu',
            'cadangan' => 'Cadangan Penyelesaian yang dipersetujui bersama (komuniti dengan KAOU) dan pelan tindakan susulan (KAOU)',
            'date_enter' => 'Date Enter',
            'enter_by' => 'Enter By',
            'kategori_oku' => '',
            'kategori_oku_id' => 'Kategori oku',
            'bahagian_id' => 'Bahagian'
        ];
    }

       public function getKampung()
    {
        return $this->hasOne(LookupKampung::className(), ['kampung_id' => 'kampung_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCluster()
    {
        return $this->hasOne(LookupCluster::className(), ['cluster_id' => 'cluster_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(LookupDistrict::className(), ['district_id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubBase()
    {
        return $this->hasOne(LookupSubBase::className(), ['sub_base_id' => 'sub_base_id']);
    } 

    public function getAgama()
    {
        return $this->hasOne(LookupAgama::className(), ['id' => 'religion']);
    }
    public function getBangsa()
    {
        return $this->hasOne(LookupBangsa::className(), ['id' => 'race']);
    }
    public function getKahwin()
    {
        return $this->hasOne(LookupPerkahwinan::className(), ['id' => 'marital_status']);
    }
    public function getKategoriisu()
    {
         return $this->hasOne(LookupKategoriIsu::className(), ['kategori_id' => 'issue_category']);
    }

    public function getOku()
    {
        return $this->hasOne(LookupKategoriOku::className(), ['id' => 'kategori_oku_id']);
    }
    public function getMukim()
    {
        return $this->hasOne(LookupMukim::className(), ['mukim_id' => 'mukim_id']);
    }
    
}
