<?php

return [
    'navbar' => [
        [
            'id' => 1,
            'label' => 'Home',
            'url' => '', // Ini adalah nama route
            'type' => 'link',
        ],
        [
            'id' => 2,
            'label' => 'Visi & Misi',
            'url' => 'visi-misi',
            'type' => 'link',
        ],
        [
            'id' => 3,
            'label' => 'Profil',
            'url' => 'profil',
            'type' => 'dropdown',
            'child' => [
                [
                    'label' => 'Selayang Pandang',
                    'url' => 'selayang-pandang'
                ]
            ]
        ],

        [
            'id' => 4,
            'label' => 'Berita Terbaru',
            'url' => 'blog', // Sesuaikan nama route-nya
            'type' => 'link',
        ],

        [
            'id' => 5,
            'label' => 'Kontak',
            'url' => 'kontak',
            'type' => 'link',
        ],
    ],

    'actions' => [
        [
            'label' => 'PPDB',
            'url' => '#', // Nama route
            'class' => 'bg-pink-500 hover:bg-pink-700',
        ],

        [
            'label' => 'Login',
            'url' => '#',
            'class' => 'border border-white hover:bg-white hover:text-blue-900', // Contoh tombol outline
        ],
    ]
];
