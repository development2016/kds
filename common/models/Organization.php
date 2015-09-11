<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property string $org_id
 * @property string $org_name
 * @property string $reg_no
 * @property string $address
 * @property string $postcode
 * @property string $contact_person
 * @property integer $state_id
 * @property integer $country_id
 * @property string $mobile_no
 * @property string $office_no
 * @property string $fax_no
 * @property string $email
 * @property integer $sector_id
 * @property integer $field_id
 * @property resource $about_org
 * @property string $picture
 * @property string $date_enter
 * @property integer $enter_by
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'sector_id', 'field_id', 'enter_by'], 'integer'],
            [['about_org'], 'string'],
            [['org_name', 'address', 'email', 'picture'], 'string', 'max' => 225],
            [['reg_no', 'postcode', 'contact_person', 'mobile_no', 'office_no', 'fax_no', 'date_enter'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'org_id' => 'Org ID',
            'org_name' => 'Org Name',
            'reg_no' => 'Reg No',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'contact_person' => 'Contact Person',
            'state_id' => 'State ID',
            'mobile_no' => 'Mobile No',
            'office_no' => 'Office No',
            'fax_no' => 'Fax No',
            'email' => 'Email',
            'sector_id' => 'Sector ID',
            'field_id' => 'Field ID',
            'about_org' => 'About Org',
            'picture' => 'Picture',
            'date_enter' => 'Date Enter',
            'enter_by' => 'Enter By',
        ];
    }

    public function getKampung()
    {
        return $this->hasOne(LookupKampung::className(), ['kampung_id' => 'kampung_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCluster()
    {
        return $this->hasOne(LookupCluster::className(), ['cluster_id' => 'cluster_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(LookupDistrict::className(), ['district_id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubBase()
    {
        return $this->hasOne(LookupSubBase::className(), ['sub_base_id' => 'sub_base_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(LookupCountry::className(), ['country_id' => 'country_id']);
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
