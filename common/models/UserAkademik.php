<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_akademik".
 *
 * @property integer $id
 * @property string $tahap_pendidikan
 * @property string $sijil
 * @property string $nama_institusi
 * @property string $bidang_pengkhususan
 * @property string $gred_keseluruhan
 * @property string $tarikh_anugerah
 * @property integer $user_id
 */
class UserAkademik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_akademik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','tahap_pendidikan'], 'integer'],
            [['sijil', 'nama_institusi', 'bidang_pengkhususan'], 'string', 'max' => 225],
            
            [['gred_keseluruhan'], 'string', 'max' => 100],
            [['tarikh_anugerah'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahap_pendidikan' => 'Tahap Pendidikan',
            'sijil' => 'Nama Sijil',
            'nama_institusi' => 'Nama Institusi',
            'bidang_pengkhususan' => 'Bidang Pengkhususan',
            'gred_keseluruhan' => 'Gred Keseluruhan',
            'tarikh_anugerah' => 'Tarikh Anugerah',
            'user_id' => 'User ID',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAkademik()
    {
        return $this->hasOne(UserAkademik::className(), ['id' => 'id']);
    }
}
