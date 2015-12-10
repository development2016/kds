<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_pengalaman".
 *
 * @property integer $id
 * @property string $nama_organisasi
 * @property string $jawatan
 * @property string $bidang
 * @property string $tarikh_mula
 * @property string $tarikh_tamat
 * @property integer $user_id
 */
class UserPengalaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_pengalaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['nama_organisasi', 'jawatan', 'bidang'], 'string', 'max' => 225],
            [['tarikh_mula', 'tarikh_tamat'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_organisasi' => 'Nama Organisasi',
            'jawatan' => 'Jawatan',
            'bidang' => 'Bidang',
            'tarikh_mula' => 'Tarikh Mula',
            'tarikh_tamat' => 'Tarikh Tamat',
            'user_id' => 'User ID',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPengalaman()
    {
        return $this->hasOne(UserPengalaman::className(), ['id' => 'id']);
    }
    
}
