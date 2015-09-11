<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PeopleOku;

/**
 * PeopleOkuSearch represents the model behind the search form about `common\models\PeopleOku`.
 */
class PeopleOkuSearch extends PeopleOku
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kategori_oku', 'people_id'], 'integer'],
            [['no_pendaftaran', 'nota'], 'safe'],
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
        $query = PeopleOku::find();

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
            'id' => $this->id,
            'kategori_oku' => $this->kategori_oku,
            'people_id' => $this->people_id,
        ]);

        $query->andFilterWhere(['like', 'no_pendaftaran', $this->no_pendaftaran])
            ->andFilterWhere(['like', 'nota', $this->nota]);

        return $dataProvider;
    }
}
