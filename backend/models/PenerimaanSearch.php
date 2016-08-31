<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penerimaan;

/**
 * PenerimaanSearch represents the model behind the search form of `app\models\Penerimaan`.
 */
class PenerimaanSearch extends Penerimaan
{
    /**
     * @inheritdoc
     */
	
	public $no_pesanan;
	 
    public function rules()
    {
        return [
            [['id', 'no_pesanan'], 'integer'],
            [['tgl_penerimaan','no_pesanan', 'status_penerimaan'], 'safe'],
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
        $query = Penerimaan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
		$query->joinWith('noPesanan');
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'no_pesanan' => $this->no_pesanan,
            'tgl_penerimaan' => $this->tgl_penerimaan,
        ]);

        $query->andFilterWhere(['like', 'status_penerimaan', $this->status_penerimaan]);
		$query->orFilterWhere(['like', 'pesanan.no_pesanan', $this->no_pesanan]);

        return $dataProvider;
    }
}
