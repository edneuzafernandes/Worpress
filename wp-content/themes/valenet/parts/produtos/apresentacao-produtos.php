<div id="apresentacao" class="container apresentacao-produto-tv inner">
    <div class="row align-items-center">
        <div class="col-md-6 text-right">
            <h5> <?= get_field('titulo_apresentacao') ?></h5>
            <div>
            <?= get_field('mini_descricao_apresentacao') ?>
            </div>
            <?php if(get_field('cta_textos')): ?>
            <p><a href="" class="btn btn-price-produto"> Ver todos os canais </a></p>
            <?php endif ?>
            <img src="<?= get_field('imagem_menor') ?>" alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
            <img src="<?= get_field('imagem_lateral') ?>" alt="" class="img-fluid">
        </div>
    </div>
</div>