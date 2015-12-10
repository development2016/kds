<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupSector;

/**
 * LookupSectorSearch represents the model behind the search form about `common\models\LookupSector`.
 */
class LookupSectorSearch extends LookupSector
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id'], 'integer'],
            [['sector_name'], 'safe'],
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
        $query = LookupSector::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'sector_id' => $this->sector_id,
        ]);

        $query->andFilterWhere(['like', 'sector_name', $this->sector_name]);

        return $dataProvider;
    }
}
