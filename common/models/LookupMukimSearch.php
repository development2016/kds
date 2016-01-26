<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupMukim;

/**
 * LookupMukimSearch represents the model behind the search form about `common\models\LookupMukim`.
 */
class LookupMukimSearch extends LookupMukim
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mukim_id', 'district_id', 'state_id','bahagian_id'], 'integer'],
            [['mukim'], 'safe'],
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
        $query = LookupMukim::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['mukim_id' => 'DESC']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'mukim_id' => $this->mukim_id,
            'district_id' => $this->district_id,
            'bahagian_id' => $this->bahagian_id,
            'state_id' => $this->state_id,
        ]);

        $query->andFilterWhere(['like', 'mukim', $this->mukim]);

        return $dataProvider;
    }
}
