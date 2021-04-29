<?php /* template name: Quem Somos */ ?>
<?php get_header() ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>
            <?php get_template_part('parts/header/header-page-interno') ?>
            <main class="main-site inner">
                <section class="content-iterno inner content-site">
                    <div class="container">
                        <?php the_content() ?>
                        <?php if(get_field('ativar_valores_da_empresa')): ?>
                            <div class="valores inner">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <h3> Missão </h3>
                                        <?= get_field('missao') ?>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h3> Visão </h3>
                                        <?= get_field('visao') ?>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h3> Valores </h3>
                                        <?= get_field('valor') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php get_template_part('parts/home/produtos-valenet') ?>
                    <?php get_template_part('parts/pages/bloco-localizacao-page') ?>
                </section>
            </main>
        <?php endwhile ?>
    <?php endif; ?>
<?php get_footer() ?>