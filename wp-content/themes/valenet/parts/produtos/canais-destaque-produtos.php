<?php if(have_rows('banners_destaque')): ?>
    <section class="canais-destaque">
        <?php  
            if(have_rows('banners_destaque')){
                $countBanner = 1;
                while(have_Rows('banners_destaque')){ the_row();
                    if($countBanner == 1){
                        $classeCol = 'col-full';
                        //$bannerBg = "background-image: url('".get_sub_field('imagem_banner')."')";
                    } else if($countBanner > 3 ) {
                        $classeCol = 'coll-50';
                        // $bannerBg = "";
                    }
                    ?>
                        <div class="col-canais-1 <?= $classeCol ?>" style="">
                            <?php //if($countBanner != 1): ?>
                                <img src="<?= get_sub_field('imagem_banner') ?>" alt="<?= get_sub_field('titulo_banner_destaque') ?>">
                            <?php //endif; ?>
                            <div class="overlay" style="color: <?= get_sub_field('cor_do_texto') ?>">
                                <h4 style="color: <?= get_sub_field('cor_do_texto') ?>"> <?= get_sub_field('titulo_banner_destaque') ?> </h4>
                                <?= get_sub_field('descricao_banner_destaque') ?>
                            </div>
                        </div>
                    <?php
                    $countBanner++;
                }
            }
        ?>
    </section>
<?php endif; ?>