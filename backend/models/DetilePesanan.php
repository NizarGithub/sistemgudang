<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "detile_pesanan".
 *
 * @property integer $id
 * @property integer $id_pesanan
 * @property integer $id_barang
 * @property integer $stok_s
 * @property integer $stok_m
 * @property integer $stok_l
 * @property integer $stok_xl
 * @property integer $stok_n
 *
 * @property Barang $barang
 * @property Pesanan $pesanan
 */
class DetilePesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	
	public $listBarang;
	 
    public static function tableName()
    {
        return 'detile_pesanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'id_barang'], 'required'],
            [['id_pesanan', 'id_barang', 'stok_s', 'stok_m', 'stok_l', 'stok_xl', 'stok_n'], 'integer'],
			[['listBarang'], 'safe'],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['id_barang' => 'id']],
            [['id_pesanan'], 'exist', 'skipOnError' => true, 'targetClass' => Pesanan::className(), 'targetAttribute' => ['id_pesanan' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pesanan' => 'Id Pesanan',
            'id_barang' => 'Id Barang',
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
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'id_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanan()
    {
        return $this->hasOne(Pesanan::className(), ['id' => 'id_pesanan']);
    }
	
	public function getListBarang(){
		$model = Barang::find()->all();
		
		return ArrayHelper::map($model, 'id', 'nama_barang');
	}
}
