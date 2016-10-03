<?php
namespace app\models;

use Yii;
use yii\Base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengiriman;
use yii\db\Expression;
use yii\db\Query;


class LaporanPengeluaranBarangSearch extends Pengiriman{
    public $pesanan;
	protected $data = array();
	public function rules(){
		return [
			[['no_pengiriman'], 'integer'],
			[['tgl_pengiriman', 'kode_toko' ], 'safe'],
		];
	}
	
	public function scenarios(){
		 return Model::scenarios();
	}
	
	public function search($param){
		$query = Pengiriman::find();
		$queryCart = Pengiriman::find();
		
		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
			'sort'=>false,
		]);
		
		$dataProviderCart = new ActiveDataProvider([
			'query'=>$queryCart,
			'sort'=>false,
		]);

		$this->load($param);
		
		if(!$this->validate()){
			return $dataProvider;
		}
		$expression = new Expression('MONTH(pengiriman.tgl_pengiriman)');
		
		$query->orFilterWhere(["$expression" => $this->tgl_pengiriman]);
		$queryCart->orFilterWhere(["$expression" => $this->tgl_pengiriman]);
		
		$dataCart = $this->getDataCart($dataProviderCart);
		
		$data = ['dataProvider'=>$dataProvider, 'dataCart'=>$dataCart];
		return $data;
	}
	
	public function getDataCart($data){
		
		$confirm = $data->query->select('*');
		
        $query = new Query();
		
		
		$toko = $query->select('*')->from('toko')->all();
		$data = array();
		
		foreach($toko as $s){
			$pengiriman = $confirm->andWhere(['kode_toko'=>$s["id"]])->all();
			
			$total = 0;
			$q2 = new Query();
			if(!is_null($pengiriman)){
				foreach($pengiriman as $p){
					
					$detile_pengiriman = Yii::$app->db->createCommand("SELECT (SUM([[stok_s]])+SUM([[stok_m]])+SUM([[stok_l]])+SUM([[stok_xl]])+SUM([[stok_n]])) FROM {{detail_kirim}} where [[no_pengiriman]]=".$p['id'])->queryScalar();
					$total = $total+$detile_pengiriman;
				}	
			}
			
			array_push($data, [$s['nama_toko'], $total]);			
			
			
		}
		
		return $data;
		
		
		
	}
}