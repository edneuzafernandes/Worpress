<?php if(have_rows('vantagens_produtos')): ?>
<!-- Vantagens -->
<section class="main-produto <?= $mainClasse ?> vantagens main-site inner">
    <div class="content-site content-produto">
        <div class="container">
            <?php 
            if(have_rows('vantagens_produtos')){
                while(have_rows('vantagens_produtos')){ the_row();
                    ?>
                        <h5> <span> <?php the_sub_field('titulo_principal') ?> </span> </h5>
                    <?php
                    if(have_rows('topicos')){
                        echo '<div class="list-vantagens">';
                        while(have_rows('topicos')){ the_row();
                            ?>
                            <div class="item-vantagem">
                                <h6> <?= get_sub_field('titulo_topico') ?> </h6>
                                <?= get_sub_field('descricao') ?>
                            </div>
                            <?php
                        }
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
<!-- /Vantagens -->
<?php endif; ?>