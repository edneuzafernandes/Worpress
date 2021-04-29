<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php wp_title() ?> </title>
    
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

        })(window,document,'script','dataLayer','GTM-NHC2VGD');</script>
    <!-- End Google Tag Manager -->


    <?php wp_head() ?>

    <?php  verificaCookie(); ?>

</head>
<body>
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHC2VGD"

        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
        <!-- bartop -->
        <section class="bar-top">
            <div class="container">
                <?php get_template_part('parts/header/header-bar-top') ?>
            </div>
        </section>
        <!-- Menu Principal -->
        <section id="menu-site" class="menu-principal">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div>
                        <a class="navbar-brand" href="<?= esc_url( home_url( '/' ) ); ?>">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="btn-menu-responsive">
                        <div class="icon-bar"></div>
                    </div>
                    <?php get_template_part('parts/header/header-menu-principal') ?>
                    <?php get_template_part('parts/header/header-menu-responsive') ?>
                </div>
            </nav>
        </section>
    </header>