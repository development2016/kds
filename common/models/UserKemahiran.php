<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_kemahiran".
 *
 * @property integer $id
 * @property integer $word
 * @property integer $excel
 * @property integer $power_point
 * @property integer $menaip
 * @property integer $internet
 * @property integer $youtube
 * @property integer $perbankan
 * @property integer $belian
 * @property integer $jualan
 * @property integer $facebook
 * @property integer $twitter
 * @property integer $instagram
 * @property string $lain_lain_nyatakan
 * @property integer $lain_lain
 * @property string $perkakasan_ict
 * @property string $lain_lain_1
 * @property integer $user_id
 */
class UserKemahiran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_kemahiran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['word', 'excel', 'power_point', 'menaip', 'internet', 'youtube', 'perbankan', 'belian', 'jualan', 'facebook', 'twitter', 'instagram', 'lain_lain', 'user_id'], 'integer'],
            [['lain_lain_nyatakan', 'perkakasan_ict', 'lain_lain_1'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'word' => 'Microsoft Office Word',
            'excel' => 'Microsoft Office Excel',
            'power_point' => 'Microsoft Office Power Point',
            'menaip' => 'Trengkas / Menaip',
            'internet' => 'Melayari Internet',
            'youtube' => 'Youtube',
            'perbankan' => 'Perbankan Atas Talian',
            'belian' => 'Belian Atas Talian',
            'jualan' => 'Jualan Atas Talian',
            'facebook' => 'a) facebook',
            'twitter' => 'b) twitter',
            'instagram' => 'c) Instagram',
            'lain_lain_nyatakan' => 'Lain Lain (Nyatakan)',
            'lain_lain' => 'Lain Lain (Nyatakan)',
            'perkakasan_ict' => 'Perkakasan ICT yang di miliki : ',
            'lain_lain_1' => 'Lain Lain (Nyatakan)',
            'user_id' => 'User ID',
        ];
    }
}
