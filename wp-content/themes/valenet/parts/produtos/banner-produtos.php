<section class="banner-produto " style="background-image: url(<?= get_the_post_thumbnail_url() ?>)">
    <div class="container <?= $bannerClass ?>">
        <h1> <?php the_title() ?> </h1>
        <div>
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumb">','</p>' );
                }
            ?>
        </div>
        <h2> <small> <?= get_field('texto_principal_banner') ?> </small> <?= get_field('descricao_principal_banner') ?>  </h2>
        <div class="row">
            <div class="col-md-3 texto-oferta">
                <?= get_field('mini_descricao') ?>
            </div>
            <?php $valor = get_field('valor'); //var_dump($valor) ?>
            <?php if(!empty($valor['valor'])): ?>
            <div class="col-md-3">
                <span class="price-begin"> A partir de </span>
                <h3 class="price-banner"> <?= $valor['valor'] ?>, <sup> <?= $valor['decimal'] ?> </sup> </h3>
            </div>
            <?php endif; ?>
        </div>
        <!-- CTAS -->
        <!-- <a href="" class="btn btn-tv btn-assine-produto btn-lg"> Assinar Agora </a> -->
        <!-- <a href="" class="btn btn-tv btn-tv-outline btn-lg"> Ver Canais </a> -->
    </div>
</section>