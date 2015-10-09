<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "status_harian".
 *
 * @property integer $id
 * @property string $item
 * @property string $pahang
 * @property string $kedah
 * @property string $perlis
 * @property string $terengganu
 * @property string $perak
 * @property string $johor
 * @property string $selangor
 */
class StatusHarian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_harian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item'], 'string', 'max' => 225],
            [['pahang', 'kedah', 'perlis', 'terengganu', 'perak', 'johor', 'selangor'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item' => 'Item',
            'pahang' => 'Pahang',
            'kedah' => 'Kedah',
            'perlis' => 'Perlis',
            'terengganu' => 'Terengganu',
            'perak' => 'Perak',
            'johor' => 'Johor',
            'selangor' => 'Selangor',
        ];
    }
}
