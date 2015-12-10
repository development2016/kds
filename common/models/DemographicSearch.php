<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Demographic;

/**
 * DemographicSearch represents the model behind the search form about `common\models\Demographic`.
 */
class DemographicSearch extends Demographic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['demographic_id', 'state_id', 'district_id', 'mukim_id', 'sub_base_id', 'cluster_id', 'kampung_id', 'bilangan_rumah', 'jenis_kampung_id', 'corak_penempatan_id', 'jenis_perumahan_id'], 'integer'],
            [['nama_ketua_kampung', 'no_tel', 'aktiviti_penduduk_kampung', 'koordinate'], 'safe'],
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
        $menu_id = 6; // for menu issue
        $role_id = Yii::$app->user->identity->role;
        $user_id =  Yii::$app->user->identity->id;

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM acl RIGHT JOIN acl_menu ON acl.id = acl_menu.acl_id WHERE acl.user_id = '".$user_id."' AND acl.role_id = '".$role_id."' AND acl_menu.menu_id = '".$menu_id."'");
        $data = $sql->queryAll();

        foreach ($data as $key => $value) {
            $state_id = $value['state_id'];
            $district_id = $value['district_id'];
            $kampung_id = $value['kampung_id'];

        }

        if ($role_id == 4) {

            $query = Demographic::find()->where(['state_id'=>$state_id]);
        }
        else if ($role_id == 3) {
            $query = Demographic::find()->where(['state_id'=>$state_id,'district_id'=>$district_id]);
        }
        else if ($role_id == 1) {
            $query = Demographic::find()->where(['state_id'=>$state_id,'district_id'=>$district_id,'kampung_id'=>$kampung_id]);
        } else {
            $query = Demographic::find();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['demographic_id' => 'DESC']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'demographic_id' => $this->demographic_id,
            'state_id' => $this->state_id,
            'district_id' => $this->district_id,
            'mukim_id' => $this->mukim_id,
            'sub_base_id' => $this->sub_base_id,
            'cluster_id' => $this->cluster_id,
            'kampung_id' => $this->kampung_id,
            'bilangan_rumah' => $this->bilangan_rumah,
            'jenis_kampung_id' => $this->jenis_kampung_id,
            'corak_penempatan_id' => $this->corak_penempatan_id,
            'jenis_perumahan_id' => $this->jenis_perumahan_id,
        ]);

        $query->andFilterWhere(['like', 'nama_ketua_kampung', $this->nama_ketua_kampung])
            ->andFilterWhere(['like', 'no_tel', $this->no_tel])
            ->andFilterWhere(['like', 'aktiviti_penduduk_kampung', $this->aktiviti_penduduk_kampung])
            ->andFilterWhere(['like', 'koordinate', $this->koordinate]);

        return $dataProvider;
    }
}
