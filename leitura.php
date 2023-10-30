<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["id"])) {

    $id = $_REQUEST["id"];
    $qntd = $_REQUEST["qntd"];
    $msg = $_REQUEST["msg"];

    $sql = "INSERT INTO tb01_arduino
	(tb01_id_arduino, tb01_data_hora, tb01_qntd_agua, tb01_caixaID, tb01_mesagem_cisterna)
	VALUES (NULL, NOW(), ?, ?, ? )";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($qntd, $id, $msg));
        
        $mensagem = "Registro inserido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao inserir o registro!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qntd = $_POST["quantidade"];
    }
?>
