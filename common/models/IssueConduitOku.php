<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "issue_conduit_oku".
 *
 * @property integer $id
 * @property string $kategori_oku
 * @property integer $issue_id
 */
class IssueConduitOku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue_conduit_oku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['issue_id'], 'integer'],
            [['kategori_oku'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_oku' => 'Kategori Oku',
            'issue_id' => 'Issue ID',
        ];
    }

    public function getKategorioku()
    {
         return $this->hasOne(LookupKategoriOku::className(), ['id' => 'kategori_oku']);
    }
}
