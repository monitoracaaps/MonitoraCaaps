 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <?php
    include('conexao.php');   
?>
<html>
    <head>
    <link rel="stylesheet" href="stylecadastro.css">
    </head>
    <body>
        
        <?php
            if(isset($_GET['token'])){
                $token = $_GET['token'];
                if($token != $_SESSION['token']){
                    die('<div class="alerta danger"> O token não corresponde. </div>');
                }else{
        ?>
        <div class="form_login">
            <div class="box_esqueci_a_senha">
            <?php
               $sql = $pdo->prepare("SELECT * FROM tb03_usuario WHERE tb03_email = ?");
               $sql->execute([$_SESSION['tb03_email']]);
               $info = $sql->fetch();
               
               if($sql->rowCount() == 1){    
                   if(isset($_POST['redefinirsenha'])){
                        $senha = $_POST['tb03_senha'];
                        $criptografada = password_hash($senha, PASSWORD_DEFAULT);
                        $sql = $pdo->prepare("UPDATE tb03_usuario SET tb03_senha = ? WHERE tb03_email = ?");
                        $sql->execute([$criptografada, $_SESSION['tb03_email']]);
                        echo '<div class="alerta sucesso"> A sua senha foi redefinida com sucesso.</div>';                                                
                   }
               }else{
                   echo '<div class="alerta danger"> Não encontramos esse email</div>';
               }  
            ?>
</head>
<body>
    <div class="main-content">
        <img style="margin-left: 60px; margin-top: 80px; width: 220px;" src="img/Logo.png" alt="Sua Logo">
        
        <div class="login-container">
            <h1 style="font-size: 25px; color: #ffffff;">Nova Senha</h1>
            <div class="input-container">
                <i style="color: #f8f8f8;" class="fas fa-lock"></i>
                <input type="password" placeholder="Nova Senha" id="tb03_senha" required>
                <span class="toggle-password">
                    <i style="color: #f8f8f8; margin-bottom: 120px;" class="fas fa-eye"></i>
                </span>
            </div>
            <br>
            <button class="login-btn">
                <div class="button-content">
                    <div class="loading-dots">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <input type="submit" name="redefinirsenha" value="Redefinir">Redefinir</input>
                </div>
            </button>
        </div>
    </div>
    </div>
        <?php
            }  //Fechando o segundo else.  
        ?>
        <?php
            }else{
                echo '<div class="alerta danger"> Precisa de um token. </div>';  //Caso não tenha passado nenhum token na url então apresentamos uma mensagem de erro.
            }   
        ?>

    </body>