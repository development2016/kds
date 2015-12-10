<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupPfnCategory;

/**
 * LookupPfnCategorySearch represents the model behind the search form about `common\models\LookupPfnCategory`.
 */
class LookupPfnCategorySearch extends LookupPfnCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id'], 'integer'],
            [['cat_name'], 'safe'],
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
        $query = LookupPfnCategory::find();

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
            'cat_id' => $this->cat_id,
        ]);

        $query->andFilterWhere(['like', 'cat_name', $this->cat_name]);

        return $dataProvider;
    }
}
