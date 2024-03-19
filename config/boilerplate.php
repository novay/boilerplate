<?php 

return 
[
    'name' => 'Boilerplate', 
    'description' => 'A starter kit for Laravel & Tailwind.', 

    # Enable the default settings
    'settings' => [
        'register' => true, 
        'language' => false, 
        'darkmode' => true
    ], 

    'route' => [
        'home' => 'dashboard'
    ], 

    'info' => [
        'icon' => '', 
        'copyright' => 'Boilerplate (Laravel Splade).', 
        'right' => 'All right reserved.', 
        'contact' => '628115555573'
    ], 

    'color' => [
        'label' => 'indigo', 
        'primary' => 'text-indigo-500'
    ], 

    'lang' => [
        'default' => 'id', 
        'available' => [
            'id' => 'Indonesian (ID)', 
            'en' => 'English (US)', 
        ]
    ], 

    'menu' => [
        'Beranda' => [
            // 'icon' => 'tabler:home', 
            'route' => 'panel.index', 
            'prefix' => 'panel.index', 
            'sub' => NULL
        ], 
        
        'Konfigurasi' => [
            // 'icon' => 'tabler:settings', 
            'route' => NULL, 
            'prefix' => 'panel.users.*', 
            'sub' => [
                'Konfigurasi' => 'separator', 
                'Pengguna' => [
                    // 'icon' => 'tabler:user-circle', 
                    'route' => 'panel.users.index', 
                    'prefix' => 'panel.users.*'
                ],
            ]
        ], 
    ]
];