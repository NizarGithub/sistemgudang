<?php 
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class RbacController extends Controller 
{
	public function actionAuthJenisBarang(){
		$auth = Yii::$app->authManager;
		
		// Membuat Hak Akses
		$tambahJenis = $auth->createPermission('tambahJenis');
		$tambahJenis->description = "Permission untuk menambahkan Jenis";
		$auth->add($tambahJenis);
		
		$updateJenis = $auth->createPermission('updateJenis');
		$updateJenis->description = "Permission untuk merubah Jenis";
		$auth->add($updateJenis);
		
		$deleteJenis = $auth->createPermission('deleteJenis');
		$deleteJenis->description = "Permission untuk Menghapus Jenis";
		$auth->add($deleteJenis);
		
		
		$admin = $auth->getRole('admin');
		$auth->addChild($admin, $tambahJenis);
		$auth->addChild($admin, $updateJenis);
		$auth->addChild($admin, $deleteJenis);
		
		
	}
	
	public function actionAuthViewIndex(){
		$auth = Yii::$app->authManager;
		
		$indexView = $auth->createPermission('indexView');
		$indexView->description = "Permission untuk halaman awal";
		$auth->add($indexView);
		
		$admin = $auth->getRole('admin');
		$user = $auth->getRole('user');
		
		$auth->addChild($admin, $indexView);
		$auth->addChild($user, $indexView);
	}
	
	public function actionAuthManajemenUser(){
		$auth = Yii::$app->authManager;
		
		$viewManajemen = $auth->createPermission('masukManajemen');
		$viewManajemen->description = "Permission untuk masuk ke Menu Manajemen User";
		$auth->add($viewManajemen);
		
		$hapusUser = $auth->createPermission('hapusUser');
		$hapusUser->description = "Permission untuk menghapus User";
		$auth->add($hapusUser);
		
		
		
		$admin = $auth->getRole('admin');
		$auth->addChild($admin, $viewManajemen);
		$auth->addChild($admin, $hapusUser);
	}
	
	public function actionAuthManajemenUserTambah(){
		$auth = Yii::$app->authManager;
		
		$tambahUser = $auth->createPermission('tambahUser');
		$tambahUser->description = "Permission untuk Tambah User";
		$auth->add($tambahUser);
		
		
		
		$admin = $auth->getRole('admin');
		$auth->addChild($admin, $tambahUser);
	}
	
	public function actionAuthToko(){
		$auth = Yii::$app->authManager;		
		
		$tambahToko = $auth->createPermission('tambahToko');
		$tambahToko->description = "Permission untuk Menambahkan Toko";
		$auth->add($tambahToko);
		
		$updateToko = $auth->createPermission('updateToko');
		$updateToko->description = "Permission untuk merubah Data Toko";
		$auth->add($updateToko);
		
		$deleteToko = $auth->createPermission('hapusToko');
		$deleteToko->description = "Permission untuk menghapus Toko";
		$auth->add($deleteToko);
		
		$admin = $auth->getRole('admin');
		$auth->addChild($admin, $tambahToko);
		$auth->addChild($admin, $updateToko);
		$auth->addChild($admin, $deleteToko);
		
	}
	
	public function actionAuthSupplier(){
		$auth = Yii::$app->authManager;
		
		$tambahSupplier = $auth->createPermission('tambahSupplier');
		$tambahSupplier->description = "Permission untuk menambah data Supplier";
		$auth->add($tambahSupplier);
		
		$updateSupplier = $auth->createPermission('updateSupplier');
		$updateSupplier->description = "Permission untuk merubah data Supplier";
		$auth->add($updateSupplier);
		
		$deleteSupplier = $auth->createPermission('deleteSupplier');
		$deleteSupplier->description = "Permission untuk menghapus data Supplier";
		$auth->add($deleteSupplier);
		
		$admin = $auth->getRole('admin');
		$auth->addChild($admin, $tambahSupplier);
		$auth->addChild($admin, $updateSupplier);
		$auth->addChild($admin, $deleteSupplier);
		
	}
	
	public function actionAuthPenerimaan(){
		$auth = Yii::$app->authManager;
		
		$tambahPenerimaan = $auth->createPermission('tambahPenerimaan');
		$tambahPenerimaan->description = "Permission untuk penambahan data Penerimaan";
		$auth->add($tambahPenerimaan);
		
		$updatePenerimaan = $auth->createPermission('updatePenerimaan');
		$updatePenerimaan->description = "Permission untuk perubahan data Penerimaan";
		$auth->add($updatePenerimaan);
		
		$deletePenerimaan = $auth->createPermission('deletePermission');
		$deletePenerimaan->description = "Permission untuk penghapusan data Penerimaan";
		$auth->add($deletePenerimaan);
		
		$user = $auth->getRole('user');
		$admin = $auth->getRole('admin');
		
		$auth->addChild($user, $tambahPenerimaan);
		
		$auth->addChild($admin, $updatePenerimaan);
		$auth->addChild($admin, $deletePenerimaan);
		
	}
	
	public function actionAuthPengeluaran(){
		$auth = Yii::$app->authManager;
		
		$tambahPengeluaran = $auth->createPermission('tambahPengeluaran');
		$tambahPengeluaran->description = "Permission untuk Tambah Pengeluaran";
		$auth->add($tambahPengeluaran);
		
		$updatePengeluaran = $auth->createPermission('updatePengeluaran');
		$updatePengeluaran->description = "Permission untuk perubahan data Pengeluaran";
		$auth->add($updatePengeluaran);
		
		$deletePengeluaran = $auth->createPermission('deletePengeluaran');
		$deletePengeluaran->description = "Permission untuk Menghapus data Pengeluaran";
		$auth->add($deletePengeluaran);
		
		$user = $auth->getRole('user');
		$admin = $auth->getRole('admin');
		
		$auth->addChild($user, $tambahPengeluaran);
		
		$auth->addChild($admin, $updatePengeluaran);
		$auth->addChild($admin, $deletePengeluaran);
	}
	
	public function actionInit(){
		$auth = Yii::$app->authManager;
		
		// Membuat Hak Akses untuk Barang
		/*
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
		
		// Membuat Hak Akses untuk Barang 
		
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
		
		// Membuat Hak Akses untuk Jenis Barang 
		
		// Membuat user Role  *
		$user = $auth->createRole('user');
		$auth->add($user);
		$auth->addChild($user, $tambahPemesanan);
		$auth->addChild($user, $viewPemesanan);
		
		
		// Membuat admin Role  
		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $tambahBarang);
		$auth->addChild($admin, $updateBarang);
		$auth->addChild($admin, $deleteBarang);
		$auth->addChild($admin, $viewBarang);
		$auth->addChild($admin, $deletePemesanan);
		$auth->addChild($admin, $updatePemesanan);
		$auth->addChild($admin, $user);
		*/
		
		$user = $auth->getRole('user');
		$admin = $auth->getRole('admin');
		
		$auth->assign($user, 2);
        $auth->assign($admin, 1);
		/**
		// add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
		**/
	}
	
}