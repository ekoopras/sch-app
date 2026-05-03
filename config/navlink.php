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
            'label' => 'Profil',
            'url' => 'profil',
            'type' => 'dropdown',
            'child' => [
                [
                    'label' => 'Sambutan Dan Profil Kepala Sekolah',
                    'url' => 'sambutan-dan-profil-kepala-sekolah'
                ],
                [
                    'label' => 'Visi & Misi',
                    'url' => 'visi-misi'
                ],
                [
                    'label' => 'Selayang Pandang',
                    'url' => 'selayang-pandang'
                ],
                [
                    'label' => 'Tenaga Pendidikan',
                    'url' => 'tenaga-pendidikan'
                ]
            ]
        ],

        [
            'id' => 3,
            'label' => 'Layanan Publik',
            'url' => 'layanan-publik',
            'type' => 'dropdown',
            'child' => [
                [
                    'label' => 'Alur layanan',
                    'url' => 'alur-layanan'
                ],
                [
                    'label' => 'Survey Kepuasan Layanan',
                    'url' => 'survey-kepuasan-layanan'
                ],
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
            'url' => 'ppdb-2026', // Nama route
            'class' => 'bg-pink-500 hover:bg-pink-700',
        ],

        [
            'label' => 'Login',
            'url' => 'sch-admin',
            'class' => 'border border-white hover:bg-white hover:text-blue-900', // Contoh tombol outline
        ],
    ]
];
