<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "volunteer".
 *
 * @property integer $volunteer_id
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $district_id
 * @property integer $sub_base_id
 * @property integer $cluster_id
 * @property integer $kampung_id
 * @property string $date
 * @property string $day
 * @property string $time
 * @property string $nama
 * @property string $no_kp
 * @property string $jantina
 * @property string $alamat
 * @property string $poskod
 * @property string $tel_hp
 * @property string $tel_rumah
 * @property string $email
 * @property string $kerja_sukarelawan
 * @property string $persatuan
 * @property string $jawatan
 * @property string $tempoh
 * @property string $prog_kanak_kanak
 * @property string $prog_kemasyarakatan
 * @property string $prog_warga_emas
 * @property string $prog_oku
 * @property string $aktiviti_rekreasi
 * @property string $prog_kesihatan
 * @property string $prog_akademik
 * @property string $lain_lain
 * @property string $bahasa_melayu
 * @property string $bahasa_inggeris
 * @property string $bahasa_tamil
 * @property string $bahasa_cina
 * @property string $lain_lain_2
 * @property string $memiliki_kenderaan
 * @property string $bila_bila_masa
 * @property string $setiap_hari
 * @property string $cuti_am
 * @property string $fasilitator
 * @property string $fotografi
 * @property string $tenaga
 * @property string $lain_lain_3
 * @property string $nota_tambahan
 * @property string $volunteer_code
 * @property string $area_code
 * @property string $date_enter
 * @property integer $enter_by
 */
class Volunteer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'volunteer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'district_id', 'mukim_id', 'sub_base_id', 'cluster_id', 'kampung_id', 'enter_by'], 'integer'],
            [['date', 'day', 'time', 'jantina', 'tel_hp', 'tel_rumah', 'kerja_sukarelawan', 'persatuan', 'jawatan', 'tempoh', 'prog_kanak_kanak', 'prog_kemasyarakatan', 'prog_warga_emas', 'prog_oku', 'aktiviti_rekreasi', 'prog_kesihatan', 'prog_akademik', 'bahasa_melayu', 'bahasa_inggeris', 'bahasa_tamil', 'bahasa_cina', 'memiliki_kenderaan', 'bila_bila_masa', 'setiap_hari', 'cuti_am', 'fasilitator', 'fotografi', 'tenaga', 'date_enter'], 'string', 'max' => 45],
            [['nama', 'email'], 'string', 'max' => 225],
            [['no_kp', 'poskod'], 'string', 'max' => 15],
            ['no_kp', 'unique'],
            [['alamat', 'lain_lain', 'lain_lain_2', 'lain_lain_3', 'nota_tambahan'], 'string', 'max' => 255],

            ['no_kp', 'required', 'message' => 'Sila Isi No Kad Pengenalan'],
            ['nama', 'required', 'message' => 'Sila Isi Nama Sukarelawan'],
            ['state_id', 'required', 'message' => 'Sila Pilih Negeri '],
            ['district_id', 'required', 'message' => 'Sila Pilih Daerah'],
            //['mukim_id', 'required', 'message' => 'Sila Pilih Mukim'],
            ['sub_base_id', 'required', 'message' => 'Sila Pilih Sub Base'],
            ['cluster_id', 'required', 'message' => 'Sila Pilih Cluster'],
            ['kampung_id', 'required', 'message' => 'Sila Pilih Kampung'],

            [['kerja_sukarelawan','prog_kanak_kanak','prog_kemasyarakatan','prog_warga_emas','prog_oku','aktiviti_rekreasi','prog_kesihatan','prog_akademik','bahasa_melayu','bahasa_inggeris','bahasa_tamil','bahasa_cina','bila_bila_masa','setiap_hari','cuti_am','fasilitator','fotografi','tenaga'],'default','value'=>'Tidak'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'volunteer_id' => 'Volunteer ID',
            'state_id' => 'Negeri',
            'district_id' => 'Daerah',
            'mukim_id' => 'Mukim',
            'sub_base_id' => 'Sub Base',
            'cluster_id' => 'Cluster',
            'kampung_id' => 'Kampung',
            'date' => 'Tarikh',
            'day' => 'Hari',
            'time' => 'Masa',
            'nama' => 'Nama Sukarelawan',
            'no_kp' => 'No Kad Pengenalan',
            'jantina' => 'Jantina',
            'alamat' => 'Alamat',
            'poskod' => 'Poskod',
            'tel_hp' => 'Telefon Bimbit',
            'tel_rumah' => 'Telefon Rumah',
            'email' => 'Email',
            'kerja_sukarelawan' => 'Adakah anda terlibat dengan kerja-kerja kesukarelawan ?',
            'persatuan' => 'Persatuan',
            'jawatan' => 'Jawatan',
            'tempoh' => 'Tempoh',
            'prog_kanak_kanak' => 'Program Kanak Kanak',
            'prog_kemasyarakatan' => 'Program Kemasyarakatan',
            'prog_warga_emas' => 'Program Warga Emas',
            'prog_oku' => 'Program OKU',
            'aktiviti_rekreasi' => 'Aktiviti Rekreasi',
            'prog_kesihatan' => 'Program Kesihatan',
            'prog_akademik' => 'Program Akademik',
            'lain_lain' => 'Lain Lain (Nyatakan)',
            'bahasa_melayu' => 'Bahasa Melayu',
            'bahasa_inggeris' => 'Bahasa Inggeris',
            'bahasa_tamil' => 'Bahasa Tamil',
            'bahasa_cina' => 'Bahasa Cina',
            'lain_lain_2' => 'Lain Lain (Nyatakan)',
            'memiliki_kenderaan' => 'Memiliki Kenderaan',
            'bila_bila_masa' => 'Mingguan',
            'setiap_hari' => 'Setiap Hari',
            'cuti_am' => 'Cuti Am',
            'fasilitator' => 'Fasilitator',
            'fotografi' => 'Fotografi',
            'tenaga' => 'Tenaga',
            'lain_lain_3' => 'Lain Lain (Nyatakan)',
            'nota_tambahan' => 'Nota Tambahan',
            'date_enter' => 'Date Enter',
            'enter_by' => 'Enter By',
        ];
    }

    public function getMukim()
    {
        return $this->hasOne(LookupMukim::className(), ['mukim_id' => 'mukim_id']);
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
}
