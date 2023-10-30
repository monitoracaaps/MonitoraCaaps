var cnt = document.getElementById("count");
var water = document.getElementById("water");
var percent = 0;
var interval;
var isAnimating = false;

function startAnimation() {
  if (isAnimating) return;
  isAnimating = true;

  interval = setInterval(function() {
    if (percent <= porcentagemBanco) {
      percent++;
      cnt.innerHTML = percent + '%';
      water.style.transform = 'translate(0' + ',' + (100 - percent) + '%)';

      if (percent >= 60) {
        cnt.style.fontSize = '64px'; // Exibe a porcentagem quando a onda atingir 60%
      }

      if (percent === porcentagemBanco) {
        clearInterval(interval);
        isAnimating = false;
      }
    } else {
      clearInterval(interval);
      isAnimating = false;
    }
  }, 60);
}

function resetAnimation() {
  clearInterval(interval);
  percent = 0;
  cnt.innerHTML = percent + '%';
  water.style.transform = 'translate(0' + ',' + (100 - percent) + '%)';
  isAnimating = false;
}

var startButton = document.getElementById("play-button");
var resetButton = document.getElementById("resetButton");

startButton.addEventListener("click", startAnimation);
resetButton.addEventListener("click", resetAnimation); 

// Restante do seu código JavaScript

/*function startAnimation() {
  if (isAnimating) return;
  isAnimating = true;

  interval = setInterval(function() { 
    percent++; 
    cnt.innerHTML = percent + '%'; // Adicione o símbolo de porcentagem aqui
    water.style.transform = 'translate(0' + ',' + (100 - percent) + '%)';
    if (percent == 100) {
      clearInterval(interval);
      isAnimating = false;
    }
  }, 60);
}



function startAnimation() {
  if (isAnimating) return;
  isAnimating = true;

  interval = setInterval(function() {
    if (percent <= 70) { // Altere o valor máximo para 70% da tela
      percent++;
      cnt.innerHTML = percent + '%'; // Adicione o símbolo de porcentagem aqui
      water.style.transform = 'translate(0' + ',' + (100 - percent) + '%)';
    } else {
      clearInterval(interval);
      isAnimating = false;
    }
  }, 60);
}



function resetAnimation() {
  clearInterval(interval);
  percent = 0;
  cnt.innerHTML = percent + '%'; // Adicione o símbolo de porcentagem aqui
  water.style.transform = 'translate(0' + ',' + (100 - percent) + '%)';
  isAnimating = false;
}

var startButton = document.getElementById("play-button");
var resetButton = document.getElementById("resetButton");

startButton.addEventListener("click", startAnimation);
resetButton.addEventListener("click", resetAnimation);

// porcentagem

/*function countPercentage(targetPercentage) {
  const countElement = document.getElementById('count');

  let currentPercentage = 0;

  function updateCount() {
    if (currentPercentage <= targetPercentage) {
      countElement.textContent = currentPercentage + '%';
      currentPercentage++;
      setTimeout(updateCount, 10); // Intervalo de atualização em milissegundos
    }
  }

  updateCount();
}
*/
// Chame a função para iniciar a animação
// countPercentage(<?php echo $porcentagemBanco; ?>); */
