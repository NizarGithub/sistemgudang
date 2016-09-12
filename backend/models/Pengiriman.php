<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "pengiriman".
 *
 * @property integer $id
 * @property string $no_pengiriman
 * @property string $tgl_pengiriman
 * @property integer $kode_toko
 *
 * @property Toko $kodeToko
 */
class Pengiriman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengiriman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_pengiriman', 'kode_toko'], 'required'],
            [['tgl_pengiriman'], 'safe'],
            [['kode_toko'], 'integer'],
            [['no_pengiriman'], 'string', 'max' => 20],
            [['kode_toko'], 'exist', 'skipOnError' => true, 'targetClass' => Toko::className(), 'targetAttribute' => ['kode_toko' => 'id']],
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
            'tgl_pengiriman' => 'Tgl Pengiriman',
            'kode_toko' => 'Kode Toko',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeToko()
    {
        return $this->hasOne(Toko::className(), ['id' => 'kode_toko']);
    }
	
	public function getListDetile()
	{
		return $this->hasMany(DetailKirim::className(), ['no_pengiriman'=>'id']);
	}
	
	public function getListToko(){
		$model = Toko::find()->all();
		
		return ArrayHelper::map($model, 'id', 'nama_toko');
	}
	
	public function generateNoPengiriman(){
		if (($data = $this::find()->max('no_pengiriman')) !== null) {
            $nilaikode = substr($data, 3);
			$kode = (int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "PG-".str_pad($kode, 4, "0", STR_PAD_LEFT);
			
			return $hasilkode;
        } else {
            return "PG-0001";
        }
		
		
		
	}
	
	public function cekDetile(){
		if($this->getListDetile()->all() != null){
			return true;
		}else{
			return false;
		}
		
		
	}
}
