<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pfn".
 *
 * @property integer $pfn_id
 * @property string $pfn_code
 * @property string $date
 * @property string $pfn_name
 * @property integer $cat_id
 * @property string $lokasi
 * @property string $alamat
 * @property string $poskod
 * @property integer $kampung_id
 * @property integer $cluster_id
 * @property integer $sub_base_id
 * @property integer $district_id
 * @property integer $state_id
 * @property integer $country_id
 * @property string $nama_pengurus
 * @property string $no_kp
 * @property string $no_kp_old
 * @property string $jantina
 * @property string $umur
 * @property string $mobile
 * @property string $no_tel
 * @property string $fax
 * @property string $email
 * @property string $elektrik
 * @property string $keadaan_elektrik
 * @property string $air
 * @property string $keadaan_air
 * @property string $meja
 * @property string $jumlah_meja
 * @property string $keadaan_meja
 * @property string $kerusi
 * @property string $jumlah_kerusi
 * @property string $keadaan_kerusi
 * @property string $papan_putih
 * @property string $keadaan_papan_putih
 * @property string $bilik_mesyuarat
 * @property string $keadaan_bilik_mesyuarat
 * @property string $keaktifan_bilik_mesyuarat
 * @property string $keluasan_bilik_mesyuarat
 * @property string $kawasan_lapang
 * @property string $keluasan_kawasan_lapang
 * @property string $tandas
 * @property string $keadaan_tandas
 * @property string $bilik_mandi
 * @property string $keadaan_bilik_mandi
 * @property string $ruang_solat
 * @property string $keadaan_ruang_solat
 * @property string $rating_kemudahan_asas
 * @property string $komputer
 * @property string $bilangan_komputer
 * @property string $keadaan_komputer
 * @property string $projektor
 * @property string $bilangan_projektor
 * @property string $keadaan_projektor
 * @property string $mesin_pencetak
 * @property string $bilangan_mesin_pencetak
 * @property string $keadaan_mesin_pencetak
 * @property string $mesin_faks
 * @property string $bilangan_mesin_faks
 * @property string $keadaan_mesin_faks
 * @property string $pa_system
 * @property string $keadaan_pa_system
 * @property string $unifi
 * @property string $streamyx
 * @property string $lain_internet
 * @property string $maxis
 * @property string $digi
 * @property string $celcom
 * @property string $p1wimax
 * @property string $yes4g
 * @property string $lain_broadband
 * @property string $rating_kemudahan_ict
 * @property string $kerusi_bilik_latihan
 * @property string $bil_kerusi_bilik_latihan
 * @property string $keadaan_kerusi_bilik_latihan
 * @property string $meja_bilik_latihan
 * @property string $bil_meja_bilik_latihan
 * @property string $keadaan_meja_bilik_latihan
 * @property string $keluasan_bilik_latihan
 * @property string $penghawa_dingin_bilik_latihan
 * @property string $bilangan_penghawa_dingin_bilik_latihan
 * @property string $keadaan_penghawa_dingin_bilik_latihan
 * @property string $papan_putih_bilik_latihan
 * @property string $bilangan_papan_putih_bilik_latihan
 * @property string $keadaan_papan_putih_bilik_latihan
 * @property string $rating_bilik_latihan
 * @property string $rating_equip
 * @property string $tempat_letak_kereta_oku
 * @property string $tandas_khas_oku
 * @property string $laluan_khas_oku
 * @property string $tangga_handrail_oku
 * @property string $papan_tanda_khas_oku
 * @property string $rating_mesra_oku
 * @property string $jarak_pfn_komuniti
 * @property string $tempat_letak_kenderaan_capaian
 * @property string $jarak_tempat_letak_kenderaan_capaian
 * @property string $kedai_runcit
 * @property string $jarak_kedai_runcit
 * @property string $kedai_makan
 * @property string $jarak_kedai_makan
 * @property string $stesen_minyak
 * @property string $jarak_stesen_minyak
 * @property string $hentian_bas
 * @property string $jarak_hentian_bas
 * @property string $isyarat_telekomunikasi
 * @property string $rating_capaian
 * @property string $ulasan_keadaan_fizikal
 * @property string $kerjasama_pengurus
 * @property string $rating_keseluruhan_pfn
 * @property string $tarikh_daftar
 * @property string $didaftarkan_oleh
 * @property string $tarikh_audit
 * @property string $diaudit_oleh
 * @property string $nota
 * @property string $nama_pengurus2
 * @property string $no_kp2
 * @property string $no_kp_old2
 * @property string $jantina2
 * @property string $umur2
 * @property string $mobile2
 * @property string $no_tel2
 * @property string $fax2
 * @property string $email2
 * @property string $koordinate
 * @property string $date_enter
 * @property integer $enter_by
 */
class Pfn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pfn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'kampung_id', 'cluster_id', 'sub_base_id', 'district_id', 'state_id', 'enter_by','mukim_id','rating_kemudahan_asas','rating_kemudahan_ict','rating_mesra_oku','rating_bilik_latihan','rating_equip','rating_capaian','rating_keseluruhan_pfn'], 'integer'],
            [['pfn_code'], 'string', 'max' => 100],
            [['date', 'no_kp', 'no_kp_old', 'tarikh_daftar', 'tarikh_audit', 'no_kp2', 'no_kp_old2', 'date_enter','status_pfn'], 'string', 'max' => 20],
            [['pfn_name', 'nama_pengurus', 'email', 'didaftarkan_oleh', 'diaudit_oleh', 'nama_pengurus2', 'email2', 'koordinate'], 'string', 'max' => 225],
            [['lokasi', 'jantina', 'mobile', 'no_tel', 'fax', 'keaktifan_bilik_mesyuarat', 'jantina2', 'mobile2', 'no_tel2', 'fax2'], 'string', 'max' => 15],
            [['alamat'], 'string', 'max' => 255],
            [['poskod', 'elektrik', 'air', 'meja', 'kerusi', 'papan_putih', 'bilik_mesyuarat', 'kawasan_lapang', 'tandas', 'bilik_mandi', 'ruang_solat', 'komputer', 'bilangan_komputer', 'projektor', 'bilangan_projektor', 'mesin_pencetak', 'bilangan_mesin_pencetak', 'mesin_faks', 'bilangan_mesin_faks', 'pa_system', 'unifi', 'streamyx', 'lain_internet', 'maxis', 'digi', 'celcom', 'p1wimax', 'yes4g', 'lain_broadband', 'kerusi_bilik_latihan', 'bil_kerusi_bilik_latihan', 'meja_bilik_latihan', 'bil_meja_bilik_latihan', 'penghawa_dingin_bilik_latihan', 'bilangan_penghawa_dingin_bilik_latihan', 'papan_putih_bilik_latihan', 'bilangan_papan_putih_bilik_latihan', 'tempat_letak_kereta_oku', 'tandas_khas_oku', 'laluan_khas_oku', 'tangga_handrail_oku', 'papan_tanda_khas_oku', 'jarak_pfn_komuniti', 'tempat_letak_kenderaan_capaian', 'jarak_tempat_letak_kenderaan_capaian', 'kedai_runcit', 'jarak_kedai_runcit', 'kedai_makan', 'jarak_kedai_makan', 'stesen_minyak', 'jarak_stesen_minyak', 'hentian_bas', 'jarak_hentian_bas', 'isyarat_telekomunikasi'], 'string', 'max' => 10],
            [['keadaan_elektrik', 'keadaan_air', 'jumlah_meja', 'keadaan_meja', 'jumlah_kerusi', 'keadaan_kerusi', 'keadaan_papan_putih', 'keadaan_bilik_mesyuarat', 'keadaan_tandas', 'keadaan_bilik_mandi', 'keadaan_ruang_solat', 'keadaan_komputer', 'keadaan_projektor', 'keadaan_mesin_pencetak', 'keadaan_mesin_faks', 'keadaan_pa_system', 'keadaan_kerusi_bilik_latihan', 'keadaan_meja_bilik_latihan', 'keluasan_bilik_latihan', 'keadaan_penghawa_dingin_bilik_latihan', 'keadaan_papan_putih_bilik_latihan'], 'string', 'max' => 50],
            [['keluasan_bilik_mesyuarat', 'keluasan_kawasan_lapang'], 'string', 'max' => 25],
            [['ulasan_keadaan_fizikal', 'nota'], 'string', 'max' => 1000],
            [['kerjasama_pengurus'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pfn_id' => 'Pfn ID',
            'pfn_code' => 'Kod',
            'date' => 'Tarikh',
            'pfn_name' => 'Rangkaian Fasiliti Awam',
            'cat_id' => 'Kategori Rangkaian Fasiliti Awam',
            'lokasi' => 'Lokasi',
            'alamat' => 'Alamat',
            'poskod' => 'Poskod',
            'kampung_id' => 'Kampung',
            'cluster_id' => 'Cluster',
            'sub_base_id' => 'Sub Base',
            'mukim_id' => 'Mukim',
            'district_id' => 'Daerah',
            'state_id' => 'Negeri',
            'nama_pengurus' => 'Nama Pengurus (1)',
            'no_kp' => 'No Kad Pengenalan',
            'no_kp_old' => 'No Kad Pengenalan (Lama)',
            'jantina' => 'Jantina',
            'mobile' => 'No Telefon Bimbit',
            'no_tel' => 'No Telefon',
            'fax' => 'Fax',
            'email' => 'Email',
            'elektrik' => 'Elektrik',
            'keadaan_elektrik' => 'Keadaan Elektrik',
            'air' => 'Air',
            'keadaan_air' => 'Keadaan Air',
            'meja' => 'Meja',
            'jumlah_meja' => 'Jumlah Meja',
            'keadaan_meja' => 'Keadaan Meja',
            'kerusi' => 'Kerusi',
            'jumlah_kerusi' => 'Jumlah Kerusi',
            'keadaan_kerusi' => 'Keadaan Kerusi',
            'papan_putih' => 'Papan Putih',
            'keadaan_papan_putih' => 'Keadaan Papan Putih',
            'bilik_mesyuarat' => 'Bilik Mesyuarat',
            'keadaan_bilik_mesyuarat' => 'Keadaan Bilik Mesyuarat',
            'keaktifan_bilik_mesyuarat' => 'Keaktifan Bilik Mesyuarat',
            'keluasan_bilik_mesyuarat' => 'Keluasan Bilik Mesyuarat',
            'kawasan_lapang' => 'Kawasan Lapang',
            'keluasan_kawasan_lapang' => 'Keluasan Kawasan Lapang',
            'tandas' => 'Tandas',
            'keadaan_tandas' => 'Keadaan Tandas',
            'bilik_mandi' => 'Bilik Mandi',
            'keadaan_bilik_mandi' => 'Keadaan Bilik Mandi',
            'ruang_solat' => 'Ruang Solat',
            'keadaan_ruang_solat' => 'Keadaan Ruang Solat',
            'rating_kemudahan_asas' => 'Rating Kemudahan Asas',
            'komputer' => 'Komputer',
            'bilangan_komputer' => 'Bilangan Komputer',
            'keadaan_komputer' => 'Keadaan Komputer',
            'projektor' => 'Projektor',
            'bilangan_projektor' => 'Bilangan Projektor',
            'keadaan_projektor' => 'Keadaan Projektor',
            'mesin_pencetak' => 'Mesin Pencetak',
            'bilangan_mesin_pencetak' => 'Bilangan Mesin Pencetak',
            'keadaan_mesin_pencetak' => 'Keadaan Mesin Pencetak',
            'mesin_faks' => 'Mesin Faks',
            'bilangan_mesin_faks' => 'Bilangan Mesin Faks',
            'keadaan_mesin_faks' => 'Keadaan Mesin Faks',
            'pa_system' => 'Pa System',
            'keadaan_pa_system' => 'Keadaan Pa System',
            'unifi' => 'Unifi',
            'streamyx' => 'Streamyx',
            'lain_internet' => 'Lain Internet',
            'maxis' => 'Maxis',
            'digi' => 'Digi',
            'celcom' => 'Celcom',
            'p1wimax' => 'P1wimax',
            'yes4g' => 'Yes4g',
            'lain_broadband' => 'Lain Broadband',
            'rating_kemudahan_ict' => 'Rating Kemudahan ICT',
            'kerusi_bilik_latihan' => 'Kerusi Bilik Latihan',
            'bil_kerusi_bilik_latihan' => 'Bil Kerusi Bilik Latihan',
            'keadaan_kerusi_bilik_latihan' => 'Keadaan Kerusi Bilik Latihan',
            'meja_bilik_latihan' => 'Meja Bilik Latihan',
            'bil_meja_bilik_latihan' => 'Bil Meja Bilik Latihan',
            'keadaan_meja_bilik_latihan' => 'Keadaan Meja Bilik Latihan',
            'keluasan_bilik_latihan' => 'Keluasan Bilik Latihan',
            'penghawa_dingin_bilik_latihan' => 'Penghawa Dingin Bilik Latihan',
            'bilangan_penghawa_dingin_bilik_latihan' => 'Bilangan Penghawa Dingin Bilik Latihan',
            'keadaan_penghawa_dingin_bilik_latihan' => 'Keadaan Penghawa Dingin Bilik Latihan',
            'papan_putih_bilik_latihan' => 'Papan Putih Bilik Latihan',
            'bilangan_papan_putih_bilik_latihan' => 'Bilangan Papan Putih Bilik Latihan',
            'keadaan_papan_putih_bilik_latihan' => 'Keadaan Papan Putih Bilik Latihan',
            'rating_bilik_latihan' => 'Rating Bilik Latihan',
            'rating_equip' => 'Rating Peralatan Sukan',
            'tempat_letak_kereta_oku' => 'Tempat Letak Kereta Oku',
            'tandas_khas_oku' => 'Tandas Khas Oku',
            'laluan_khas_oku' => 'Laluan Khas Oku',
            'tangga_handrail_oku' => 'Tangga Handrail Oku',
            'papan_tanda_khas_oku' => 'Papan Tanda Khas Oku',
            'rating_mesra_oku' => 'Rating Mesra Oku',
            'jarak_pfn_komuniti' => 'Jarak Rangkaian Fasiliti Awam (Komuniti)',
            'tempat_letak_kenderaan_capaian' => 'Tempat Letak Kenderaan Capaian',
            'jarak_tempat_letak_kenderaan_capaian' => 'Jarak Tempat Letak Kenderaan Capaian',
            'kedai_runcit' => 'Kedai Runcit',
            'jarak_kedai_runcit' => 'Jarak Kedai Runcit',
            'kedai_makan' => 'Kedai Makan',
            'jarak_kedai_makan' => 'Jarak Kedai Makan',
            'stesen_minyak' => 'Stesen Minyak',
            'jarak_stesen_minyak' => 'Jarak Stesen Minyak',
            'hentian_bas' => 'Hentian Bas',
            'jarak_hentian_bas' => 'Jarak Hentian Bas',
            'isyarat_telekomunikasi' => 'Isyarat Telekomunikasi',
            'rating_capaian' => 'Rating Capaian',
            'ulasan_keadaan_fizikal' => 'Ulasan Keadaan Fizikal',
            'kerjasama_pengurus' => 'Kerjasama Pengurus',
            'rating_keseluruhan_pfn' => 'Rating Keseluruhan Pfn',
            'tarikh_daftar' => 'Tarikh Daftar',
            'didaftarkan_oleh' => 'Didaftarkan Oleh',
            'tarikh_audit' => 'Tarikh Audit',
            'diaudit_oleh' => 'Diaudit Oleh',
            'nota' => 'Nota',
            'nama_pengurus2' => 'Nama Pengurus (2)',
            'no_kp2' => 'No Kad Pengenalan',
            'no_kp_old2' => 'No Kad Pengenalan (Lama)',
            'jantina2' => 'Jantina',
            'mobile2' => 'No Telefon Bimbit',
            'no_tel2' => 'No Telefon',
            'fax2' => 'Fax',
            'email2' => 'Email',
            'koordinate' => 'Koordinate',
            'date_enter' => 'Date Enter',
            'enter_by' => 'Enter By',
            'status_pfn' => 'Status PFN',
            
           
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(LookupPfnCategory::className(), ['cat_id' => 'cat_id']);
    }

    public function getKampung()
    {
        return $this->hasOne(LookupKampung::className(), ['kampung_id' => 'kampung_id']);
    }
    public function getMukim()
    {
        return $this->hasOne(LookupMukim::className(), ['mukim_id' => 'mukim_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCluster()
    {
        return $this->hasOne(LookupCluster::className(), ['cluster_id' => 'cluster_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(LookupDistrict::className(), ['district_id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubBase()
    {
        return $this->hasOne(LookupSubBase::className(), ['sub_base_id' => 'sub_base_id']);
    } 
    
   
}
