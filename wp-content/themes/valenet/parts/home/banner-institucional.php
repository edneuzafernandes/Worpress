<?php
    $idPaginaCorrente = get_the_ID();
    if(have_rows('banners_institucional', 'option')):
        while(have_rows('banners_institucional', 'option')): the_row();
            $idPaginaEscolhida = get_sub_field('pagina');
            // campos do banner carregados
            $textoPrincipal     = get_sub_field('texto_principal');
            $textoDestacado     = get_sub_field('texto_destacado');
            $imagemBanner       = get_sub_field('imagem_banner');
            $textoContratacao   = get_sub_field('texto_cta');
            $linkCta            = get_sub_field('link');
            $posicaoTexto       = get_sub_field('posicao_do_texto');
            // se o ID da página for igual ao ID da página corrente
            if($idPaginaCorrente == $idPaginaEscolhida):
                if($posicaoTexto == 2):
                    $bgDegrade = "bg-degrade-right";
                    $classeTexto = 'offset-md-7 text-right';
                else:
                    $bgDegrade = "bg-degrade";
                    $classeTexto = '';
                endif;
                ?>
                    <section class="banner-institucional-1" style="background-image: url('<?= $imagemBanner ?>')">
                        <div class="<?= $bgDegrade ?>">
                            <div class="container content-banner">
                                <div class="row">
                                    <div class="col-md-5 <?= $classeTexto ?>">
                                        <h4> <?= $textoPrincipal ?></h4>
                                        <p>
                                            <?= $textoDestacado ?>
                                        </p>
                                        <?php 
                                        if($textoContratacao && $linkCta):
                                        endif;
                                        ?>
                                        <a href="<?= $linkCta ?>" class="btn btn-banner-institucional btn-lg"> <?= $textoContratacao ?> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
            endif;
        endwhile;
    endif;
?>


<!-- <section class="banner-institucional-1" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/banner-institucional2.jpg')">
    <div class="container content-banner">
        <div class="row">
            <div class="col-md-5 offset-md-7 text-right">
                <h4> Soluções diferenciadas para a sua empresa </h4>
                <p>
                    A Valenet é a 5ª melhor provedora de internet no ranking da Anatel no Brasil. 
                    São mais de 40 cidades mineiras atendidas com o que há de melhor em serviços 
                    de telecomunicação.
                </p>
                <a href="" class="btn btn-banner-institucional btn-lg"> Conheça nossas soluções </a>
            </div>
        </div>
    </div>
</section> -->




