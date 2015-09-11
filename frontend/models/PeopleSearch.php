<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\People;

/**
 * PeopleSearch represents the model behind the search form about `common\models\People`.
 */
class PeopleSearch extends People
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['people_id', 'race', 'religion', 'marital_status', 'no_of_children', 'income', 'spending', 'enter_by', 'verified_by'], 'integer'],
            [['name', 'ic_no', 'address', 'postcode', 'dob', 'gender', 'name_nick', 'ic_no_old', 'current_address','mukim_id', 'state_id', 'district_id', 'sub_base_id', 'cluster_id', 'kampung_id', 'birth_place', 'citizen', 'profession_status', 'profession', 'job_position', 'job_else', 'mobile_no', 'home_no', 'email', 'penghulu', 'local_champion', 'volunteer', 'micro_worker', 'image', 'enter_date', 'data_status', 'verified_date', 'flag', 'mukim', 'tarikh_soal_selidik', 'nota', 'ruang_cadangan'], 'safe'],
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
        //$query = People::find();
        $enter_by =  Yii::$app->user->identity->id;
        $query = People::find()->where(['enter_by'=>$enter_by]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['people_id' => 'DESC']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'people_id' => $this->people_id,
            'race' => $this->race,
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'no_of_children' => $this->no_of_children,
            'income' => $this->income,
            'spending' => $this->spending,
            'enter_date' => $this->enter_date,
            'enter_by' => $this->enter_by,
            'verified_date' => $this->verified_date,
            'verified_by' => $this->verified_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ic_no', $this->ic_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'postcode', $this->postcode])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'name_nick', $this->name_nick])
            ->andFilterWhere(['like', 'ic_no_old', $this->ic_no_old])
            ->andFilterWhere(['like', 'current_address', $this->current_address])
            ->andFilterWhere(['like', 'state_id', $this->state_id])
            ->andFilterWhere(['like', 'district_id', $this->district_id])
            ->andFilterWhere(['like', 'sub_base_id', $this->sub_base_id])
            ->andFilterWhere(['like', 'cluster_id', $this->cluster_id])
            ->andFilterWhere(['like', 'kampung_id', $this->kampung_id])
            ->andFilterWhere(['like', 'mukim_id', $this->mukim_id])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'citizen', $this->citizen])
            ->andFilterWhere(['like', 'profession_status', $this->profession_status])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'job_position', $this->job_position])
            ->andFilterWhere(['like', 'job_else', $this->job_else])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'home_no', $this->home_no])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'penghulu', $this->penghulu])
            ->andFilterWhere(['like', 'local_champion', $this->local_champion])
            ->andFilterWhere(['like', 'volunteer', $this->volunteer])
            ->andFilterWhere(['like', 'micro_worker', $this->micro_worker])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'data_status', $this->data_status])
            ->andFilterWhere(['like', 'flag', $this->flag])
            ->andFilterWhere(['like', 'mukim', $this->mukim])
            ->andFilterWhere(['like', 'tarikh_soal_selidik', $this->tarikh_soal_selidik])
            ->andFilterWhere(['like', 'nota', $this->nota])
            ->andFilterWhere(['like', 'ruang_cadangan', $this->ruang_cadangan]);

        return $dataProvider;
    }
}
