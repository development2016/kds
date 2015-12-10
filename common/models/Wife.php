<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wife".
 *
 * @property integer $wife_id
 * @property string $wife_name
 * @property string $wife_ic
 * @property string $wife_work
 * @property string $wife_oku
 * @property integer $people_id
 *
 * @property People $people
 */
class Wife extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wife';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['people_id'], 'integer'],
            //[['wife_work','wife_oku'],'default','value'=>'Tidak'],
            [['wife_name'], 'string', 'max' => 225],
            [['wife_ic', 'wife_work', 'wife_oku'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wife_id' => 'Wife ID',
            'wife_name' => 'Nama',
            'wife_ic' => 'No Kad Pengenalan',
            'wife_work' => 'Bekerja',
            'wife_oku' => 'Orang Kelainan Upaya',
            'people_id' => 'People ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasOne(People::className(), ['people_id' => 'people_id']);
    }
}
