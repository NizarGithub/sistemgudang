<?php 

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penerimaan;
use yii\db\Expression;
use yii\db\Query;

class LaporanPenerimaanSearch extends Penerimaan{
	public $pesanan;
	
	public function rules(){
		return [
			[['no_pesanan'], 'integer'],
			[['tgl_penerimaan', 'status_penerimaan', ], 'safe'],
		];
	}
	
	public function scenarios(){
		 return Model::scenarios();
	}
	
	public function search($param){
		$query = Penerimaan::find();
		
		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
			'sort'=>false,
		]);
		
		$this->load($param);
		
		if(!$this->validate()){
			return $dataProvider;
		}
		$expression = new Expression('MONTH(penerimaan.tgl_penerimaan)');
		$query->orFilterWhere(["$expression" => $this->tgl_penerimaan]);
		
		$dataCart = $this->getDataCart($dataProvider);
		
		$data = ['dataProvider'=>$dataProvider, 'dataCart'=>$dataCart];
		return $data;
	}
	
	public function getDataCart($data){
		
		$confirm = $data->query->select('no_pesanan');
		
		$query = new Query();
		
		
		$supplier = $query->select('*')->from('supplier')->all();
		$data = array();
		
		foreach($supplier as $s){
			$pesanan = $query->select('*')->from('pesanan')->where(['supplier'=>$s["id"]])->andWhere(['in','id', $confirm])->all();
			$total = 0;
			$q2 = new Query();
			if(!is_null($pesanan)){
				foreach($pesanan as $p){
					
					$detile_pesanan = Yii::$app->db->createCommand("SELECT (SUM([[stok_s]])+SUM([[stok_m]])+SUM([[stok_l]])+SUM([[stok_xl]])+SUM([[stok_n]])) FROM {{detile_pesanan}} where [[id_pesanan]]=".$p['id'])->queryScalar();;
					$total = $total+$detile_pesanan;
				}	
			}
			
			array_push($data, [$s['nama_supplier'], $total]);			
			
			
		}
		
		return $data;
		
		
		
	}
}

