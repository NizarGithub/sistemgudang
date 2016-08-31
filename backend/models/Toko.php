<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "toko".
 *
 * @property integer $id
 * @property string $kode_toko
 * @property string $nama_toko
 * @property string $alamat_toko
 * @property string $telp_toko
 * @property string $contact_person_toko
 *
 * @property Pengiriman[] $pengirimen
 */
class Toko extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'toko';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_toko', 'nama_toko', 'alamat_toko', 'telp_toko'], 'required'],
            [['kode_toko', 'telp_toko'], 'string', 'max' => 20],
            [['nama_toko'], 'string', 'max' => 100],
            [['alamat_toko'], 'string', 'max' => 1024],
            [['contact_person_toko'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_toko' => 'Kode Toko',
            'nama_toko' => 'Nama Toko',
            'alamat_toko' => 'Alamat Toko',
            'telp_toko' => 'Telepon (Toko)',
            'contact_person_toko' => 'Kontak Pengurus Toko',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengirimen()
    {
        return $this->hasMany(Pengiriman::className(), ['kode_toko' => 'id']);
    }
	public function generateKodeToko(){
		if (($data = $this->find()->max('kode_toko')) !== null) {
            $nilaikode = substr($data, 3);
			$kode = (int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "TK-".str_pad($kode, 3, "0", STR_PAD_LEFT);
			
			return $hasilkode;
        } else {
            return "TK-001";
        }
		
		
		
	}
}
