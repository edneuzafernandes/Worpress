<div class="resumo-combo">
    <header>
        Resumo do combo
    </header>
    <div class="composicao form-finaliza">
        
    </div>
    <div class="partirde"></div>
    <div class="val-total">
        <span>
            Total
        </span>
        <h4> R$ <span class="valor-final">0,00</span> <small> Por mês </small> </h4>
    </div>
    <button  class="btn btn-site btn-finaliza btn-lg btn-block" id="confirm-quote"> 
        contratar agora        
    </button>
    <div id="gradeCanais" class="pop-up-grade">
</div>
<script>
    $(function(){
        $('#confirm-quote').on('click', function(){
            var url = '';
            $('.btn-exclui-produto').map((j,i)=>{
                url += 'produtoId[]='+$(i).data('produtoid');
            });
            document.location = '/confirmacao-pedido?'+url;
        })
    })
</script>