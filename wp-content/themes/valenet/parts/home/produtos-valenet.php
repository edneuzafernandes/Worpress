<section class="produtos-valenet inner">
    <div class="container">
        <h4> Conheça cada um dos produtos Valenet </h4>
        <div class="produtos">
            <div class="item-produtos">
                <a href="<?= esc_url(home_url('tv')) ?>">
                    <picture>
                        <source srcset="<?= get_template_directory_uri() ?>/assets/images/prod-tv-mob.jpg" media="(max-width: 768px)">
                        <!-- <source srcset=""> -->
                        <img src="<?= get_template_directory_uri() ?>/assets/images/prod-tv.jpg" alt="">
                    </picture>
                </a>
                <header>
                    <h5 class="bgTitleTv"> Valenet TV </h5>
                    <div class="bgTv">
                        Assista aos seus canais favoritos
                    </div>
                </header>
            </div>
            <div class="item-produtos">
                <a href="<?= esc_url(home_url('telefone')) ?>">
                    <img src="<?= get_template_directory_uri() ?>/assets/images/prod-telefone.jpg" alt="">
                </a>
                <header >
                    <h5 class="bgTitleTel"> Telefone </h5>
                    <div class="bgTel">
                        Para falar o quanto quiser
                    </div>
                </header>
            </div>
            <div class="item-produtos">
                <a href="<?= esc_url(home_url('internet')) ?>">
                    <img src="<?= get_template_directory_uri() ?>/assets/images/prod-internet.jpg" alt="">
                </a>
                <header >
                    <h5 class="bgTitleNet"> Internet </h5>
                    <div class="bgNet">
                        100% Fibra Óptica
                    </div>
                </header>
            </div>
        </div>
    </div>
</section>