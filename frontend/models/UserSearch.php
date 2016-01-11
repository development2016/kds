<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;

/**
 * UserSearch represents the model behind the search form about `frontend\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role', 'negara_area_id', 'state_area_id', 'district_area_id', 'sub_base_area_id', 'cluster_area_id', 'kampung_area_id', 'status'], 'integer'],
            [['username', 'nama', 'email', 'address', 'ic_no', 'mobile_no', 'home_no', 'no_tel_pej', 'pendapatan', 'pekerjaan', 'jawatan', 'mukim', 'kampung_id', 'state_id', 'district_id', 'kewarganegaraan', 'status_perkahwinan', 'bangsa', 'agama', 'jantina', 'bank', 'no_akaun', 'tarikh_lahir', 'tempat_lahir', 'ic_no_old', 'poskod', 'status_area', 'tarikh_daftar_kerja', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'safe'],
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
        $query = User::find();

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
            'id' => $this->id,
            'role' => $this->role,
            'negara_area_id' => $this->negara_area_id,
            'state_area_id' => $this->state_area_id,
            'district_area_id' => $this->district_area_id,
            'sub_base_area_id' => $this->sub_base_area_id,
            'cluster_area_id' => $this->cluster_area_id,
            'kampung_area_id' => $this->kampung_area_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'ic_no', $this->ic_no])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'home_no', $this->home_no])
            ->andFilterWhere(['like', 'no_tel_pej', $this->no_tel_pej])
            ->andFilterWhere(['like', 'pendapatan', $this->pendapatan])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'jawatan', $this->jawatan])
            ->andFilterWhere(['like', 'mukim', $this->mukim])
            ->andFilterWhere(['like', 'kampung_id', $this->kampung_id])
            ->andFilterWhere(['like', 'state_id', $this->state_id])
            ->andFilterWhere(['like', 'district_id', $this->district_id])
            ->andFilterWhere(['like', 'kewarganegaraan', $this->kewarganegaraan])
            ->andFilterWhere(['like', 'status_perkahwinan', $this->status_perkahwinan])
            ->andFilterWhere(['like', 'bangsa', $this->bangsa])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'jantina', $this->jantina])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'no_akaun', $this->no_akaun])
            ->andFilterWhere(['like', 'tarikh_lahir', $this->tarikh_lahir])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'ic_no_old', $this->ic_no_old])
            ->andFilterWhere(['like', 'poskod', $this->poskod])
            ->andFilterWhere(['like', 'status_area', $this->status_area])
            ->andFilterWhere(['like', 'tarikh_daftar_kerja', $this->tarikh_daftar_kerja])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
