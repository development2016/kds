<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupKampung;

/**
 * LookupKampungSearch represents the model behind the search form about `common\models\LookupKampung`.
 */
class LookupKampungSearch extends LookupKampung
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kampung_id', 'cluster_id', 'sub_base_id', 'district_id', 'state_id', 'kampcom_id','mukim_id','bahagian_id'], 'integer'],
            [['kampung'], 'safe'],
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
        $query = LookupKampung::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'sort'=> ['defaultOrder' => ['kampung_id' => 'DESC']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'state_id' => $this->state_id,
            'district_id' => $this->district_id,
            'mukim_id' => $this->mukim_id,
            'sub_base_id' => $this->sub_base_id,
            'cluster_id' => $this->cluster_id,
            'kampung_id' => $this->kampung_id,
            
            //'kampcom_id' => $this->kampcom_id,
            'bahagian_id'=>$this->bahagian_id,
        ]);

        /*$query->andFilterWhere(['like', 'state_id', $this->state_id])
            ->andFilterWhere(['like', 'kampung_id', $this->kampung])
            ->andFilterWhere(['like', 'cluster_id', $this->cluster_id])
            ->andFilterWhere(['like', 'sub_base_id', $this->sub_base_id])
            ->andFilterWhere(['like', 'district_id', $this->district_id])
            
            ->andFilterWhere(['like', 'mukim_id', $this->mukim_id]);*/

        return $dataProvider;
    }
}
