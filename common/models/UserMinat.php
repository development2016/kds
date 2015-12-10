<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_minat".
 *
 * @property integer $id
 * @property string $pengatur_program_multimedia
 * @property string $pereka_grafik
 * @property string $pemaju_perisian
 * @property string $pereka_laman_sesawang
 * @property string $pengaturcara_komputer
 * @property string $lain_lain_1
 * @property string $pereka_bentuk_produk
 * @property string $tukang_masak
 * @property string $jahitan
 * @property string $penghias_dalaman
 * @property string $andaman
 * @property string $lain_lain_2
 * @property string $landskap
 * @property string $akuakultur
 * @property string $penaman_hortikultur
 * @property string $pengusaha_hidroponik
 * @property string $penternak
 * @property string $lain_lain_3
 * @property string $fasilitator
 * @property string $operator_kemasukan_data
 * @property string $khidmat_sosial
 * @property string $fotografer
 * @property string $editor
 * @property string $lain_lain_4
 * @property string $pelukis_pelan
 * @property string $mekanik
 * @property string $penservis
 * @property string $automasi
 * @property string $pembaik_alat_elektrik
 * @property string $lain_lain_5
 * @property integer $user_id
 */
class UserMinat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_minat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['pengatur_program_multimedia', 'pereka_grafik', 'pemaju_perisian', 'pereka_laman_sesawang', 'pengaturcara_komputer', 'lain_lain_1', 'pereka_bentuk_produk', 'tukang_masak', 'jahitan', 'penghias_dalaman', 'andaman', 'lain_lain_2', 'landskap', 'akuakultur', 'penaman_hortikultur', 'pengusaha_hidroponik', 'penternak', 'fasilitator', 'operator_kemasukan_data', 'khidmat_sosial', 'fotografer', 'editor', 'lain_lain_4', 'pelukis_pelan', 'mekanik', 'penservis', 'automasi', 'pembaik_alat_elektrik'], 'string', 'max' => 50],
            [['lain_lain_3', 'lain_lain_5'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pengatur_program_multimedia' => 'Pengatur Program Multimedia',
            'pereka_grafik' => 'Pereka Grafik',
            'pemaju_perisian' => 'Pemaju Perisian',
            'pereka_laman_sesawang' => 'Pereka Laman Sesawang',
            'pengaturcara_komputer' => 'Pengaturcara Komputer',
            'lain_lain_1' => 'Lain Lain 1',
            'pereka_bentuk_produk' => 'Pereka Bentuk Produk',
            'tukang_masak' => 'Tukang Masak',
            'jahitan' => 'Jahitan',
            'penghias_dalaman' => 'Penghias Dalaman',
            'andaman' => 'Andaman',
            'lain_lain_2' => 'Lain Lain 2',
            'landskap' => 'Landskap',
            'akuakultur' => 'Akuakultur',
            'penaman_hortikultur' => 'Penaman Hortikultur',
            'pengusaha_hidroponik' => 'Pengusaha Hidroponik',
            'penternak' => 'Penternak',
            'lain_lain_3' => 'Lain Lain 3',
            'fasilitator' => 'Fasilitator',
            'operator_kemasukan_data' => 'Operator Kemasukan Data',
            'khidmat_sosial' => 'Khidmat Sosial',
            'fotografer' => 'Fotografer',
            'editor' => 'Editor',
            'lain_lain_4' => 'Lain Lain 4',
            'pelukis_pelan' => 'Pelukis Pelan',
            'mekanik' => 'Mekanik',
            'penservis' => 'Penservis',
            'automasi' => 'Automasi',
            'pembaik_alat_elektrik' => 'Pembaik Alat Elektrik',
            'lain_lain_5' => 'Lain Lain 5',
            'user_id' => 'User ID',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserMinat()
    {
        return $this->hasOne(UserMinat::className(), ['id' => 'id']);
    }
}
