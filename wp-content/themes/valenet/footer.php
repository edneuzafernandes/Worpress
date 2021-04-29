    <div class="pre-footer inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <h4> Fale com a Valenet </h4> 
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="contato-rodape">
                        <div class="icon-col">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/contato-icon.png" alt="">
                        </div>
                        <div>
                            <span class="titulo-contato"> Contato por telefone </span>
                            <p> O número é exclusivo e a ligação é gratuita. </p>
                            <h5> 106 38 </h5>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="contato-rodape">
                        <div class="icon-col">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/envelope.png" alt="">
                        </div>
                        <div>
                            <span class="titulo-contato"> Contato por e-mail </span>
                            <p> Envie suas dúvidas ou solicite informações através do formulário. </p>
                            <a href="<?= esc_url(home_url('contato')) ?>" class="btn btn-site"> Fale conosco </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="content-footer">
            <div class="colum-blue">
                <img src="<?= get_template_directory_uri() ?>/assets/images/logo_footer.png" alt="">
                <h5> <i class="icon icon-fone-contato"></i>  106 38 </h5>
                <div class="social-itens">
                    <a href="https://www.facebook.com/valenetoficial/"> <i class="icon icon-facebook"></i> </a>
                    <a href="https://www.instagram.com/valenet_oficial/"> <i class="icon icon-instagram"></i> </a>
                    <a href="https://www.linkedin.com/company/valenet/"> <i class="icon icon-linkedin"></i> </a>
                    <!--    <a href=""> <i class="icon icon-twitter"></i> </a>  -->
                    <a href="https://www.youtube.com/Valenetoficial"> <img src="<?= get_template_directory_uri() ?>/assets/images/youtube-logo.svg" style="width: 20px; height: auto; margin-bottom: 9px;"> </a>
                    <a href="https://api.whatsapp.com/send?phone=553138407100&text=Olá!">
                        <i class="icon icon-whatsapp"></i>
                    </a>
                </div>
            </div>
            <div class="colum-right">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('rodape-1') ) :?>
                <p class="msg-info">Gerencie seus Widgets pelo painel administrativo do Wordpress.</p>
            <?php endif; ?>
            
                <!-- <div class="colum-footer">
                    <ul>
                        <li> <a href=""> PLANOS </a> </li>
                        <li> <a href=""> Para você </a> </li>
                        <li> <a href=""> Para empresas </a> </li>
                        <li> <a href=""> Soluções Governamentais </a> </li>
                    </ul>
                    <ul>
                        <li> <a href=""> PLANOS </a> </li>
                        <li> <a href=""> Para você </a> </li>
                        <li> <a href=""> Para empresas </a> </li>
                        <li> <a href=""> Soluções Governamentais </a> </li>
                    </ul>
                </div> -->
                <!-- DIV assinatura -->
                <div class="assinatura-stalo">
                    <span>
                        &copy; Copyright 2018 - Todos os direitos reservados a Valenet -  Desenvolvido por - Stalo Comunicação <i class="icon icon-assinatura-stalo"></i>
                    </span>
                </div>
            </div>
            
        </div>
    </footer>
    <?php wp_footer() ?>
    <div id="chtflt" style="display:none"><script type="text/javascript">var chtfltUrl = "https://sac-valenet.ascbrazil.com.br/Chat"; var chtfltTitulo = "Atendimento Valenet"; var chtfltVarComplementar=""; var chtfltTema = "skin-blue"; var chtfltLanguage="pt-BR"; var chtfltRobo = "0"; var chtfltUrlImg="";</script><script type="text/javascript" src="https://sac-valenet.ascbrazil.com.br/public/chat/new/chatInline.js"></script><link rel="stylesheet" href="https://sac-valenet.ascbrazil.com.br/public/chat/new/chatInline.css"></div>
    </body>
</html>

