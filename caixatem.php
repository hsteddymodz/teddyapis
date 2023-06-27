<?php
header('Content-Type: application/json');
error_reporting(0);
/*extract ($_GET);
$separar = explode ("|", $lista);
$cpf2 = trim ($separar [0]);
$senha = trim ($separar [1]);*/


$cpf2 = $_GET['cpf'];

if ($cpf2 == NULL) {
die("CPF não informado.");
}



function getstr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.portaldatransparencia.gov.br/api-de-dados/auxilio-emergencial-por-cpf-ou-nis?codigoBeneficiario='.$cpf2.'&pagina=1');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
  curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
  curl_setopt($ch, CURLOPT_COOKIE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER,array(
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'chave-api-dados: 47565d4013748b4608d02ec35d2ef216',
'Connection: keep-alive',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'));
curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_POST, 0);
 // curl_setopt($ch, CURLOPT_POSTFIELDS, '{"cpf":62192191200}');  
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
   echo $resposta = curl_exec($ch);
 

/* if(strpos($resposta, '"nis":"00000000000"')){
    $bene = 'AUXILIO';
}elseif(strpos($resposta, '"nis":"1')){
    $bene = 'BOLSA FAMILIA';

}else{
    $bene = 'sem informações';
}*/
// Convertendo para JSON
  $json = json_encode($resposta);
  
  echo $json;

/*  $saldop = getStr($resposta, ',"valor":','.00}');
  $nome = getStr($resposta, '"nome":"','"');
    $multiploCadastro = getStr($resposta, '"multiploCadastro":',',');

  $mesDisponibilizacao = substr_count($resposta, '"mesDisponibilizacao"');
 
   $CIDADE = getStr($resposta, '"nomeIBGE":"','"');
  $uf = getStr($resposta, '"sigla":"','"');
 
  $qtd_cartoes = substr_count($resposta, '"mesDisponibilizacao"'); 
 
    function cartoes($separa, $inicia, $fim, $contador) { 
        $nada = explode($inicia, $separa); 
        $nada = explode($fim, $nada[$contador]); 
        return $nada[0]; 
    } 
           if ($qtd_cartoes > 1) { 
      for ($i = 1; $i < $qtd_cartoes + 1; $i++) { 
        $tipocard = cartoes($resposta, '"mesDisponibilizacao":"','"', $i);
        $tipocard = strtoupper($tipocard); 
        @$str .= "$tipocard  -  ";  
    } 
        } elseif ($qtd_cartoes == 1) { 
          $tipocard = getStr($resposta, '"mesDisponibilizacao":"','"');
        $tipocard = strtoupper($tipocard); 
        $str = "$tipocard"; 
            } else{ 
                $str = "Sem Info"; 
         }

 $infos1 = "NOME: $nome | SALDO : $saldop / MESES DISPONIBILIZADOS: $mesDisponibilizacao | CIDADE: $CIDADE/$uf";*/

?>