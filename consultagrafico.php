<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["tipo"])) {
    $tipo = $_REQUEST["tipo"];

    $data = []; // Array para armazenar os dados
    $labels = []; // Rótulos para o gráfico

    if ($tipo === "diario") {
        // Consulta para dados diários (sem agrupamento)
        $sql = "SELECT DATE_FORMAT(tb01_data_hora, '%H:%i') as hora, tb01_qntd_agua as litros
                FROM tb01_arduino
                WHERE DATE(tb01_data_hora) = CURDATE()
                ORDER BY tb01_data_hora";

        // Execute a consulta e popule os dados e rótulos com hora
        $result = $banco->query($sql);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row['litros'];
            $labels[] = $row['hora'];
        }
    } elseif ($tipo === "semanal" || $tipo === "mensal") {
        // Consulta para dados semanais/mensais (média diária)
        $sql = "SELECT DATE_FORMAT(tb01_data_hora, '%Y-%m-%d') as data, AVG(tb01_qntd_agua) as litros
                FROM tb01_arduino
                WHERE YEAR(tb01_data_hora) = YEAR(CURDATE())";

        if ($tipo === "mensal") {
            $sql .= " AND WEEK(tb01_data_hora) = WEEK(CURDATE())";
        } elseif ($tipo === "mensal") {
            $sql .= " AND MONTH(tb01_data_hora) = MONTH(CURDATE())";
        }

        $sql .= " GROUP BY data ORDER BY data";

        // Execute a consulta e popule os dados e rótulos com data
        $result = $banco->query($sql);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row['litros'];
            $labels[] = $row['data'];
        }
    }

    echo json_encode(array("data" => $data, "labels" => $labels));
} else {
    echo json_encode(array("error" => "Tipo não especificado"));
}
