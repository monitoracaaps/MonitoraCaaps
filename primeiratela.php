<?php
include_once "monitora.php";

$porcentagemBanco = $row["percentual"];
$atualizacao = date("d/m/Y H:i:s", strtotime($atualizacao));
?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.min.js"></script>
    <script src="jstelainicio.js"></script>
</head>

<body>

    <div class="notification-icon">
    <a style="color: white" href="notificacoes.php">
        <i class="fas fa-bell"></i>
    </a>

    </div>


    <div class="atibaia-info" id="atibaia">
        <h2>Atibaia</h2>
        <p class="temperature">°C</p>

  <p class=""></p>
  <br>
        <h3 style=" font-size: 50px; color:#f8f8f8; color: #f1f1f1; margin-top: 100px;" class="percentNum" id="count"> <?php echo $porcentagemBanco; ?>%</h3>
  </div>
    </div>

    <script>
    // Passando a porcentagem do PHP para o JavaScript
    var porcentagemBanco = <?php echo $porcentagemBanco; ?>;
</script>

    <div class="table-container">
        <table>
            <tr>
                <th >Atualização</th>
                <th >Litros</th>
                <th >Capacidade</th>
            </tr>
            <tr>
                <td> <?php echo $atualizacao; ?></td>
                <td> <?php echo $litros; ?>L</td>
                <td> <?php echo $capacidade; ?></td>
            </tr>
        
        </table>
        </div>
        
        

    <div class="navbar" id="navbar">
        <a href="primeiratela.php" class="active">
            <span></span>
            <i class="fas fa-home"></i>
        </a>
        <a href="telaclima.html">
            <span></span>
            <i class="fas fa-cloud-sun" ></i>
        </a>
        <a href="relatorios.html">
            <span></span>
            <i class="fas fa-chart-bar"></i>
        </a>
        <a href="config.html">
            <span></span>
            <i class="fas fa-cog"></i>
        </a>
    </div>
    
    <svg version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" style="display: none;">
        <symbol id="wave">
          <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"></path>
          <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"></path>
          <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"></path>
          <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"></path>
        </symbol>
      </svg>
      <div class="water-jar">
  <div id="water" class="water">
    <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
      <use xlink:href="#wave"></use>
    </svg>
    <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
      <use xlink:href="#wave"></use>
    </svg>
  </div>
</div>
      
       <div class="play-button-container">
<button style="background-color: #f1f1f1;" id="play-button" class="play-button"></button>
<button  style="background-color: #f1f1f1;" id="resetButton" class="reset-button"></button>

</div>

<div class="hourly-table3">
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
  const city = "Atibaia,br";
  const apiKey = "f9bcde7961a17c3b0ee58dd33625a027";
  const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=pt_br`;

  const temperatureElement = document.querySelector(".temperature");

  fetch(weatherUrl)
      .then((response) => response.json())
      .then((data) => {
          const temperature = Math.round(data.main.temp);
          const weatherDescription = data.weather[0].description || "Condição não disponível";

          temperatureElement.textContent = `${temperature}°C`;
      })
      .catch((error) => {
          console.error("Erro ao buscar dados do clima:", error);

          console.log(`Temperatura: ${temperature}°C`);

      });
});
    </script>

<script src="jstelainicio.js"></script>
</body>
</html>

      