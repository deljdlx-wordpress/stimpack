<?php
$backgroundImage = get_theme_mod('hero-image');
if(!$backgroundImage) {
    $backgroundImage = get_theme_file_uri('assets/img/hero-bg.jpg');
}

$title = get_theme_mod('hero-title');
if(!$title) {
    $title = sp_get_site_title();
}

$heroText = get_theme_mod('hero-text');
if(!$heroText) {
    $heroText = sp_get_theme_mod_default_value('hero-text');
}


?>

<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
        <h1><span class="hero-title"><?=$title?></span></h1>
        <p><span class="hero-text"><?=$heroText?></span> <span class="typed hero-features-list" data-typed-items="<?=get_theme_mod('hero-features-list')?>"></span></p>
    </div>
</section><!-- End Hero -->