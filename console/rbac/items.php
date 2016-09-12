<?php
return [
    'tambahBarang' => [
        'type' => 2,
        'description' => 'Penambahan Barang',
    ],
    'updateBarang' => [
        'type' => 2,
        'description' => 'Perubahan Barang',
    ],
    'deleteBarang' => [
        'type' => 2,
        'description' => 'Penghapusan Barang',
    ],
    'viewBarang' => [
        'type' => 2,
        'description' => 'Melihat Barang',
    ],
    'tambahPemesanan' => [
        'type' => 2,
        'description' => 'Penambahan Pemesanan',
    ],
    'updatePemesanan' => [
        'type' => 2,
        'description' => 'Update Pemesanan',
    ],
    'deletePemesanan' => [
        'type' => 2,
        'description' => 'Penghapusan Pemesanan',
    ],
    'viewPemesanan' => [
        'type' => 2,
        'description' => 'Melihat Pemesanan',
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'tambahPemesanan',
            'viewPemesanan',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'tambahBarang',
            'updateBarang',
            'deleteBarang',
            'viewBarang',
            'deletePemesanan',
            'updatePemesanan',
            'user',
        ],
    ],
];
