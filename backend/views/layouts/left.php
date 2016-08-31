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
					
					['label' => 'Tools', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
