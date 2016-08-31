<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_barang".
 *
 * @property integer $id
 * @property string $kode_jenis
 * @property string $nama_jenis
 */
class JenisBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_jenis', 'nama_jenis'], 'required'],
            [['id'], 'integer'],
            [['kode_jenis'], 'string', 'max' => 50],
            [['nama_jenis'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_jenis' => 'Kode Jenis',
            'nama_jenis' => 'Nama Jenis',
        ];
    }
	
	public function generateKodeJenis(){
		if (($data = $this::find()->max('kode_jenis')) !== null) {
            $nilaikode = substr($data, 3);
			$kode = (int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "KJ-".str_pad($kode, 3, "0", STR_PAD_LEFT);
			
			return $hasilkode;
        } else {
            return "KJ-001";
        }
		
		
		
	}
}
