<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_corak_penempatan".
 *
 * @property integer $id
 * @property string $corak_penempatan
 */
class LookupCorakPenempatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_corak_penempatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['corak_penempatan'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'corak_penempatan' => 'Corak Penempatan',
        ];
    }
}
