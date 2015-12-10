<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "info_demographic".
 *
 * @property integer $id
 * @property integer $kemudahan_id
 * @property string $status_kemudahan
 * @property string $nama
 * @property string $catatan
 * @property integer $demographic_id
 */
class InfoDemographic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_demographic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kemudahan_id', 'demographic_id','bilangan'], 'integer'],
            [['status_kemudahan'], 'string', 'max' => 45],
            [['nama', 'catatan'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bilangan' => 'Bilangan',
            'kemudahan_id' => 'Kemudahan ID',
            'status_kemudahan' => 'Status Kemudahan',
            'nama' => 'Nama',
            'catatan' => 'Catatan',
            'demographic_id' => 'Demographic ID',
        ];
    }
}
