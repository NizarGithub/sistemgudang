<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
		
		/** Membuat Hak Akses untuk Barang **/
		
		$tambahBarang = $auth->createPermission('tambahBarang');
		$tambahBarang->description = "Penambahan Barang";
		$auth->add($tambahBarang);
		
		$updateBarang = $auth->createPermission('updateBarang');
		$updateBarang->description = "Perubahan Barang";
		$auth->add($updateBarang);
		
		$deleteBarang = $auth->createPermission('deleteBarang');
		$deleteBarang->description = "Penghapusan Barang";
		$auth->add($deleteBarang);
		
		$viewBarang = $auth->createPermission('viewBarang');
		$viewBarang->description = "Melihat Barang";
		$auth->add($viewBarang);
		
		/** Membuat Hak Akses untuk Barang **/
		
		$tambahPemesanan = $auth->createPermission('tambahPemesanan');
		$tambahPemesanan->description = "Penambahan Pemesanan";
		$auth->add($tambahPemesanan);
		
		$updatePemesanan = $auth->createPermission('updatePemesanan');
		$updatePemesanan->description = "Update Pemesanan";
		$auth->add($updatePemesanan);
		
		$deletePemesanan = $auth->createPermission('deletePemesanan');
		$deletePemesanan->description = "Penghapusan Pemesanan";
		$auth->add($deletePemesanan);
				
		$viewPemesanan = $auth->createPermission('viewPemesanan');
		$viewPemesanan->description = "Melihat Pemesanan";
		$auth->add($viewPemesanan);
		
		/** Membuat Hak Akses untuk Jenis Barang **/
		
		/** Membuat user Role  **/
		$user = $auth->createRole('user');
		$auth->add($user);
		$auth->addChild($user, $tambahPemesanan);
		$auth->addChild($user, $viewPemesanan);
		
		
		/** Membuat admin Role  **/
		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $tambahBarang);
		$auth->addChild($admin, $updateBarang);
		$auth->addChild($admin, $deleteBarang);
		$auth->addChild($admin, $viewBarang);
		$auth->addChild($admin, $deletePemesanan);
		$auth->addChild($admin, $updatePemesanan);
		$auth->addChild($admin, $user);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($user, 2);
        $auth->assign($admin, 1);
    }
}