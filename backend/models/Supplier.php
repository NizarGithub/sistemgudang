<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $kode_supplier
 * @property string $nama_supplier
 * @property string $alamat_supplier
 * @property string $telp_supplier
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_supplier', 'nama_supplier', 'alamat_supplier'], 'required'],
            [['kode_supplier', 'telp_supplier'], 'string', 'max' => 20],
            [['nama_supplier'], 'string', 'max' => 100],
            [['alamat_supplier'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_supplier' => 'Kode Supplier',
            'nama_supplier' => 'Nama Supplier',
            'alamat_supplier' => 'Alamat Supplier',
            'telp_supplier' => 'Telp Supplier',
        ];
    }
	
	public function generateKodeSupplier(){
		if (($data = $this->find()->max('kode_supplier')) !== null) {
            $nilaikode = substr($data, 3);
			$kode = (int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "SP-".str_pad($kode, 3, "0", STR_PAD_LEFT);
			
			return $hasilkode;
        } else {
            return "SP-001";
        }
		
		
		
	}
}
