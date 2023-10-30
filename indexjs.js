document.querySelector('.login-btn').addEventListener('click', function (event) {
    event.preventDefault(); // Impede o envio do formulário

    const emailInput = document.querySelector('input[type="email"]');
    const passwordInput = document.querySelector('input[type="password"]');

    if(!emailInput.value || !passwordInput.value) {
        alert('Preencha todos os campos obrigatórios!');
        return;
    }

    // Prepara os dados a serem enviados ao servidor
    const formData = new FormData();
    formData.append('email', emailInput.value);
    formData.append('password', passwordInput.value);

    // Substitua esta URL pela URL do seu servidor de autenticação
    const authenticationURL = 'http://localhost/MonitoraCaap_ss/conexao.php';

    fetch(authenticationURL, {
    method: 'POST',
    body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'primeiratela.php'; // Redireciona para a página inicial em caso de sucesso
        } else {
            alert('Credenciais incorretas!');
        }
    })
    .catch(error => {
        console.error('Erro na autenticação:', error);
        alert('Erro na autenticação. Tente novamente mais tarde.');
    });
});

const togglePassword = document.querySelector('.toggle-password');
const passwordInput = document.getElementById('password');
const eyeIcon = togglePassword.querySelector('i');

togglePassword.addEventListener('click', () => {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
});

    const inputContainers = document.querySelectorAll('.input-container');

    inputContainers.forEach(container => {
        container.addEventListener('click', () => {
            inputContainers.forEach(item => {
                item.classList.remove('clicked');
            });

            container.classList.add('clicked');
        });
    });


    document.querySelector('.login-btn').addEventListener('click', function () {
    const button = this;
    button.classList.add('loading');
    
    // Simulando um atraso na ação
    setTimeout(function () {
        button.classList.remove('loading');
    }, 2000);
});

         // Simule o carregamento
         setTimeout(function() {
            document.querySelector("body").classList.add("loaded");
            document.querySelector(".main-content").style.opacity = 1; // Define a opacidade para 1 ao final do carregamento

        }, 4000); // (4 segundos)

    //LOADER AQUI
    particlesJS('particles-j', {
        particles: {
            number: {
                value: 200, // Número de gotas de chuva
                density: {
                    enable: false,
                    value_area: 200
                }
            },
            color: {
                value: "C0C0C0"
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 1,
                    color: "C0C0C0"
                },
                polygon: {
                    nb_sides: 2
                }
            },
            opacity: {
                value: 1, // Opacidade das gotas de chuva
                random: false,
                anim: {
                    enable: false,
                    speed: 50,
                    opacity_min: 0,
                    sync: true
                }
            },
            size: {
                value: 2, // Tamanho das gotas de chuva
                random: true,
                anim: {
                    enable: true,
                    speed: 6,
                    size_min: 0,
                    sync: false
                }
            },
            line_linked: {
                enable: false,
                distance: 150,
                color: "#ffffff",
                opacity: 0.1,
                width: 1
            },
            move: {
                enable: true,
                speed: 15, // Velocidade das gotas de chuva
                direction: "bottom", // Movimento na direção de baixo
                random: false,
                straight: true,
                out_mode: "out",
                bounce: true,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: false,
                    mode: "repulse"
                },
                onclick: {
                    enable: false,
                    mode: "push"
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 400,
                    line_linked: {
                        opacity: 1
                    }
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3
                },
                repulse: {
                    distance: 200
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: true
    });
     // JavaScript para processar o envio do formulário e exibir a mensagem
     var enviarButton = document.getElementById('enviar');
     var mensagemDiv = document.getElementById('mensagem');

     enviarButton.addEventListener('click', function () {
         // Verifique se há uma mensagem disponível
         var mensagem = "<?php echo addslashes($mensagem); ?>";

         if (mensagem) {
             mensagemDiv.innerHTML = mensagem;
             mensagemDiv.style.display = 'block'; // Mostrar a div de mensagem
         }
     });


    //$(document).ready(function () {
    //    $("#enviarSolicitacao").click(function () {

    function redefine() {

            var email = $("#redemail").val();
            console.log(email);
            $.ajax({
                type: "POST",
                url: "redefine.php", // Certifique-se de que este é o caminho correto para o arquivo PHP
                data: { redefinirsenha: 1, email: email },
                success: function (response) {
                    $("#mensagem").html(response);
                    //$("#mensagem").show();
                }
            });
    };
    
