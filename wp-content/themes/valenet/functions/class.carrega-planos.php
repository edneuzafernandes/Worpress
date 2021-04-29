<?php
class produtosValeNet
{
    public $variavel = "";
    public $htmlCanais1;
    public function __construct()
    {
        $this->variavel = strpos($_SERVER['SERVER_NAME'],"valenet.com.br")>=0 ? "http://api.valenet.com.br/api" : "https://api.valenet.com.br/api";
    }
    function listCidadeSplash(){
        $json_file = file_get_contents($this->variavel."/locations");   
        $json_str = json_decode($json_file);
        // var_dump($json_str);
        // passa pelo Array listando as cidades
        $countCitys = 0;
        foreach ($json_str as $cidade) {
            $listCidade[$countCitys]['id'] = $cidade->id;
            $listCidade[$countCitys]['city'] = $cidade->name;

            $countCitys++;
        }
        // retorna um array com os  nomes das cidades
        return $listCidade;
    }

    // captura o ID da cidade de acesso
    function CapturaCidade($idCidade)
    {
        // var_dump($this->variavel);
        // die;
        // faz a leitura do json gerado pelo sistema
        $json_file = file_get_contents($this->variavel."/locations");   
        // var_dump($json_file);
        // die;
        $json_str = json_decode($json_file);
        // passa pelo Array comparando as cidades, se a cidade for igual alguma encontrada no array armazena o ID
        foreach ($json_str as $cidade) {
            $cidadeX = trim($cidade->name);
            if ($cidadeX == $idCidade) {
                $idCidadeSistema = $cidade->id;
            }
        }
        // retorna o ID da cidade
        return $idCidadeSistema;
    } 

    // captura o ID do bairro de acordo com a cidade envolvida
    function CapturaDistrito($idCidadeCorrente, $idDistrito)
    {
        // faz a leitura do json gerado pelo sistema
        $json_file = file_get_contents($this->variavel."/districts/".$idCidadeCorrente);   
        $json_str = json_decode($json_file);
        // passa pelos arrays comparando o array com o distrito passado
        foreach ($json_str as $distrito) {
            $distritoCorrente = trim($distrito->name);
            if($idDistrito == $distritoCorrente){
                $idDistritoCorrente = $distrito->id;
            }
        }
        // retorna o ID do distrito
        return $idDistritoCorrente;
    }

    function LoopBoxMontaPlanoInternet($idDistritoCorrente, $idCidadeSistema)
    {
        // consulta API
        $json_file = file_get_contents($this->variavel."/servicos/".$idDistritoCorrente);   
        $json_str = json_decode($json_file);

        // carrega e indexa as informações da internet para uso
        $count = 0;
        if($json_str->broadband){
            foreach ($json_str->broadband  as $plaNet) {
                $dadosPLano[$count]['id'] = $plaNet->id;
                $dadosPLano[$count]['name'] = $plaNet->name;
                $dadosPLano[$count]['price_single'] = $plaNet->price_single;
                $dadosPLano[$count]['price_combo'] = $plaNet->price_combo;
                $dadosPLano[$count]['price_triple'] = $plaNet->price_triple;
                $dadosPLano[$count] = array_merge ($dadosPLano[$count], $this->best_price($plaNet));  
                $dadosPLano[$count]['Atributos'] = $plaNet->Atributos;
                $count++;
            }
        } else {
            $dadosPLano = NULL;
        }
        
        // retorna dados do plano de internet
        return $dadosPLano;
    }

    function loopMontaPlanoTelefone($idDistritoCorrente, $idCidadeCorrente)
    {
        global $dadosTelefonia;
        // consulta API
        $json_file = file_get_contents($this->variavel."/servicos/".$idDistritoCorrente);   
        $json_str = json_decode($json_file);
        // var_dump($json_str->phone);
        // carrega e indexa as informações da internet para uso
        $count = 0;
        //print_r($json_str->phone );
        foreach ($json_str->phone  as $plaNet) {
            //echo $plaNet->price_triple > 0 ? "triple play": "nannanana";
            $dadosTelefonia[$count]['id'] = $plaNet->id;
            $dadosTelefonia[$count]['name'] = $plaNet->name;
            $dadosTelefonia[$count]['price_single'] = $plaNet->price_single;
            $dadosTelefonia[$count]['price_combo'] = $plaNet->price_combo;
            $dadosTelefonia[$count]['price_triple'] = $plaNet->price_triple;
            $dadosTelefonia[$count] = array_merge ($dadosTelefonia[$count], $this->best_price($plaNet));  
            $dadosTelefonia[$count]['Atributos'] = $plaNet->Atributos;
            $count++;
        }
        // retorna dados do plano de internet
        return $dadosTelefonia;
    }

    // loop para montagem dos boxes de televisão
    function loopMontaPlanosTV($idDistritoCorrente, $idCidadeCorrente)
    {
        // consulta API
        $json_file = file_get_contents($this->variavel."/servicos/".$idDistritoCorrente);   
        $json_str = json_decode($json_file);
        // var_dump($json_str->tv);
        // carrega e indexa as informações da internet para uso
        $count = 0;
        if(!empty($json_str->tv)){
            foreach ($json_str->tv  as $plaNet) {
                
                $dadosAccessories[$count]['id'] = $plaNet->id;
                $dadosAccessories[$count]['name'] = $plaNet->name;
                $dadosAccessories[$count]['pontos'] = $plaNet->pontos;
                $dadosAccessories[$count]['canais'] = $plaNet->canais;
                $dadosAccessories[$count]['price_single'] = $plaNet->price_single;
                $dadosAccessories[$count]['price_combo'] = $plaNet->price_combo;
                $dadosAccessories[$count]['price_triple'] = $plaNet->price_triple;
                $dadosAccessories[$count] = array_merge ($dadosAccessories[$count], $this->best_price($plaNet));
                //print_r($dadosAccessories);
                //$plaNet->price_combo > 0 ? $plaNet->price_combo : $plaNet->price_triple > 0 ? $plaNet->price_triple : $plaNet->price_single;
                //$dadosAccessories[$count]['best_price_type'] = best_price_type($plaNet);
                //$plaNet->price_combo > 0 ? "double play" : $plaNet->price_triple > 0 ? "triple play" : "single play";
                
                $dadosAccessories[$count]['Atributos'] = $plaNet->Atributos;
                $count++;
            }
        } else {
            $dadosAccessories = null;
        }
        
        // retorna dados do plano de internet
        return $dadosAccessories;
    }

    function loopMontaAccessories($idDistritoCorrente, $idCidadeCorrente)
    {
        // consulta API
        $json_file = file_get_contents($this->variavel."/servicos/".$idDistritoCorrente);   
        $json_str = json_decode($json_file);
        // var_dump($json_str->tv);
        // carrega e indexa as informações da internet para uso
        $count = 0;
        if(!empty($json_str->accessories)){
            foreach ($json_str->accessories  as $plaNet) {
                
                $dadosPlanTv[$count]['id'] = $plaNet->id;
                $dadosPlanTv[$count]['name'] = $plaNet->name;
                $dadosPlanTv[$count]['pontos'] = $plaNet->pontos;
                $dadosPlanTv[$count]['canais'] = $plaNet->canais;
                $dadosPlanTv[$count]['price_single'] = $plaNet->price_single;
                $dadosPlanTv[$count]['price_combo'] = $plaNet->price_combo;
                $dadosPlanTv[$count]['price_triple'] = $plaNet->price_triple;
                $dadosPlanTv[$count] = array_merge ($dadosPlanTv[$count], $this->best_price($plaNet));
                //print_r($dadosPlanTv);
                //$plaNet->price_combo > 0 ? $plaNet->price_combo : $plaNet->price_triple > 0 ? $plaNet->price_triple : $plaNet->price_single;
                //$dadosPlanTv[$count]['best_price_type'] = best_price_type($plaNet);
                //$plaNet->price_combo > 0 ? "double play" : $plaNet->price_triple > 0 ? "triple play" : "single play";
                
                $dadosPlanTv[$count]['Atributos'] = $plaNet->Atributos;
                $count++;
            }
        } else {
            $dadosPlanTv = null;
        }
        
        // retorna dados do plano de internet
        return $dadosPlanTv;
    }

    function best_price($plan){
        if ($plan->price_triple>0){
            return (array) [ 'best_price'=> $plan->price_triple, 'best_price_type' => 'triple play'];
        }elseif ($plan->price_combo>0){
            return (array) [ 'best_price'=> $plan->price_combo, 'best_price_type' => 'double play'];
        }else{
            return (array) [ 'best_price'=> $plan->price_single, 'best_price_type' => 'single play'];
        }
    }
    
   

    // loop para montagem do box do plano completo
    function loopPlanosMontados($idDistritoCorrente, $idCidadeCorrente)
    {   
        global $dadosPLano;
        
        // consulta API
        $json_file = file_get_contents($this->variavel."/servicos/".$idDistritoCorrente);   
        $json_str = json_decode($json_file);

        // echo "<pre>";
        //     var_dump($json_str->suggestions);
        // echo "</pre>";

        // carrega e indexa as informações da internet para uso
        $count = 0;
        foreach ($json_str->suggestions  as $plaNet) {
            $dadosPLano[$count]['name'] = $plaNet->name;
            $dadosPLano[$count]['services'] = $plaNet->services;
            $dadosPLano[$count]['price'] = $plaNet->price;
            $dadosPLano[$count]['servicos'] = $plaNet->servicos;
            $count++;
        }
        // retorna dados do plano de internet
        return $dadosPLano;
    }

    public function geraGrupoCanais($json_str){
        $arrayGrupos = array();
        foreach ($json_str as $grupos) {
            // echo $canais->grupo;
            $arrayGrupos[] =  $grupos->grupo;
        }
        // echo "<pre>";
        // var_dump($arrayGrupos);
        // echo "</pre>";
        $grupos = array_unique($arrayGrupos);
        // echo "<pre>";
        // var_dump($grupos);
        // echo "</pre>";

        // foreach ($grupos as $grupo) {
        //     echo $grupo."<br>";
        // }

        $this->htmlCanais1 = "<div class='grupo-canais'>";
        foreach ($grupos as $grupo) {

            $this->htmlCanais1 .= '<div class="linha-grupo">';
                $this->htmlCanais1 .= '<div class="grupo-name">';
                    $this->htmlCanais1 .= '<h4>' . $grupo . '</h4>';
                $this->htmlCanais1 .= '</div>';
                $this->htmlCanais1 .= '<div class="grupo-lista">';
                    foreach ($json_str as $canais) {
                        if($canais->grupo == $grupo){
                            $this->htmlCanais1 .= "<div  class='".($canais->active==false ? 'blackandwhite':'')."'>";
                                $this->htmlCanais1 .= "<img src='".$canais->image."' alt='".$canais->name."' title='".$canais->name."' class='".($canais->active==false ? 'blackandwhite':'')."'>";
                                $this->htmlCanais1 .= '<p>' . $canais->name . '</p>';
                            $this->htmlCanais1 .= "</div>";
                        }
                    }
                $this->htmlCanais1 .= '</div>';
            $this->htmlCanais1 .= '</div>';
            // die;
        }
        $this->htmlCanais1 .= "</div>";
        // var_dump($this->htmlCanais1);
        return $this->htmlCanais1;
    }

    public function canaisComum($json_str){
        $ordered_array = array_merge($json_str);
        echo "<pre>";
        var_dump($ordered_array);
        echo "</pre>";
        foreach ($json_str as $canais) {
            if($canais->active == true){
                $this->htmlCanais1 .= "<div>";
                    $this->htmlCanais1 .= "<img src='".$canais->image."' alt='".$canais->name."' title='".$canais->name."'>";
                    $this->htmlCanais1 .= '<p>' . $canais->name . '</p>';
                $this->htmlCanais1 .= "</div>";
            }
        }

        return $this->htmlCanais1;
    }

    // gera loop de canais pelo combo
    function loopCanaisCombo($idCombo){
        // consulta API
        $json_file = file_get_contents($this->variavel."/canais/".$idCombo.".html");   
        $json_str = json_decode($json_file);
        // var_dump($json_str);
        $htmlCanais =  "<div class='list-canais'>";
            $htmlCanais .= "<h3> Grade de canais </h3>";
            $htmlCanais .= "<a class='close-popup'> x </a>";
            // var_dump('teste');
            self::geraGrupoCanais($json_str);
            // self::canaisComum($json_str);
            $htmlCanais .= $this->htmlCanais1;
        $htmlCanais .= "</div>";

        return $htmlCanais;
    }

}
