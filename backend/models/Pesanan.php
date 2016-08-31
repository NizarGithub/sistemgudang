<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "pesanan".
 *
 * @property integer $id
 * @property string $no_pesanan
 * @property string $tgl_pesanan
 * @property integer $supplier
 *
 * @property DetilePesanan[] $detilePesanans
 * @property Penerimaan[] $penerimaans
 * @property Supplier $supplier0
 */
class Pesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_pesanan', 'tgl_pesanan', 'supplier'], 'required'],
            [['tgl_pesanan'], 'safe'],
            [['supplier'], 'integer'],
            [['no_pesanan'], 'string', 'max' => 15],
            [['supplier'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_pesanan' => 'No Pesanan',
            'tgl_pesanan' => 'Tanggal Pesanan',
            'supplier' => 'Supplier',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetilePesanans()
    {
        return $this->hasMany(DetilePesanan::className(), ['id_pesanan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenerimaans()
    {
        return $this->hasMany(Penerimaan::className(), ['no_pesanan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier']);
    }
	
	public function getKonfirmasi(){
		return $this->hasOne(Penerimaan::className(), ['no_pesanan'=>'id']);
	}
	
	public function generateKodePesanan(){
		if (($data = $this->find()->max('no_pesanan')) !== null) {
            $nilaikode = substr($data, 3);
			$kode = (int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "PS-".str_pad($kode, 4, "0", STR_PAD_LEFT);
			
			return $hasilkode;
        } else {
            return "PS-0001";
        }
		
	}
	
	public function getListSupplier(){
		$model = Supplier::find()->all();
		
		return ArrayHelper::map($model, 'id', 'nama_supplier');
	}
	
	public function cekKonfirmasi(){
		
		if($this->getKonfirmasi()->one() != null){
			return true;
		}else{
			return false;
		}
	}
}
