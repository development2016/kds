<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_jenis_perumahan".
 *
 * @property integer $id
 * @property string $jenis_perumahan
 */
class LookupJenisPerumahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_jenis_perumahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_perumahan'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_perumahan' => 'Jenis Perumahan',
        ];
    }
}
