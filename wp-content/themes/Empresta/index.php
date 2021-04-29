<?Php get_header(); ?>
<div id="app">

<?php get_template_part('parts/menu-principal') ?>
    <div class="container" style="height:696px">

        <div class="row">
            <div class="col-12 col-md-5 col-xl-7 retanguloazul">
                <div class="search-store">
                    <h2 class="txt-title text-250-ll text-190 black-roboto mt-one-xs">Encontre a loja mais próxima de você</h2>

                    <div class="busca-loja">
                        <div class="form-group mb-two-xs">
                            <div class="row">
                                <div class="col-lg-7 col-8 col-sm-6"><input type="tel" aria-describedby="emailHelp" placeholder="Digite seu CEP ou cidade" class="form-control cep"></div>
                                <div class="col pl-none-xs"><button class="btn btn-primary text-140-ll full-height" style="width: 80%;"><span class="d-lg-none">Buscar</span><span class="d-none d-md-block">Buscar
                                            loja</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-xl-5 d-flex justify-content-center justify-content-md-end mapa">

                <?Php
                $args = array('post_type' => 'mapa');
                $query = new WP_Query($args);
                if ($query->have_posts()) :

                    while ($query->have_posts()) : $query->the_post();

                        the_content();

                    endwhile;
                endif;
                ?>
            </div>
        </div>

    </div>

    <div class="container bg-white" style="display: table; height:800px; padding-top:50px;">

        <div class="row">
            <img src="img/Grupo 157.svg" alt="">
            <div class="col-12 col-md-6 col-xl-6">

                <h2 class="title_resultado">Melhor Resultado</h2>
                <h6 style="color:#EF6C00;">4,5 <img src="<?php echo get_stylesheet_directory_uri() ?>/img/Icon ionic-ios-star.svg" alt=""><img src="<?php echo get_stylesheet_directory_uri() ?>/img/Icon ionic-ios-star.svg" alt=""><img src="img/Icon ionic-ios-star.svg" alt=""><img src="<?php echo get_stylesheet_directory_uri() ?>/img/Icon ionic-ios-star.svg" alt=""><img src="<?php echo get_stylesheet_directory_uri() ?>/img/Icon ionic-ios-star-half.svg" alt=""> <span style="color: #212121 !important">(327)</span></h6>
                <h1 class="txt-title-empresta">Empresta Belo Horizonte</h1>
                <h5 style="color:#EF6C00; font-weight:600"><span class="material-icons">location_on</span><span style="color: #212121 !important"> Av. Afonso Pena 1005, Loja 02 - Centro</span></h5>
                <h5 style="color:#EF6C00;"><span class="material-icons">phone_in_talk</span><span style="color: #212121 !important"> (31) 3239-1005</span></h5>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Domingo</td>
                            <td>Fechado</td>
                        </tr>
                        <tr style="font-weight: 600;">
                            <td>Segunda-feira</td>
                            <td>08h00 - 18h00</td>
                        </tr>
                        <tr>
                            <td>Terça-feira</td>
                            <td>08h00 - 18h00</td>
                        </tr>
                        <tr>
                            <td>Quarta-feira</td>
                            <td>08h00 - 18h00</td>
                        </tr>
                        <tr>
                            <td>Quinta-feira</td>
                            <td>08h00 - 18h00</td>
                        </tr>
                        <tr>
                            <td>Sexta-feira</td>
                            <td>08h00 - 18h00</td>
                        </tr>
                        <tr>
                            <td>Sábado</td>
                            <td>Fechado</td>
                        </tr>

                    </tbody>
                </table>

                <div class="form-group mb-two-xs">
                    <div class="row">

                        <div class="col pl-none-xs"><button class="btn btn-primary text-140-ll full-width full-height"><span class="d-lg-none">Buscar</span><span class="d-none d-md-block">Me ligue</span></button></div>
                        <div class="col pl-none-xs"><button class="btn btn-whatsapp text-140-ll full-width full-height"><span class="d-lg-none">WhatsApp</span><span class="d-none d-md-block">Falar pelo WhatsApp</span></button></div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-5 col-xl-5 d-flex justify-content-center justify-content-md-end img-loja">

            </div>
        </div>
    </div>
    <div class="bg-gray">
        <div class="container" style="display: table; height:600px; padding-top:50px;">

            <div class="row">

                <div class="col-12 col-md-8 col-xl-8">

                    <h2 class="title_resultado">Outras Lojas próximas</h2>
                    <h2 class="title_resultado"><strong>4 Resultados</strong> em Belo Horizonte</h2> <br>
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

                    <span><a href="<?php bloginfo('url')?>/lojas">Ver todas as lojas</a></span>
                    

                </div>
            </div>
        </div>

    </div>

    

<?php get_footer(); ?>