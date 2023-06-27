<?php
header('Content-Type: application/json');

$lista = $_GET["lista"];
if(!$_GET || !$lista){
  die("Está faltando parametros.");
}
$amount = rand(1, 6);
$cents = rand(10, 99);
$live = rand(0, 1);

$price = "R$".$amount.",".$cents;

$msgLive = "#Aprovada -> Debitou {$price} -> {$lista} -> @teddyzinofc";

$msgDie = "#Reprovada -> Negou {$price} -> {$lista} -> @teddyzinofc";

if($live)
{
  echo $msgLive;
} else {
  echo $msgDie;
}

$json = json_encode($live);
  
  echo $json;

/*
By: @teddyzinofc 🔥🚀
*/