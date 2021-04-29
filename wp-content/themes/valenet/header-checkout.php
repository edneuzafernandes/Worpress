<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?= wp_title() ?> </title>
    <?php wp_head() ?>
</head>
<body>
    <header>
        <!-- Menu Principal -->
        <section id="menu-site" class="menu-checkout">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div>
                        <a class="navbar-brand" href="<?= esc_url( home_url( '/' ) ); ?>">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="">
                        <a href="<?= esc_url( home_url( '/' ) ); ?>" class="btn btn-site"> Voltar para o site </a>
                    </div>
                    <?php //get_template_part('parts/header/header-menu-principal') ?>
                </div>
            </nav>
        </section>
    </header>