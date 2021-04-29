<section class="banner-interno" style="background-image: url(<?= get_the_post_thumbnail_url() ?>)">
    <div class="container">
        <h1> 
            <?php 
                if(is_page()):
                    the_title();
                else:
                    post_type_archive_title();
                endif; 
            ?> 
        </h1>
        <div>
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumbs">','</p>' );
                }
            ?>
        </div>
        <h2> <?= get_field('texto_banner_interno') ?> </h2>
    </div>
</section>