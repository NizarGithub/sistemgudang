<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
/**
 * This is the model class for table "barang".
 *
 * @property integer $id
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $gender
 * @property string $warna
 * @property double $harga
 * @property integer $stok_s
 * @property integer $stok_m
 * @property integer $stok_l
 * @property integer $stok_xl
 * @property integer $stok_n
 * @property integer $kode_jenis
 *
 * @property JenisBarang $kodeJenis
 * @property DetailKirim[] $detailKirims
 * @property Pesanan[] $pesanans
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_barang', 'nama_barang', 'gender', 'warna', 'harga'], 'required'],
            [['gender', 'warna'], 'string'],
            [['harga'], 'number'],
            [['stok_s', 'stok_m', 'stok_l', 'stok_xl', 'stok_n', 'kode_jenis'], 'integer'],
            [['kode_barang'], 'string', 'max' => 20],
            [['nama_barang'], 'string', 'max' => 50],
            [['kode_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => JenisBarang::className(), 'targetAttribute' => ['kode_jenis' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'gender' => 'Gender',
            'warna' => 'Warna',
            'harga' => 'Harga',
            'stok_s' => 'Stok S',
            'stok_m' => 'Stok M',
            'stok_l' => 'Stok L',
            'stok_xl' => 'Stok Xl',
            'stok_n' => 'Stok N',
            'kode_jenis' => 'Kode Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJenis()
    {
        return $this->hasOne(JenisBarang::className(), ['id' => 'kode_jenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailKirims()
    {
        return $this->hasMany(DetailKirim::className(), ['kode_barang' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanans()
    {
        return $this->hasMany(Pesanan::className(), ['kode_barang' => 'id']);
    }
	
	public function getListKodeJenis(){
		$model_jenis= JenisBarang::find()->all();
		
		return ArrayHelper::map($model_jenis, 'id', 'kode_jenis');
		
	}
	
	public function generateKodeBarang(){
		if (($data = Barang::find()->max('kode_barang')) !== null) {
            $nilaikode = substr($data, 3);
			$kode = (int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "BR-".str_pad($kode, 4, "0", STR_PAD_LEFT);
			
			return $hasilkode;
        } else {
            return "BR-0001";
        }
		
		
		
	}
}
