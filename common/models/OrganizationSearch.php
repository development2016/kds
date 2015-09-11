<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Organization;

/**
 * OrganizationSearch represents the model behind the search form about `common\models\Organization`.
 */
class OrganizationSearch extends Organization
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_id', 'state_id', 'sector_id', 'field_id', 'enter_by'], 'integer'],
            [['org_name', 'reg_no', 'address', 'postcode', 'contact_person', 'mobile_no', 'office_no', 'fax_no', 'email', 'about_org', 'picture', 'date_enter'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Organization::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'org_id' => $this->org_id,
            'state_id' => $this->state_id,
            'sector_id' => $this->sector_id,
            'field_id' => $this->field_id,
            'enter_by' => $this->enter_by,
        ]);

        $query->andFilterWhere(['like', 'org_name', $this->org_name])
            ->andFilterWhere(['like', 'reg_no', $this->reg_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'postcode', $this->postcode])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'office_no', $this->office_no])
            ->andFilterWhere(['like', 'fax_no', $this->fax_no])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'about_org', $this->about_org])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'date_enter', $this->date_enter]);

        return $dataProvider;
    }
}
