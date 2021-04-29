<?php /* Template Name: Produtos para empresas */ ?>
<?php get_header() ?>
    <?php 
        if(have_posts()):
            while(have_posts()): the_post();
                get_template_part('parts/header/header-page-interno');
                ?>
                <main class="main-site">
                    <div class="content-site inner">
                        <div class="container">
                            <?php the_content(); ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        else:
        endif;
    ?>
<?php get_footer() ?>