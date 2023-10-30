<?php
/*header("Content-Type: application/json; charset=UTF-8");*/
date_default_timezone_set('America/Sao_Paulo');
include_once "conexao.php";

$sql = "SELECT tb01_data_hora atualizacao, tb01_qntd_agua litros, tb04_capacidade capacidade, ROUND (tb01_qntd_agua / tb04_capacidade * 100, 0) percentual
FROM tb01_arduino 
INNER JOIN tb04_cisterna ON (tb01_caixaID = tb04_caixaID) 
ORDER BY tb01_data_hora DESC 
LIMIT 1";

$result = $banco->query($sql);

if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $atualizacao = $row["atualizacao"];
    $litros = $row["litros"];
    $capacidade = $row["capacidade"];
    $percentual = $row["percentual"];
} else {
    $atualizacao = "N/A";
    $litros = "N/A";
    $capacidade = "N/A";
    $percentual = "N/A";
}

?>