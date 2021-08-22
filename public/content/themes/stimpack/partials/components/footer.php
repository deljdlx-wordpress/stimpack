<?php

$footerColor = get_theme_mod('menu-footer-color');

$footer0 = get_theme_mod('menu-footer-0');
if(!$footer0) {
    $footer0 = '&copy; Copyright <strong>iPortfolio</strong>';
}

$footer1 = get_theme_mod('menu-footer-1');
if(!$footer1) {
    /*
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
    */
    $footer1 = 'Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>';
}

?>

<footer id="footer" style="background-color: <?=$footerColor?>">
    <div class="container">
        <div class="copyright menu-footer-0">
            <?=$footer0?>
        </div>
        <div class="credits menu-footer-1">
                <?=$footer1?>
        </div>
    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><iclass="bi bi-arrow-up-short"></i></a>