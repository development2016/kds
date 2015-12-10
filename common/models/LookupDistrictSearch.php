<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupDistrict;

/**
 * LookupDistrictSearch represents the model behind the search form about `common\models\LookupDistrict`.
 */
class LookupDistrictSearch extends LookupDistrict
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district_id'], 'integer'],
            [['district', 'district_code', 'state_id'], 'safe'],
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
        $query = LookupDistrict::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['district_id' => 'DESC']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'district_id' => $this->district_id,
        ]);

        $query->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'district_code', $this->district_code])
            ->andFilterWhere(['like', 'state_id', $this->state_id]);

        return $dataProvider;
    }
}
