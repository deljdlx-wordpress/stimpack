<?php

if (!function_exists('sp_get_configuration')) {
    /**
     * @return []
     */
    function sp_get_configuration($key = null) {
        if(!$key) {
            return SP_THEME_CONFIGURATION;
        }
        else {
            return SP_THEME_CONFIGURATION[$key];
        }

    }
}


if (!function_exists('sp_get_theme_file_uri')) {
    function sp_get_theme_file_uri($path) {
        if(!preg_match('`^(:?http(:?s)?:)?//`', $path)) {
            $uri = get_theme_file_uri($path);
        }
        else {
            $uri = $path;
        }
        return $uri;
    }
}


if(!function_exists('sp_get_text_domain')) {
    function sp_get_text_domain() {
        return sp_get_configuration('TEXT_DOMAIN');
    }
}


if (!function_exists('sp_get_path')) {
    function sp_get_path($key) {
        return sp_get_configuration('PATHES')[$key];
    }
}
