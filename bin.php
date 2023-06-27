<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    die(json_encode(array(
        "code" => "404",
        "consulta" => array("msg" => "Request not accepted")
    ), JSON_PRETTY_PRINT));
}

$bin_search = $_GET['bin'];

if (!$bin_search) {
    die(json_encode(array(
        "code" => "403",
        "consulta" => array("msg" => "insira uma bin")
    ), JSON_PRETTY_PRINT));
}

$list = file("./bins2023.csv");

$found = false;

foreach ($list as $string) {
    $bin = explode("|", $string)[0];
    $bandeira = explode("|", $string)[1];
    $banco = explode("|", $string)[2];
    $nivel = explode("|", $string)[3];
    $pais = explode("|", $string)[4];
    $tipo = explode("|", $string)[5];

    if ($bin_search == $bin) {
        $found = true;
        die(json_encode(array(
     "code" => "200",
          "message" => "bin encontrada",
           "dados" => array(
                "bin" => $bin,
                "pais" => $pais,
                "bandeira" => $bandeira,
                "tipo" => $tipo,
                "nivel" => $nivel,
                "banco" => $banco,
                "creditos" => array("@teddyzinofc")
            )
        ), JSON_PRETTY_PRINT));
    }
}

if (!$found) {
    die(json_encode(array(
        "code" => "404",
        "message" => "bin nao encontrada",
        "creditos" => array("@teddyzinofc")
    ), JSON_PRETTY_PRINT));
}
?>
