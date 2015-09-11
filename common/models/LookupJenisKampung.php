<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_jenis_kampung".
 *
 * @property integer $id
 * @property string $jenis_kampung
 */
class LookupJenisKampung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_jenis_kampung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_kampung'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_kampung' => 'Jenis Kampung',
        ];
    }
}
