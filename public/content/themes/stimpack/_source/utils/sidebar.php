<?php

if(!function_exists('sp_register_sidebars')) {
    function sp_register_sidebars()
    {
        foreach(sp_get_configuration('SIDEBARS') as $id => $sidebar) {
            register_sidebar( array(
                'id' => $id,
                'name' => $sidebar['name'],
                'before_widget'  => $sidebar['before_widget'],
                'after_widget'  => $sidebar['after_widget'],
                'before_title' => $sidebar['before_title'],
                'after_title' => $sidebar['after_title'],
            ) );
        }
    }
}
