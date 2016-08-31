<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pesanan;

/**
 * PesananSearch represents the model behind the search form of `app\models\Pesanan`.
 */
class PesananSearch extends Pesanan
{
    /**
     * @inheritdoc
     */
	
	public $nama_supplier;
	 
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_pesanan',  'tgl_pesanan', 'nama_supplier'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pesanan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=>false,
        ]);

        $this->load($params);
		
		$query->joinWith('dataSupplier');
		
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
			'tgl_pesanan' => $this->tgl_pesanan,
           ]);

        $query->andFilterWhere(['like', 'no_pesanan', $this->no_pesanan]);
		$query->andFilterWhere(['like', 'tgl_pesanan', $this->tgl_pesanan]);
		$query->orFilterWhere(['like', 'supplier.nama_supplier', $this->nama_supplier]);

        return $dataProvider;
    }
}
