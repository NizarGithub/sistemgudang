<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Query;
/**
 * This is the model class for table "penerimaan".
 *
 * @property integer $id
 * @property integer $no_pesanan
 * @property string $tgl_penerimaan
 * @property string $status_penerimaan
 *
 * @property Pesanan $noPesanan
 */
class Penerimaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penerimaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_pesanan'], 'required'],
            [['no_pesanan'], 'integer'],
            [['tgl_penerimaan'], 'safe'],
            [['status_penerimaan'], 'string'],
            [['no_pesanan'], 'exist', 'skipOnError' => true, 'targetClass' => Pesanan::className(), 'targetAttribute' => ['no_pesanan' => 'id']],
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
            'tgl_penerimaan' => 'Tgl Penerimaan',
            'status_penerimaan' => 'Status Penerimaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoPesanan()
    {
        return $this->hasOne(Pesanan::className(), ['id' => 'no_pesanan']);
    }
	
	public function getListPesanan()
	{
		$q = new Query();
		$query = $q->select('no_pesanan')->from('penerimaan');
		$model = Pesanan::find()->andWhere(['not in', 'id', $query])->all();
		
		return ArrayHelper::map($model, 'id', 'no_pesanan');
	}
}
