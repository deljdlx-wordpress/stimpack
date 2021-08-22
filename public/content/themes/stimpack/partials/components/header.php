<?php

$profileImage = get_theme_mod('menu-profile-image');
if(!$profileImage) {
    $profileImage = get_theme_file_uri('assets/img/profile-img.jpg');
}

$menuTitle = get_theme_mod('menu-title');
if(!$menuTitle) {
    $menuTitle = sp_get_site_title();
}

$menuBackgroundColor = get_theme_mod('menu-background-color');


?>

<!-- ======= Header ======= -->
<header id="header" style="background-color: <?=$menuBackgroundColor?>">
    <div class="d-flex flex-column">

        <div class="profile">
            <img src="<?=$profileImage?>" alt="" class="img-fluid rounded-circle menu-profile-image">
            <h1 class="text-light menu-title"><a href="<?=get_home_url()?>"><?=$menuTitle?></a></h1>
            <div class="social-links mt-3 text-center">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>

        <?php
            echo '<nav id="navbar" class="nav-menu navbar"><ul>';
                echo sp_get_menu('left', function($post) {
                    return '<li><a href="' . $post->url . '" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>' . $post->title . '</span></a></li>';
                });
            echo '</ul></nav>';
        ?>
    </div>
</header>