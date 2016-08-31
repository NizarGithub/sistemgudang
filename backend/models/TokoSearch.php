<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Toko;

/**
 * TokoSearch represents the model behind the search form of `app\models\Toko`.
 */
class TokoSearch extends Toko
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['kode_toko', 'nama_toko', 'alamat_toko', 'telp_toko', 'contact_person_toko'], 'safe'],
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
        $query = Toko::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination'=>[
				'pageSize'=>5,
			]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'kode_toko', $this->kode_toko])
            ->andFilterWhere(['like', 'nama_toko', $this->nama_toko])
            ->andFilterWhere(['like', 'alamat_toko', $this->alamat_toko])
            ->andFilterWhere(['like', 'telp_toko', $this->telp_toko])
            ->andFilterWhere(['like', 'contact_person_toko', $this->contact_person_toko]);

        return $dataProvider;
    }
}
