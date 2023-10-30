<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Configurações</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="navbar" id="navbar">
        <a href="primeiratela.php">
            <span></span>
            <i class="fas fa-home" class="active"></i>
        </a>
        <a href="telaclima.html">
            <span></span>
            <i class="fas fa-cloud-sun" ></i>
        </a>
        <a href="relatorios.html" >
            <span></span>
            <i class="fas fa-chart-bar"></i>
        </a>
        <a href="config.html">
            <span></span>
            <i class="fas fa-cog"></i>
        </a>
    </div>
    <div class="help-icon">
        <a style="color: rgb(255, 255, 255); text-decoration:none;" href="primeiratela.php" class="fa-solid fa-angle-up fa-rotate-270"></a>
    </div>

    <h2>Notificações</h2>
    
    <div class="infoconfig" id="infoconfig">
        <table>
            <?php
            date_default_timezone_set('America/Sao_Paulo'); // Defina o fuso horário

            include_once "conexao.php";

            // Consulta SQL para recuperar os três registros mais recentes ordenados pela data e hora
            $sql = "SELECT tb01_mesagem_cisterna, tb01_data_hora, ROUND(tb01_qntd_agua / tb04_capacidade * 100, 0) AS percentual
            FROM tb01_arduino
            INNER JOIN tb04_cisterna ON (tb01_caixaID = tb04_caixaID)
            ORDER BY tb01_data_hora DESC
            LIMIT 3";

            $result = $banco->query($sql);

            if ($result->rowCount() > 0) {
                $counter = 0;
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $mensagemCisterna = $row["tb01_mesagem_cisterna"];
                    
                    // Formatando a data e hora
                    $dataHora = date("d/m/Y H:i", strtotime($row["tb01_data_hora"]));
            
                    $percentual = $row["percentual"];
                    
                    echo '<div class="config-icon">';
                    echo '<span style="font-size: 17px; color: rgb(173, 201, 222); margin-left: 10px; margin-right: 99px;">' . $mensagemCisterna . '</span>';
                    
                    // Exibindo a data e hora formatadas
                    echo '<span style="color: rgb(235, 239, 242); font-size: 12px;">' . $dataHora . '</span>';
                    echo '<br>';
                    echo '<span style="color: rgb(255, 255, 255); font-size: 12px; margin-left: 10px; ">Nível de água ' . $percentual . '%</span>';
                    echo '</div>';
                    
                    if ($counter < 2) {
                        echo '<hr>';
                    }
            
                    $counter++;
                }
            } else {
                echo "Nenhum registro encontrado.";
            }
            
            ?>
        </table>
    </div>

</html>
