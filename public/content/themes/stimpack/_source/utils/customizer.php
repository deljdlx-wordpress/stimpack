<?php

function sp_registerCustomizer($optionsOrVariableName, $componentTypeOrOptions = null)
{

    $defaultOptions = [
        'sectionName' => 'custom-section-default',
        'sectionLabel' => 'Theme options',

        'sectionPriority' => 300,
        'componentType' => WP_Customize_Control::class,

        'variableName' => 'hero-text-0',
        'variableDefaultValue' => '',

        'componentType' => WP_Customize_Control::class,
        'componentLabel' => 'Configure',
        'cssSelector' => null,
    ];

    if(is_array($optionsOrVariableName)) {
        $options = array_merge($defaultOptions, $optionsOrVariableName);
    }
    else {
        $options = $defaultOptions;
        $options['variableName'] = $optionsOrVariableName;

        if(is_array($componentTypeOrOptions)) {
            $options = array_merge($options, $componentTypeOrOptions);
        }
    }


    add_action(
        'customize_register',
        function (WP_Customize_Manager $themeCustomizerObject) use ($options)
        {

            // ==========================================================================================

            $customSectionName = $options['sectionName'];
            $sectionLabel = $options['sectionLabel'];
            $sectionPriority = $options['sectionPriority'];

            $customizableVariableName = $options['variableName'];
            $defaultValue = $options['variableDefaultValue'];

            $componentToUse = $options['componentType'];
            $componentLabel = $options['componentLabel'];

            $componentName = $options['variableName'] . '-selector';

            $customizerButtonCssSelector = $options['cssSelector'];

            // ==========================================================================================

            $themeCustomizerObject->add_section(
                $customSectionName,
                [
                    'title' => __($sectionLabel),
                    'priority' => $sectionPriority
                ]
            );

            $themeCustomizerObject->add_setting(
                $customizableVariableName,
                [
                    'default' => $defaultValue,
                    'transport' => 'postMessage'
                ]
            );

            $themeCustomizerObject->add_control(
                new $componentToUse(
                    $themeCustomizerObject,
                    $componentName,
                    [
                        'label' => __($componentLabel),
                        'section' => $customSectionName,
                        'settings' => $customizableVariableName,
                    ]
                )
            );

            $themeCustomizerObject->selective_refresh->add_partial(
                $customizableVariableName,
                [
                    'selector' => $customizerButtonCssSelector,
                    'fallback_refresh' => false,
                ]
            );
        }
    );


    if(isset($options['js']) && get_theme_file_path($options['js'])) {

        add_action(
            'customize_preview_init',
            function () use ($options)
            {

                $variableName = $options['variableName'];
                wp_enqueue_script(
                    $variableName . '-js',
                    get_theme_file_uri($options['js']),
                    ['customizer-loader'], // gestion des dépendances,
                    false,
                    true // nous demandons à wp de mettre le javascript dans le footer
                );
            }
        );
    }
}

// ========================================================================================

function sp_registerCustomizerControl($controlName, $optionsOrVariableName, $componentTypeOrOptions = null)
{
    if(is_array($optionsOrVariableName)) {
        $optionsOrVariableName['componentType'] = $controlName;
    }
    else {
        $componentTypeOrOptions = $controlName;
    }
    return sp_registerCustomizer($optionsOrVariableName, $componentTypeOrOptions);
}


function sp_registerImageCustomizer($optionsOrVariableName, $componentTypeOrOptions = null)
{
    return sp_registerCustomizerControl(WP_Customize_Image_Control::class, $optionsOrVariableName, $componentTypeOrOptions);
}

function sp_registerCodeCustomizer($optionsOrVariableName, $componentTypeOrOptions = null)
{
    return sp_registerCustomizerControl(WP_Customize_Code_Editor_Control::class, $optionsOrVariableName, $componentTypeOrOptions);
}

function sp_registerTextCustomizer($optionsOrVariableName, $componentTypeOrOptions = null)
{
    return sp_registerCustomizerControl(WP_Customize_Control::class, $optionsOrVariableName, $componentTypeOrOptions);
}

// ========================================================================================



if(!function_exists('sp_register_customizers')) {
    function sp_register_customizers() {
        foreach(sp_get_configuration('CUSTOMIZERS')['SECTIONS'] as $sectioName => $section) {

            $options = [
                'sectionName' => $sectioName,
                'sectionLabel' => $section['label'],
            ];

            foreach($section['variables'] as $variableName => $variable) {

                $defaultOptions = [
                    'default' => null,
                    'label' => 'Variable name',
                    'selector' => null,
                    'js' => null
                ];

                $variable = array_merge(
                    $defaultOptions,
                    $variable
                );

                $options['variableName'] = $variableName;
                $options['variableDefaultValue'] = $variable['default'];
                $options['componentLabel'] = $variable['label'];
                $options['cssSelector'] = $variable['selector'];
                $options['js'] = $variable['js'];
                sp_registerCustomizerControl($variable['component'], $options);
            }
        }

        foreach(sp_get_configuration('CUSTOMIZERS')['JS'] as $index => $js) {
            if(get_theme_file_path($js)) {

                add_action(
                    'customize_preview_init',
                    function () use ($index, $js) {
                        wp_enqueue_script(
                            'customizer-' . $index . '-js',
                            get_theme_file_uri($js),
                            ['customizer-loader'], // gestion des dépendances,
                            false,
                            true // nous demandons à wp de mettre le javascript dans le footer
                        );
                    }
                );
            }
        }

        foreach(sp_get_configuration('CUSTOMIZERS')['CSS'] as $index => $css) {
            if(get_theme_file_path($css)) {

                add_action(
                    'customize_preview_init',
                    function () use ($index, $css) {
                        wp_enqueue_style(
                            'customizer-' . $index . '-css',
                            get_theme_file_uri($css),
                        );
                    }
                );
            }
        }
    }
}


if(!function_exists('sp_intializeCustomizers')) {
    function sp_intializeCustomizers()
    {
        add_action(
            'customize_preview_init',
            function () {
                wp_enqueue_style(
                    'customizer-style',
                    get_theme_file_uri('_source/assets/customizer/customizer.css'),
                );

                wp_enqueue_script(
                    'customizer-loader',
                    get_theme_file_uri('_source/assets/customizer/customizer-loader.js'),
                    [], // gestion des dépendances,
                    false,
                    true // nous demandons à wp de mettre le javascript dans le footer
                );
            }
        );
    }
}


if(!function_exists('sp_get_theme_mod_default_value')) {
    function sp_get_theme_mod_default_value($name) {
        foreach(sp_get_configuration('CUSTOMIZERS')['SECTIONS'] as $sectioName => $section) {

            foreach($section['variables'] as $variableName => $variable) {
                if($variableName == $name) {

                    if(array_key_exists('default', $variable)) {
                        return $variable['default'];
                    }
                    return null;
                }
            }
        }
    }
}
