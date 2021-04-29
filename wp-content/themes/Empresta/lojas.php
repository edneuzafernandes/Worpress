<?php
get_header();
?>

<div class="bg-gray">
        <div class="container" style="display: table; height:600px; padding-top:50px;">

            <div class="row">

                <div class="col-12 col-md-8 col-xl-8">

                    <h2 class="title_resultado">Confira todas as lojas da Franquia</h2>
                    <h2 class="title_resultado"><strong>2 Resultados</strong> em Belo Horizonte</h2> <br>
                    <?Php
                    $args = array('post_type' => 'lojas');
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :

                        while ($query->have_posts()) : $query->the_post();
                            echo '<div class="box-loja">';
                            echo '<div style="float:left;">';
                            the_post_thumbnail();
                            echo '</div>';

                            echo '<div class="" style="float:left;">';
                    ?>
                            <h6 class="margin-10-20-0-orange">4,5 <img src="<?php echo get_stylesheet_directory_uri() ?>/img/Icon ionic-ios-star.svg" alt=""><img src="<?php echo get_stylesheet_directory_uri() ?>/img/Icon ionic-ios-star.svg" alt=""><img src="img/Icon ionic-ios-star.svg" alt=""><img src="<?php echo get_stylesheet_directory_uri() ?>/img/Icon ionic-ios-star.svg" alt=""><img src="<?php echo get_stylesheet_directory_uri() ?>/img/Icon ionic-ios-star-half.svg" alt=""> <span style="color: #212121 !important">(327)</span>
                            </h6>
                    <?Php
                            the_title('<h4 class="margin-20-20-0">', '</h4>');

                            echo '<h5 class="margin-10-20-0">';
                            the_content();
                            echo '</h5>';
                            echo '</div>';


                            echo '<div class="form-group mb-two-xs" style="padding-top:10%">
                                <div class="row">
    
                                    <div class="col pl-none-xs"><button class="btn btn-primary text-140-ll full-width full-height"><span class="d-none d-md-block">Me ligue</span></button></div>
    
                                </div>
                            </div>';
                            echo '</div>';

                        endwhile;


                    endif;

                    ?>

                    <span><a href="">Ver todas as lojas</a></span>

                </div>
            </div>
        </div>

    </div>

<?Php
require_once 'footer.php';