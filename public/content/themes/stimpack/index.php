<!DOCTYPE html>
<html lang="<?=get_bloginfo('language')?>">

<head>
    <?php get_header();?>
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <?=sp_component('header');?>

    <!-- ======= Hero Section ======= -->
    <?=sp_section('hero');?>

    <main id="main">

        <!--
        <section style="position: absolute; width:100vw; height: 100vh; top: 0; left: 300px; z-index: 1000; background-color:#fff">
            <pre id="editor" style="width:100vw; height: 100vh;"></pre>
            <script src="<?=get_theme_file_uri('_source/ace/build/src-noconflict/ace.js')?>"></script>
            <script src="<?=get_theme_file_uri('_source/ace/build/src-noconflict/ext-language_tools.js')?>"></script>
            <script>
                // trigger extension
                ace.require("ace/ext/language_tools");
                var editor = ace.edit("editor");
                editor.session.setMode("ace/mode/html");
                editor.setTheme("ace/theme/monokai");
                editor.session.setMode("ace/mode/php");
                // enable autocompletion and snippets
                editor.setOptions({
                    enableBasicAutocompletion: true,
                    enableSnippets: true,
                    enableLiveAutocompletion: false
                });
            </script>
        </section>
        //-->



        <?php
        while(have_posts()) {
            the_post();

            // echo get_the_title();
            // echo '<br/>';

        }
        ?>



        <aside class="site__sidebar">
        	<ul>
            	<?php dynamic_sidebar('main');?>
            </ul>
        </aside>






        <!-- ======= About Section ======= -->
        <?php
        // sp_section('about');
        //sp_section('facts');
        // sp_section('skills');
        // sp_section('resume');
        // sp_section('portofolio');
        // sp_section('services');
        // sp_section('testimonials');
        // sp_section('contact');
        ?>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?=sp_component('footer');?>


    <?php get_footer();?>

</body>

</html>