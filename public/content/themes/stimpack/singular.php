<?php
the_post();


$backgroundImage = sp_get_post_thumbnail();

?>
<!DOCTYPE html>
<html lang="<?=get_bloginfo('language')?>">

<head>
    <?php get_header();?>
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <?=sp_component('header');?>




        <article>
            <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="background-image: url(<?=$backgroundImage?>)">
                <div class="hero-container" data-aos="fade-in">
                    <h1><span class="hero-title"><?=get_the_title()?></span></h1>
                    <p><span class="hero-text"></span></p>
                </div>
            </section>

            <section>
                <div class="container">
                    <?=get_the_content()?>
                </div>
            </section>
        </article>





    <main id="main">


        <aside class="site__sidebar">
        	<ul>
            	<?php dynamic_sidebar('main');?>
            </ul>
        </aside>



        <!-- ======= About Section ======= -->
        <?php
        // echo sp_section('about');
        // echo sp_section('facts');
        // echo sp_section('skills');
        // echo sp_section('resume');
        // echo sp_section('portofolio');
        // echo sp_section('services');
        // echo sp_section('testimonials');
        // echo sp_section('contact');
        ?>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?=sp_component('footer');?>


    <?php get_footer();?>

</body>

</html>