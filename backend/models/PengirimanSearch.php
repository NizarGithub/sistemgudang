<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengiriman;

/**
 * PengirimanSearch represents the model behind the search form of `app\models\Pengiriman`.
 */
class PengirimanSearch extends Pengiriman
{
    /**
     * @inheritdoc
     */
	 
	public $toko;
    public function rules()
    {
        return [
            [['id', 'kode_toko'], 'integer'],
            [['no_pengiriman', 'toko','tgl_pengiriman'], 'safe'],
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
        $query = Pengiriman::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
		$query->joinWith('kodeToko');
		
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tgl_pengiriman' => $this->tgl_pengiriman,
            'kode_toko' => $this->kode_toko,
        ]);

        $query->andFilterWhere(['like', 'no_pengiriman', $this->no_pengiriman]);
		$query->andFilterWhere(['like', 'toko.nama_toko', $this->toko]);

        return $dataProvider;
    }
}
