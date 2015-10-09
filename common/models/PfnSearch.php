<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pfn;

/**
 * PfnSearch represents the model behind the search form about `common\models\Pfn`.
 */
class PfnSearch extends Pfn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pfn_id', 'cat_id', 'kampung_id', 'cluster_id', 'sub_base_id', 'district_id', 'state_id', 'enter_by','mukim_id'], 'integer'],
            [['pfn_code', 'date', 'pfn_name', 'lokasi', 'alamat', 'poskod', 'nama_pengurus', 'no_kp', 'no_kp_old', 'jantina', 'mobile', 'no_tel', 'fax', 'email', 'elektrik', 'keadaan_elektrik', 'air', 'keadaan_air', 'meja', 'jumlah_meja', 'keadaan_meja', 'kerusi', 'jumlah_kerusi', 'keadaan_kerusi', 'papan_putih', 'keadaan_papan_putih', 'bilik_mesyuarat', 'keadaan_bilik_mesyuarat', 'keaktifan_bilik_mesyuarat', 'keluasan_bilik_mesyuarat', 'kawasan_lapang', 'keluasan_kawasan_lapang', 'tandas', 'keadaan_tandas', 'bilik_mandi', 'keadaan_bilik_mandi', 'ruang_solat', 'keadaan_ruang_solat', 'rating_kemudahan_asas', 'komputer', 'bilangan_komputer', 'keadaan_komputer', 'projektor', 'bilangan_projektor', 'keadaan_projektor', 'mesin_pencetak', 'bilangan_mesin_pencetak', 'keadaan_mesin_pencetak', 'mesin_faks', 'bilangan_mesin_faks', 'keadaan_mesin_faks', 'pa_system', 'keadaan_pa_system', 'unifi', 'streamyx', 'lain_internet', 'maxis', 'digi', 'celcom', 'p1wimax', 'yes4g', 'lain_broadband', 'rating_kemudahan_ict', 'kerusi_bilik_latihan', 'bil_kerusi_bilik_latihan', 'keadaan_kerusi_bilik_latihan', 'meja_bilik_latihan', 'bil_meja_bilik_latihan', 'keadaan_meja_bilik_latihan', 'keluasan_bilik_latihan', 'penghawa_dingin_bilik_latihan', 'bilangan_penghawa_dingin_bilik_latihan', 'keadaan_penghawa_dingin_bilik_latihan', 'papan_putih_bilik_latihan', 'bilangan_papan_putih_bilik_latihan', 'keadaan_papan_putih_bilik_latihan', 'rating_bilik_latihan', 'rating_equip', 'tempat_letak_kereta_oku', 'tandas_khas_oku', 'laluan_khas_oku', 'tangga_handrail_oku', 'papan_tanda_khas_oku', 'rating_mesra_oku', 'jarak_pfn_komuniti', 'tempat_letak_kenderaan_capaian', 'jarak_tempat_letak_kenderaan_capaian', 'kedai_runcit', 'jarak_kedai_runcit', 'kedai_makan', 'jarak_kedai_makan', 'stesen_minyak', 'jarak_stesen_minyak', 'hentian_bas', 'jarak_hentian_bas', 'isyarat_telekomunikasi', 'rating_capaian', 'ulasan_keadaan_fizikal', 'kerjasama_pengurus', 'rating_keseluruhan_pfn', 'tarikh_daftar', 'didaftarkan_oleh', 'tarikh_audit', 'diaudit_oleh', 'nota', 'nama_pengurus2', 'no_kp2', 'no_kp_old2', 'jantina2', 'mobile2', 'no_tel2', 'fax2', 'email2', 'koordinate', 'date_enter','status_pfn'], 'safe'],
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

        $menu_id = 5; // for menu issue
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

            $query = Pfn::find()->where(['state_id'=>$state_id]);
        }
        else if ($role_id == 3) {
            $query = Pfn::find()->where(['state_id'=>$state_id,'district_id'=>$district_id]);
        }
        else if ($role_id == 1) {
            $query = Pfn::find()->where(['state_id'=>$state_id,'district_id'=>$district_id,'kampung_id'=>$kampung_id]);
        } else {
            $query = Pfn::find();
        }


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['pfn_id' => 'DESC']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pfn_id' => $this->pfn_id,
            'cat_id' => $this->cat_id,
            'kampung_id' => $this->kampung_id,
            'cluster_id' => $this->cluster_id,
            'sub_base_id' => $this->sub_base_id,
            'district_id' => $this->district_id,
            'mukim_id' => $this->mukim_id,
            'state_id' => $this->state_id,
            'enter_by' => $this->enter_by,
        ]);

        $query->andFilterWhere(['like', 'pfn_code', $this->pfn_code])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'pfn_name', $this->pfn_name])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'poskod', $this->poskod])
            ->andFilterWhere(['like', 'nama_pengurus', $this->nama_pengurus])
            ->andFilterWhere(['like', 'no_kp', $this->no_kp])
            ->andFilterWhere(['like', 'no_kp_old', $this->no_kp_old])
            ->andFilterWhere(['like', 'jantina', $this->jantina])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'no_tel', $this->no_tel])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'elektrik', $this->elektrik])
            ->andFilterWhere(['like', 'keadaan_elektrik', $this->keadaan_elektrik])
            ->andFilterWhere(['like', 'air', $this->air])
            ->andFilterWhere(['like', 'keadaan_air', $this->keadaan_air])
            ->andFilterWhere(['like', 'meja', $this->meja])
            ->andFilterWhere(['like', 'jumlah_meja', $this->jumlah_meja])
            ->andFilterWhere(['like', 'keadaan_meja', $this->keadaan_meja])
            ->andFilterWhere(['like', 'kerusi', $this->kerusi])
            ->andFilterWhere(['like', 'jumlah_kerusi', $this->jumlah_kerusi])
            ->andFilterWhere(['like', 'keadaan_kerusi', $this->keadaan_kerusi])
            ->andFilterWhere(['like', 'papan_putih', $this->papan_putih])
            ->andFilterWhere(['like', 'keadaan_papan_putih', $this->keadaan_papan_putih])
            ->andFilterWhere(['like', 'bilik_mesyuarat', $this->bilik_mesyuarat])
            ->andFilterWhere(['like', 'keadaan_bilik_mesyuarat', $this->keadaan_bilik_mesyuarat])
            ->andFilterWhere(['like', 'keaktifan_bilik_mesyuarat', $this->keaktifan_bilik_mesyuarat])
            ->andFilterWhere(['like', 'keluasan_bilik_mesyuarat', $this->keluasan_bilik_mesyuarat])
            ->andFilterWhere(['like', 'kawasan_lapang', $this->kawasan_lapang])
            ->andFilterWhere(['like', 'keluasan_kawasan_lapang', $this->keluasan_kawasan_lapang])
            ->andFilterWhere(['like', 'tandas', $this->tandas])
            ->andFilterWhere(['like', 'keadaan_tandas', $this->keadaan_tandas])
            ->andFilterWhere(['like', 'bilik_mandi', $this->bilik_mandi])
            ->andFilterWhere(['like', 'keadaan_bilik_mandi', $this->keadaan_bilik_mandi])
            ->andFilterWhere(['like', 'ruang_solat', $this->ruang_solat])
            ->andFilterWhere(['like', 'keadaan_ruang_solat', $this->keadaan_ruang_solat])
            ->andFilterWhere(['like', 'rating_kemudahan_asas', $this->rating_kemudahan_asas])
            ->andFilterWhere(['like', 'komputer', $this->komputer])
            ->andFilterWhere(['like', 'bilangan_komputer', $this->bilangan_komputer])
            ->andFilterWhere(['like', 'keadaan_komputer', $this->keadaan_komputer])
            ->andFilterWhere(['like', 'projektor', $this->projektor])
            ->andFilterWhere(['like', 'bilangan_projektor', $this->bilangan_projektor])
            ->andFilterWhere(['like', 'keadaan_projektor', $this->keadaan_projektor])
            ->andFilterWhere(['like', 'mesin_pencetak', $this->mesin_pencetak])
            ->andFilterWhere(['like', 'bilangan_mesin_pencetak', $this->bilangan_mesin_pencetak])
            ->andFilterWhere(['like', 'keadaan_mesin_pencetak', $this->keadaan_mesin_pencetak])
            ->andFilterWhere(['like', 'mesin_faks', $this->mesin_faks])
            ->andFilterWhere(['like', 'bilangan_mesin_faks', $this->bilangan_mesin_faks])
            ->andFilterWhere(['like', 'keadaan_mesin_faks', $this->keadaan_mesin_faks])
            ->andFilterWhere(['like', 'pa_system', $this->pa_system])
            ->andFilterWhere(['like', 'keadaan_pa_system', $this->keadaan_pa_system])
            ->andFilterWhere(['like', 'unifi', $this->unifi])
            ->andFilterWhere(['like', 'streamyx', $this->streamyx])
            ->andFilterWhere(['like', 'lain_internet', $this->lain_internet])
            ->andFilterWhere(['like', 'maxis', $this->maxis])
            ->andFilterWhere(['like', 'digi', $this->digi])
            ->andFilterWhere(['like', 'celcom', $this->celcom])
            ->andFilterWhere(['like', 'p1wimax', $this->p1wimax])
            ->andFilterWhere(['like', 'yes4g', $this->yes4g])
            ->andFilterWhere(['like', 'lain_broadband', $this->lain_broadband])
            ->andFilterWhere(['like', 'rating_kemudahan_ict', $this->rating_kemudahan_ict])
            ->andFilterWhere(['like', 'kerusi_bilik_latihan', $this->kerusi_bilik_latihan])
            ->andFilterWhere(['like', 'bil_kerusi_bilik_latihan', $this->bil_kerusi_bilik_latihan])
            ->andFilterWhere(['like', 'keadaan_kerusi_bilik_latihan', $this->keadaan_kerusi_bilik_latihan])
            ->andFilterWhere(['like', 'meja_bilik_latihan', $this->meja_bilik_latihan])
            ->andFilterWhere(['like', 'bil_meja_bilik_latihan', $this->bil_meja_bilik_latihan])
            ->andFilterWhere(['like', 'keadaan_meja_bilik_latihan', $this->keadaan_meja_bilik_latihan])
            ->andFilterWhere(['like', 'keluasan_bilik_latihan', $this->keluasan_bilik_latihan])
            ->andFilterWhere(['like', 'penghawa_dingin_bilik_latihan', $this->penghawa_dingin_bilik_latihan])
            ->andFilterWhere(['like', 'bilangan_penghawa_dingin_bilik_latihan', $this->bilangan_penghawa_dingin_bilik_latihan])
            ->andFilterWhere(['like', 'keadaan_penghawa_dingin_bilik_latihan', $this->keadaan_penghawa_dingin_bilik_latihan])
            ->andFilterWhere(['like', 'papan_putih_bilik_latihan', $this->papan_putih_bilik_latihan])
            ->andFilterWhere(['like', 'bilangan_papan_putih_bilik_latihan', $this->bilangan_papan_putih_bilik_latihan])
            ->andFilterWhere(['like', 'keadaan_papan_putih_bilik_latihan', $this->keadaan_papan_putih_bilik_latihan])
            ->andFilterWhere(['like', 'rating_bilik_latihan', $this->rating_bilik_latihan])
            ->andFilterWhere(['like', 'rating_equip', $this->rating_equip])
            ->andFilterWhere(['like', 'tempat_letak_kereta_oku', $this->tempat_letak_kereta_oku])
            ->andFilterWhere(['like', 'tandas_khas_oku', $this->tandas_khas_oku])
            ->andFilterWhere(['like', 'laluan_khas_oku', $this->laluan_khas_oku])
            ->andFilterWhere(['like', 'tangga_handrail_oku', $this->tangga_handrail_oku])
            ->andFilterWhere(['like', 'papan_tanda_khas_oku', $this->papan_tanda_khas_oku])
            ->andFilterWhere(['like', 'rating_mesra_oku', $this->rating_mesra_oku])
            ->andFilterWhere(['like', 'jarak_pfn_komuniti', $this->jarak_pfn_komuniti])
            ->andFilterWhere(['like', 'tempat_letak_kenderaan_capaian', $this->tempat_letak_kenderaan_capaian])
            ->andFilterWhere(['like', 'jarak_tempat_letak_kenderaan_capaian', $this->jarak_tempat_letak_kenderaan_capaian])
            ->andFilterWhere(['like', 'kedai_runcit', $this->kedai_runcit])
            ->andFilterWhere(['like', 'jarak_kedai_runcit', $this->jarak_kedai_runcit])
            ->andFilterWhere(['like', 'kedai_makan', $this->kedai_makan])
            ->andFilterWhere(['like', 'jarak_kedai_makan', $this->jarak_kedai_makan])
            ->andFilterWhere(['like', 'stesen_minyak', $this->stesen_minyak])
            ->andFilterWhere(['like', 'jarak_stesen_minyak', $this->jarak_stesen_minyak])
            ->andFilterWhere(['like', 'hentian_bas', $this->hentian_bas])
            ->andFilterWhere(['like', 'jarak_hentian_bas', $this->jarak_hentian_bas])
            ->andFilterWhere(['like', 'isyarat_telekomunikasi', $this->isyarat_telekomunikasi])
            ->andFilterWhere(['like', 'rating_capaian', $this->rating_capaian])
            ->andFilterWhere(['like', 'ulasan_keadaan_fizikal', $this->ulasan_keadaan_fizikal])
            ->andFilterWhere(['like', 'kerjasama_pengurus', $this->kerjasama_pengurus])
            ->andFilterWhere(['like', 'rating_keseluruhan_pfn', $this->rating_keseluruhan_pfn])
            ->andFilterWhere(['like', 'tarikh_daftar', $this->tarikh_daftar])
            ->andFilterWhere(['like', 'didaftarkan_oleh', $this->didaftarkan_oleh])
            ->andFilterWhere(['like', 'tarikh_audit', $this->tarikh_audit])
            ->andFilterWhere(['like', 'diaudit_oleh', $this->diaudit_oleh])
            ->andFilterWhere(['like', 'nota', $this->nota])
            ->andFilterWhere(['like', 'nama_pengurus2', $this->nama_pengurus2])
            ->andFilterWhere(['like', 'no_kp2', $this->no_kp2])
            ->andFilterWhere(['like', 'no_kp_old2', $this->no_kp_old2])
            ->andFilterWhere(['like', 'jantina2', $this->jantina2])
            ->andFilterWhere(['like', 'mobile2', $this->mobile2])
            ->andFilterWhere(['like', 'no_tel2', $this->no_tel2])
            ->andFilterWhere(['like', 'fax2', $this->fax2])
            ->andFilterWhere(['like', 'email2', $this->email2])
            ->andFilterWhere(['like', 'koordinate', $this->koordinate])
            ->andFilterWhere(['like', 'date_enter', $this->date_enter])
            ->andFilterWhere(['like', 'status_pfn', $this->status_pfn]);

        return $dataProvider;
    }
}
