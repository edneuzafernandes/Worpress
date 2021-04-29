<?php /* Template name: Contato */ ?>
<?php get_header() ?>
    <?php get_template_part('parts/header/header-page-interno') ?>
    <main class="main-site">
        <div class="content-site inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="box-contato ">
                            <h3 class="text-right"> A Valenet está sempre pronta para ajudar você através dos nossos canais de comunicação. </h3>
                            <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]') ?>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="box-contato text-right">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/baloon.png" alt="">
                            <h4> Dúvidas? Confira nosso FAQ. </h4>
                            <a href="<?php echo esc_url( home_url( 'faq' ) ); ?>" class="btn btn-site"> Clique aqui </a>
                        </div>
                        
                        <div class="box-contato text-right">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/contato-icon.png" alt="">
                            <h4> Telefone útil. </h4>
                            <p>
                                Para adquirir nossos produtos, obter mais informações ou receber atendimento técnico, 
                                confira nosso telefone: <br>
                                Ligue - 106 38
                            </p>
                            
                        </div>

                        <div class="box-contato text-right">
                            <h4> Gostaria de trabalhar conosco? </h4>
                            <p> <a href="https://jobs.solides.com/valenet" target="_blank" class="btn btn-site"> Clique aqui </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer() ?>