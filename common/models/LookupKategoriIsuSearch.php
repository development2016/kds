<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupKategoriIsu;

/**
 * LookupKategoriIsuSearch represents the model behind the search form about `common\models\LookupKategoriIsu`.
 */
class LookupKategoriIsuSearch extends LookupKategoriIsu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori_id'], 'integer'],
            [['kategori_isu'], 'safe'],
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
        $query = LookupKategoriIsu::find();

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
            'kategori_id' => $this->kategori_id,
        ]);

        $query->andFilterWhere(['like', 'kategori_isu', $this->kategori_isu]);

        return $dataProvider;
    }
}
