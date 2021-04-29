<main class="main-site">
    <div class="content-site inner">
        <div class="container">
            <h3 class="text-center">
            Lojas e escritórios
            </h3>
            <p class="text-center">
                São pontos estratégicos, entre lojas e escritórios, para atender você quando, 
                como e onde você precisar.
            </p>
            <div class="row">
                <?php 
                if(have_rows('adicionar_loja', 'option')){
                    while(have_rows('adicionar_loja', 'option')) { the_row();
                        $location = get_sub_field('endereco');
                        ?>
                            <div class="col-md-3 colum-lojas">
                                <img src="<?= get_template_directory_uri() ?>/assets/images/loja-icon.png" alt="">
                                <h4> <?= the_sub_field('loja') ?> </h4>
                                <?php echo $location['address']; ?>
                                <?= the_sub_field('telefone') ?>
                            </div>
                        <?php
                    }
                }
                ?>
                
            </div>
        </div>
    </div>
</main>