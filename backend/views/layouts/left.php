<?php use yii\helpers\Html ?>
<aside class="main-sidebar">

    <section class="sidebar">

        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Master Data', 'options' => ['class' => 'header']],
					['label' => 'Jenis Barang', 'icon' => 'fa fa-download', 'url' => ['/jenis-barang'],],
					['label' => 'Data Barang', 'icon' => 'fa fa-cube', 'url' => ['/barang'],],
					['label' => 'Data Toko', 'icon' => 'fa fa-university', 'url' => ['/toko'],],
					['label' => 'Data Supplier', 'icon' => 'fa fa-users', 'url' => ['/supplier'],],
					
					['label' => 'Transaksi', 'options' => ['class' => 'header']],
					['label' => 'Pemesanan', 'icon' => 'fa fa-shopping-basket', 'url' => ['/pemesanan'],],
					['label' => 'Penerimaan', 'icon' => 'fa fa-cloud-download', 'url' => ['/penerimaan'],],
					['label' => 'Pengiriman', 'icon' => 'fa fa-cloud-upload', 'url' => ['/pengiriman'],],
						
					['label' => 'Laporan', 'options' => ['class' => 'header']],
					['label' => 'Laporan Persediaan Barang', 'icon' => 'fa fa-suitcase', 'url' => ['/laporan-persediaan'],],
					['label' => 'Laporan Penerimaan Barang', 'icon' => 'fa fa-cart-arrow-down', 'url' => ['/laporan-penerimaan'],],
					['label' => 'Laporan Pengeluaran Barang', 'icon' => 'fa fa-line-chart', 'url' => ['/laporan-pengeluaran-barang'],],
					
					
					['label' => 'Preferences', 'options' => ['class' => 'header']],
					['label' => 'Manajemen User', 'icon' => 'fa fa-users', 'url' => ['/manajer-user']],
					
					
					
                    
                ],
            ]
        ) ?>
		<ul class='sidebar-menu'>
			<li>
				<?= Html::a(
                                    '<i class="fa fa-sign-out"></i> &nbsp;<span>Logout</span>',
                                    ['/site/logout'],
                                    ['data-method' => 'post',]
                                ) ?>
			</li>
		</ul>
    </section>

</aside>
