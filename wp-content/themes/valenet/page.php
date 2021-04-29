<?php get_header() ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>
            <?php get_template_part('parts/header/header-page-interno') ?>
            <main class="main-site inner">
                <section class="content-iterno inner content-site">
                    <div class="container">
                        <?php the_content() ?>
                    </div>
                    
                    <?php get_template_part('parts/home/produtos-valenet') ?>
                    <?php get_template_part('parts/pages/bloco-localizacao-page') ?>
                </section>
            </main>
        <?php endwhile ?>
    <?php endif; ?>
<?php get_footer() ?>