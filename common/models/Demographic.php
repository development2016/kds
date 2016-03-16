<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "demographic".
 *
 * @property integer $demographic
 * @property string $nama_ketua_kampung
 * @property string $no_tel
 * @property integer $state_id
 * @property integer $district_id
 * @property integer $mukim_id
 * @property integer $sub_base_id
 * @property integer $cluster_id
 * @property integer $kampung_id
 * @property integer $bilangan_rumah
 * @property string $aktiviti_penduduk_kampung
 * @property integer $jenis_kampung_id
 * @property integer $corak_penempatan_id
 * @property integer $jenis_perumahan_id
 * @property string $koordinate
 */
class Demographic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demographic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['nama_ketua_kampung', 'required', 'message' => 'Sila Isi Nama Ketua Kampung'],
            ['state_id', 'required', 'message' => 'Sila Pilih Negeri '],
            ['district_id', 'required', 'message' => 'Sila Pilih Daerah'],
            ['sub_base_id', 'required', 'message' => 'Sila Pilih Sub Base'],
            ['cluster_id', 'required', 'message' => 'Sila Pilih Cluster'],
            ['kampung_id', 'required', 'message' => 'Sila Pilih Kampung'],
            [['bilangan_rumah', 'jenis_kampung_id', 'corak_penempatan_id', 'jenis_perumahan_id','bahagian_id','mukim_id'], 'integer'],
            [['nama_ketua_kampung', 'aktiviti_penduduk_kampung', 'koordinate'], 'string', 'max' => 225],
            [['no_tel'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'demographic_id' => 'Demographic',
            'nama_ketua_kampung' => 'Nama Ketua Kampung',
            'no_tel' => 'No Tel',
            'state_id' => 'Negeri',
            'district_id' => 'Daerah',
            'mukim_id' => 'Mukim',
            'sub_base_id' => 'Sub Base',
            'cluster_id' => 'Cluster',
            'kampung_id' => 'Kampung',
            'bilangan_rumah' => 'Bilangan Rumah',
            'aktiviti_penduduk_kampung' => 'Aktiviti Penduduk Kampung',
            'jenis_kampung_id' => 'Jenis Kampung',
            'corak_penempatan_id' => 'Corak Penempatan',
            'jenis_perumahan_id' => 'Jenis Perumahan',
            'koordinate' => 'Koordinate',
            'bahagian_id' =>'Bahagian',
        ];
    }


        public function getKampung()
    {
        return $this->hasOne(LookupKampung::className(), ['kampung_id' => 'kampung_id']);
    }
    public function getMukim()
    {
        return $this->hasOne(LookupMukim::className(), ['mukim_id' => 'mukim_id']);
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

    public function getJeniskg()
    {
        return $this->hasOne(LookupJenisKampung::className(), ['id' => 'jenis_kampung_id']);
    }

    public function getCorak()
    {
        return $this->hasOne(LookupCorakPenempatan::className(), ['id' => 'corak_penempatan_id']);
    }
    public function getBil()
    {
        return $this->hasOne(LookupBilanganRumah::className(), ['id' => 'bilangan_rumah']);
    }
    public function getJenisPerumahan()
    {
        return $this->hasOne(LookupJenisPerumahan::className(), ['id' => 'jenis_perumahan_id']);
    }
}
