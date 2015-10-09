<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $item
 * @property integer $pahang
 * @property integer $kedah
 * @property integer $perlis
 * @property integer $terengganu
 * @property integer $perak
 * @property integer $johor
 * @property integer $selangor
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pahang', 'kedah', 'perlis', 'terengganu', 'perak', 'johor', 'selangor'], 'string', 'max'=> 50],
            [['item'], 'string', 'max' => 225]
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
