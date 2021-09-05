<?php

define('SP_CONFIGURATION_CONSTANT_NAME', 'SP_THEME_CONFIGURATION');

define(SP_CONFIGURATION_CONSTANT_NAME, [
    'PATHES' => [
        'PARTIALS' => 'public/partials',
        'MENUS' => 'public/partials/menus',
        'SECTIONS' => 'public/partials/sections',
        'COMPONENTS' => 'public/partials/components',
        'ASSETS' => 'public/assets',
    ],

    'TEXT_DOMAIN' => 'stimpack',
    'THEME_CSS' => [
        "https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i",
        "assets/vendor/aos/aos.css",
        "assets/vendor/bootstrap/css/bootstrap.min.css",
        "assets/vendor/bootstrap-icons/bootstrap-icons.css",
        "assets/vendor/boxicons/css/boxicons.min.css",
        "assets/vendor/glightbox/css/glightbox.min.css",
        "assets/vendor/swiper/swiper-bundle.min.css",
        "assets/css/style.css",
        "assets/css/custom.css",
    ],

    'THEME_JS' => [
        "assets/vendor/aos/aos.js",
        "assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
        "assets/vendor/glightbox/js/glightbox.min.js",
        "assets/vendor/isotope-layout/isotope.pkgd.min.js",
        "assets/vendor/php-email-form/validate.js",
        "assets/vendor/purecounter/purecounter.js",
        "assets/vendor/swiper/swiper-bundle.min.js",
        "assets/vendor/typed.js/typed.min.js",
        "assets/vendor/waypoints/noframework.waypoints.js",
        "assets/js/main.js",
    ],

    'THEME_SUPPORTS' =>[
        'title-tag',
        'post-thumbnails',
        'menus',
    ],

    'MENU_LOCATIONS' => [
        'left' => 'Left main menu'
    ],


    'MENUS' => [
        'main' => [
            'location' => 'left',
        ]
    ],
    'SIDEBARS' => [
        'main' => [
            'name' => "Main zone",
            'before_widget' => '<div class="site__sidebar__widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<p class="site__sidebar__widget__title">',
            'after_title' => '</p>',
        ],
        'left' => [
            'name' => "Left zone",
            'before_widget' => '<div class="site__sidebar__widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<p class="site__sidebar__widget__title">',
            'after_title' => '</p>',
        ],
    ],

    'CUSTOMIZERS' => [
        'SECTIONS' => [
            'hero-variables' => [
                'label' => 'Hero customization',
                'variables' => [
                    'hero-image' => [
                        'component' => WP_Customize_Image_Control::class,
                        'default' => get_theme_file_uri('assets/img/hero-bg.jpg'),
                        'label' => 'Hero image',
                        'selector' => '#hero',
                    ],

                    'hero-title' => [
                        'component' => WP_Customize_Control::class,
                        'label' => 'Hero title',
                        'selector' => '.hero-container h1',
                    ],

                    'hero-text' => [
                        'component' => WP_Customize_Control::class,
                        'default' => 'Your Wordpress',
                        'label' => 'Hero subtitle',
                        'selector' => '.hero-text',
                    ],
                    'hero-features-list' => [
                        'component' => WP_Customize_Control::class,
                        'default' => 'with more flexibility, with less pain, definitively with more dps',
                        'label' => 'Features list',
                        'selector' => '.hero-text',
                    ],
                ],
            ],

            'menu-variables' => [
                'label' => 'Menu customization',
                'variables' => [

                    'menu-profile-image' => [
                        'component' => WP_Customize_Image_Control::class,
                        'label' => 'Menu image',
                        'selector' => '.profile',
                    ],

                    'menu-title' => [
                        'component' => WP_Customize_Control::class,
                        'label' => 'Menu title',
                        'selector' => '.menu-title',
                        'default' => 'Stimpack'
                    ],

                    'menu-background-color' => [
                        'component' => WP_Customize_Color_Control::class,
                        'default' => '#040b14',
                        'label' => 'Menu background color',
                        'selector' => '#header'
                    ],

                    'menu-footer-color' => [
                        'component' => WP_Customize_Color_Control::class,
                        'default' => '#040B14',
                        'label' => 'Menu footer background color',
                        'selector' => '#footer'
                    ],


                    'menu-footer-0' => [
                        'component' => WP_Customize_Control::class,
                        'label' => 'HTML for menu footer 0',
                        'selector' => '.menu-footer-0',
                    ],

                    'menu-footer-1' => [
                        'component' => WP_Customize_Control::class,
                        'label' => 'HTML for menu footer 1',
                        'selector' => '.menu-footer-1',
                    ],

                ],
            ],



            'theme-colors' => [
                'label' => 'Theme colors',
                'variables' => [

                ],
            ],
        ],
        'JS' => [
            'admin/customizers.js'
        ],
        'CSS' => [
            'admin/customizers.css'
        ]

    ],
]);
