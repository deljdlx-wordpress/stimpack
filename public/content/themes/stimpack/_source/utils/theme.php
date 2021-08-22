<?php



if(!function_exists('sp_register_css')) {
    function sp_register_css() {
        add_action(
            'wp_enqueue_scripts',
            function() {
                foreach(sp_get_configuration('THEME_CSS') as $index => $path) {
                    wp_enqueue_style('style-' . $index, sp_get_theme_file_uri($path));
                }
            }
        );
    }
}

if(!function_exists('sp_register_js')) {
    function sp_register_js() {
        add_action(
            'wp_enqueue_scripts',
            function() {
                foreach(sp_get_configuration('THEME_JS') as $index => $path) {
                    wp_enqueue_script(
                        'script-' . $index,
                        sp_get_theme_file_uri($path),
                        [],
                        false,
                        true
                    );
                }
            }
        );
    }
}

if(!function_exists('sp_register_supports')) {
    function sp_register_supports() {
        add_action(
            'after_setup_theme', // nom de l'event à surveiller
            function() {
                // wordpress va gérer la balise <title> du thème
                foreach(sp_get_configuration('THEME_SUPPORTS') as $index => $value) {
                    // DOC add_theme_support https://developer.wordpress.org/reference/functions/add_theme_support/
                    add_theme_support($value);
                }
            }
        );
    }
}


if(!function_exists('sp_get_template_part')) {
    function sp_get_template_part($slug, $args = []) {
        $buffer = '<!--SP-BLOCK id="' . $slug . '"//--><span class="sp-part sp-part-start" data-name="' . $slug . '"></span>';
        ob_start();
        get_template_part($slug, null, $args);
        $buffer .= ob_get_clean();

        $buffer .= '<span class="sp-part sp-part-end" data-name="' . $slug . '"></span><!--/SP-BLOCK//-->';

        return $buffer;
    }
}







if(!function_exists('sp_get_site_title')) {
    function sp_get_site_title() {
        // DOC get_bloginfo https://developer.wordpress.org/reference/functions/get_bloginfo/
        return get_bloginfo('name');
    }
}

if(!function_exists('sp_section')) {
    function sp_section($name, $args = []) {
        return sp_get_template_part(sp_get_path('SECTIONS') . '/' .$name, $args);
    }
}

if(!function_exists('sp_component')) {
    function sp_component($name, $args = []) {
        return sp_get_template_part(sp_get_path('COMPONENTS') . '/' .$name, $args);
    }
}

