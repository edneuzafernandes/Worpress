<section class="banner-principal">
    <?php 
    $idPaginaCorrente = get_the_ID();
    if(have_rows('banners_principais', 'option')):
        while(have_rows('banners_principais', 'option')): the_row();
            $idPaginaEscolhida = get_sub_field('pagina');
            // campos do banner carregados
            $textoPrincipal = get_sub_field('texto_principal');
            $textoDestacado = get_sub_field('texto_destacado');
            // imagens banner
            $imagemBanner = get_sub_field('imagem_banner');
            $imagemMobile = get_sub_field('imagem_mobile');
            $imagemTablet = get_sub_field('imagem_tablet');
            // final das imagens
            $textoContratacao = get_sub_field('texto_de_contratacao');
            $telefoneBanner = get_sub_field('telefone_contato');
            // se o ID da página for igual ao ID da página corrente
            if($idPaginaCorrente == $idPaginaEscolhida):
                ?>
                <style>
                    .item-banner {
                        background-image: url('<?= $imagemBanner?>');
                    }

                    @media (max-width: 991px){
                        .item-banner {
                            background-image: url('<?= $imagemTablet?>');
                        }
                    }

                    @media (max-width: 575px){
                        .item-banner {
                            background-image: url('<?= $imagemMobile ?>');
                        }
                    }
                </style>
                <!-- colocar link no banner -->
                <a href="<?=$textoPrincipal?>">
                    <div class="item-banner">
                        <div class="text-banner">
                            <h1>
                                <?php // echo $textoPrincipal ?>
                                <small> <?php // echo $textoDestacado ?> </small>
                            </h1>
                            <h2>    
                                <?php // echo $textoContratacao ?> 
                                <small> <?php // echo $telefoneBanner ?> </small>
                            </h2>
                        </div>
                    </div>
                </a>
                     <!-- fim link no banner -->
                <?php
            endif;
        endwhile;
    endif;
    ?>
</section>