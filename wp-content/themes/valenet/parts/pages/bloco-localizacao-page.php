<?php if(get_field('ativar_localizacao')): ?>
<section class="localizacao inner">
    <div class="container mapa">
        <h3> <?= get_field('titulo_localizacao') ?> </h3>
        <div class="row mapa-bg align-items-center" style="background-image: url('<?= get_field('background_localizacao') ?>') ">
            <div class="col-md-5">
                <div class="text-mapa">
                    <?= get_field('descricao_localizacao') ?>
                </div>
                <a href="<?= esc_url(home_url('onde-estamos')) ?>" class="btn btn-site"> Onde estamos </a>
            </div>
        </div> 
    </div>
</section>
<?php endif; ?>