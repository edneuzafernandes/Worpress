<?php get_header('checkout') ?>

<script data-require="bootstrap@*" data-semver="3.3.1" src="/wp-content/themes/valenet/assets/js/montar/lib/bootstrap4/js/bootstrap.min.js"></script>
    <script data-require="angular.js@*" data-semver="1.4.0-beta.3" src="/wp-content/themes/valenet/assets/js/montar/lib/angular.js"></script>

    <script src="/wp-content/themes/valenet/assets/js/montar/lib/bootbox.js"></script>
    <script src="/wp-content/themes/valenet/assets/js/montar/lib/ngBootbox.js"></script>
    
    <script type="text/javascript" src="/wp-content/themes/valenet/assets/js/montar/lib/jquery.mask.js"></script>
    <script type="text/javascript" src="/wp-content/themes/valenet/assets/js/montar/lib/vanilla-masker.min.js"></script>
  

<script type='text/javascript' src='/wp-content/themes/valenet/assets/js/montar/montar.js?serial=<?=time()?>'></script>


<?php 
    $iniciaTeste = new produtosValeNet();
            
    //var_dump($iniciaTeste);
    
    $idCidade = $_COOKIE['cidade'];
    $idCidadeCorrente = $iniciaTeste->CapturaCidade($idCidade);
    $idDistrito = $_COOKIE['distrito'];
    $idDistritoCorrente = $iniciaTeste->CapturaDistrito($idCidadeCorrente, $idDistrito);
?>
<script>
    var apiUrl = '<?= $iniciaTeste->variavel ?>/servicos/<?=$idDistritoCorrente?>';
    var produto_selecionado = '<?=isset($_GET['produtoId']) ? $_GET['produtoId'] : null?>';
</script>
    <main ng-app="app" ng-controller="MontarController as produtos">
        
        <section class="monta-combos inner" >
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- box montagem de planos -->
                        <div id="accordion" class="checkout">
                        <div class="card">
                                <div class="card-header" role="tab" id="section1HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-toggle="collapse" data-target="#collapse_internet" aria-expanded="true" aria-controls="collapse_internet">
                                            Internet
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse_internet" class="collapse show" aria-labelledby="heading_internet" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="resumo-combo">
                                            <div class="composicao">
                                                <div class="box-contrato" ng-repeat="item in pricelist.broadband">
                                                    <div>{{item.name}}</div>
                                                    <div>
                                                        <span ng-repeat="detail in item.Atributos">
                                                            {{detail.chave}} {{detail.valor}}<br/>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class='btn btn-adiciona-resumo-old btn-site' ng-click="select_product('internet',item)"> Adicionar </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>



                             <div class="card">
                                <div class="card-header" role="tab" id="section2HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-toggle="collapse" data-target="#collapse_phone" aria-expanded="true" aria-controls="collapse_phone">
                                            Telefone
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse_phone" class="collapse" aria-labelledby="heading_phone" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="resumo-combo">
                                            <div class="composicao">
                                                <div class="box-contrato" ng-repeat="item in pricelist.phone">
                                                    <div>{{item.name}}</div>
                                                    <div>
                                                        <span ng-repeat="detail in item.Atributos">
                                                            {{detail.chave}} {{detail.valor}}<br/>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class='btn btn-adiciona-resumo-old btn-site' ng-click="select_product('phone',item)"> Adicionar </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>


                             

                             <div class="card">
                                <div class="card-header" role="tab" id="section3HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-toggle="collapse" data-target="#collapse_tva" aria-expanded="true" aria-controls="collapse_tva">
                                            TV
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse_tva" class="collapse" aria-labelledby="heading_tva" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="resumo-combo">
                                            <div class="composicao">
                                                <div class="box-contrato" ng-repeat="item in pricelist.tv">
                                                    <div>{{item.name}}</div>
                                                    <div>
                                                    <span ng-repeat="detail in item.Atributos">
                                                            {{detail.chave}} {{detail.valor}}<br/>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class='btn btn-adiciona-resumo-old btn-site' ng-click="select_product('tva',item)"> Adicionar </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>


                            <div class="card">
                                <div class="card-header" role="tab" id="section4HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-toggle="collapse" data-target="#collapse_acessorios" aria-expanded="true" aria-controls="collapse_acessorios">
                                            Acess??rios
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse_acessorios" class="collapse" aria-labelledby="heading_acessorios" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="resumo-combo">
                                            <div class="composicao">
                                                <div class="box-contrato" ng-repeat="item in pricelist.accessories">
                                                    <div>{{item.name}}</div>
                                                    <div>
                                                    <span ng-repeat="detail in item.Atributos">
                                                            {{detail.chave}} {{detail.valor}}<br/>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button class='btn btn-adiciona-resumo-old btn-site' ng-click="select_product('acessorios'+item.id,item)"> Adicionar </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>


                        </div>
                    </div>
                    <!-- form finaliza????o -->
                    <div class="col-md-4">
                    <div class="resumo-combo">
    <header>
        Resumo do combo {{$scope.selected_products}}
    </header>
    <div class="composicao form-finaliza">
    <div class="box-contrato resumo-item" ng-repeat="tp in get_tipos_produtos()" ng-show="selected_products[tp]!=null">
        <div class="title">
        {{selected_products[tp].name}} 
        </div>
        <div class="price rows-price"> 
            <span> {{show_price(tp)  | number: 2}}</span> POR M??S </div><div> 
                <a href="#" ng-click="removeItem(tp)"> x </a>
            </div>
        </div>
        
    </div>
    <div class="partirde"></div>
    <div class="val-total">
        <span>
            Mensalidade
        </span>
        <h4> R$ <span class="valor-final">
            {{total_price() | number: 2}}
        </span> <small>  </small> </h4>
    </div>

    <div class="val-total">
        <span>
            Instala????o
        </span>
        <h4> R$ <span class="valor-final">
            {{total_price_install() | number: 2}}
        </span> <small> Em at?? 3 parcelas* </small> </h4>
    </div>
    <button  class="btn btn-site btn-finaliza btn-lg btn-block" id="" ng-click="send()"> 
        contratar agora        
    </button>
    <div id="gradeCanais" class="pop-up-grade">
</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="small text-center observacoes">*Sujeito a viabilidade t??cnica e aprova????o de cr??dito, consulte as <a href='/condicoes-comerciais'>condi????es comerciais</a><br />
    Oferta v??lida para o bairro <?=$idDistrito?> na cidade de <?=$idCidade?><br/>
    Pre??os promocionais sujeitos a altera????o. Alguns valores ??? quando sinalizados ??? s??o v??lidos por per??odos determinados. Ofertas exclusivas para compra pelo site. A efetiva????o da compra do servi??o est?? sujeita a viabilidade t??cnica no im??vel de instala????o. Upload conforme tecnologia aplicada. Servi??os sujeitos a disponibilidade, interrup????es e an??lise de cr??dito. A velocidade instant??nea m??nima da banda larga ?? de 50% da velocidade m??xima contratada. A velocidade anunciada de acesso e tr??fego na internet ?? a nominal m??xima, podendo sofrer varia????es decorrentes de fatores externos. Wi-Fi gratuito para planos acima de 5 MB na tecnologia fibra ??ptica. A performance do Wi-Fi pode variar de acordo com o ambiente em que for instalado.

* Para tecnologia r??dio, verificar disponibilidade.

Confira aqui o contrato para ades??o ao servi??o de internet fixa e obtenha mais informa????es. Valores promocionais para compra na op????o boleto eletr??nico.
    </div>
    
<?php get_footer() ?>