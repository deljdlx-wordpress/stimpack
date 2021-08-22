<?php
require get_theme_file_path('_source/utils/utils.php');
require get_theme_file_path('_source/utils/customizer.php');
require get_theme_file_path('_source/utils/theme.php');
require get_theme_file_path('_source/utils/menu.php');
require get_theme_file_path('_source/utils/sidebar.php');
require get_theme_file_path('_source/utils/post.php');


// used to avoid linter alert
if(false) {
    define('SP_THEME_CONFIGURATION', []);
}


sp_register_supports();
sp_register_css();
sp_register_js();

sp_register_menu_locations();
sp_register_menus();

sp_register_sidebars();


sp_intializeCustomizers();
sp_register_customizers();
