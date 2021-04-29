<?php /* Template Name: Onde estamos */  ?>
<?php get_header() ?>
    <?php 
        if(have_posts()):
            while(have_posts()): the_post();
                get_template_part('parts/header/header-page-interno') 
                ?>
                <main class="main-site">
                    <div class="content-site inner">
                        <div class="container">
                            <?php the_content() ?>
                        </div>
                    </div>
                </main>
                <section class="mapa-pin">
                <?php if( have_rows('adicionar_loja', 'option') ): ?>
                    <div class="acf-map">
                        <?php while ( have_rows('adicionar_loja', 'option') ) : the_row(); 

                            $location = get_sub_field('endereco');
                            // var_dump($location );
                            ?>
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                                <h4><?= the_sub_field('loja') ?></h4>
                                <p class="address"><?php echo $location['address']; ?></p>
                                <p><?php the_sub_field('telefone'); ?></p>
                            </div>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15004.565399192972!2d-43.92778298226319!3d-19.91844748499655!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1547215311266" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                </section>
                <?php get_template_part('parts/pages/lojas-pages') ?>
                <?php 
            endwhile;
        else:
        endif;
    ?>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMqS-kXVh4Qk7n9Om9KkbwpoEnUmK41i8"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1OeYg9-8ryvyZukGaLX59ypygqYFTByk"></script>
<?php get_footer() ?>