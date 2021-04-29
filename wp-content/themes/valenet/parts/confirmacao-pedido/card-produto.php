<?php
  switch($produto->tipo){
    case "internet":
        $img = "icon-roteador-valenet-forma";
    break;
    case "phone":
    $img = "icon-telefone-valenet-line";
    break;
    case "tva":
    $img = "icon-televisao";
    break;
      
  }
?>
<div class="boxes-item bg-white">
    <div class="text-center">
        <i class="icon $img"></i>
    </div>
    <div>
        <h5 class="<?= $produto->tipo=="internet" ? "internet-mega" : "" ?>"> <?=$produto->nome ?> </h5>
        <?php foreach($produto->atributos as $item): ?>
            <?= $item->chave ?> <?=$item->valor?><br>
        <?php endforeach; ?>
        teste -->
    </div>
</div>