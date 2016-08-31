<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Barang;

/**
 * BarangSearch represents the model behind the search form of `app\models\Barang`.
 */
class BarangSearch extends Barang
{
	public $kodejenis;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stok_s', 'stok_m', 'stok_l', 'stok_xl', 'stok_n', 'kode_jenis'], 'integer'],
            [['kode_barang', 'nama_barang', 'gender', 'warna', 'kode_jenis', 'kodejenis'], 'safe'],
            [['harga'], 'number'],
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
        $query = Barang::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=>false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		$query->joinWith('kodeJenis');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'harga' => $this->harga,
            'stok_s' => $this->stok_s,
            'stok_m' => $this->stok_m,
            'stok_l' => $this->stok_l,
            'stok_xl' => $this->stok_xl,
            'stok_n' => $this->stok_n,
            'kode_jenis' => $this->kode_jenis
			
        ]);

        $query->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'warna', $this->warna])
			->orFilterWhere(['like', 'kodeJenis.kode_jenis', $this->kodejenis]);

        return $dataProvider;
    }
}
