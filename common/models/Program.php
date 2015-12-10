<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property integer $program_id
 * @property string $program_name
 * @property integer $org_id
 * @property string $organize_by
 * @property integer $sector_id
 * @property integer $field_id
 * @property string $program_milestone
 * @property string $date_register
 * @property string $program_status
 * @property resource $note
 * @property string $date_enter
 * @property integer $enter_by
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_id', 'sector_id', 'field_id', 'enter_by'], 'integer'],
            [['note'], 'string'],
            [['program_name', 'organize_by', 'program_milestone'], 'string', 'max' => 225],
            [['date_register', 'date_enter'], 'string', 'max' => 45],
            [['program_status'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'program_id' => 'Program ID',
            'program_name' => 'Program Name',
            'org_id' => 'Org ID',
            'organize_by' => 'Organize By',
            'sector_id' => 'Sector ID',
            'field_id' => 'Field ID',
            'program_milestone' => 'Program Milestone',
            'date_register' => 'Date Register',
            'program_status' => 'Program Status',
            'note' => 'Note',
            'date_enter' => 'Date Enter',
            'enter_by' => 'Enter By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(LookupSector::className(), ['sector_id' => 'sector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(LookupField::className(), ['field_id' => 'field_id']);
    }
}
