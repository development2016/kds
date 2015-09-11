<?php

namespace common\models;

use Yii;
use backend\models\LookupMenu;
/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property string $catatan
 * @property string $status
 * @property integer $enter_by
 * @property string $enter_date
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'enter_by','request_id'], 'integer'],
            [['catatan'], 'string'],
            [['status', 'enter_date'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'catatan' => 'Permintaan',
            'status' => 'Status',
            'enter_by' => 'Enter By',
            'enter_date' => 'Enter Date',
            'request_id' => 'Request',
        ];
    }


    public function getMenu()
    {
        return $this->hasOne(LookupMenu::className(), ['menu_id' => 'menu_id']);
    }

    public function getEnter(){
         return $this->hasOne(User::className(), ['id' => 'enter_by']);
    }
}
