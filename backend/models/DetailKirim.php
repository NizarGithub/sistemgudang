<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "detail_kirim".
 *
 * @property integer $id
 * @property integer $no_pengiriman
 * @property integer $kode_barang
 * @property integer $stok_s
 * @property integer $stok_m
 * @property integer $stok_l
 * @property integer $stok_xl
 * @property integer $stok_n
 *
 * @property Pengiriman $noPengiriman
 * @property Barang $kodeBarang
 */
class DetailKirim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_kirim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'kode_barang'], 'required'],
            [['no_pengiriman', 'kode_barang', 'stok_s', 'stok_m', 'stok_l', 'stok_xl', 'stok_n'], 'integer'],
            [['no_pengiriman'], 'exist', 'skipOnError' => true, 'targetClass' => Pengiriman::className(), 'targetAttribute' => ['no_pengiriman' => 'id']],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['kode_barang' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_pengiriman' => 'No Pengiriman',
            'kode_barang' => 'Kode Barang',
            'stok_s' => 'Stok S',
            'stok_m' => 'Stok M',
            'stok_l' => 'Stok L',
            'stok_xl' => 'Stok Xl',
            'stok_n' => 'Stok N',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoPengiriman()
    {
        return $this->hasOne(Pengiriman::className(), ['id' => 'no_pengiriman']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'kode_barang']);
    }
	
	public function getListBarang(){
		$model = Barang::find()->all();
		
		return ArrayHelper::map($model, 'id', 'nama_barang');
	}
}
