<?php
require('conexao.php'); // Inclua sua configuração de conexão ao banco de dados

date_default_timezone_set('America/Sao_Paulo');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // arquivo de autoload do PHPMailer

if (isset($_POST['redefinirsenha'])) {
    $email = $_POST['email'];

    // Verifica qse o email existe no banco de dados
    $sql = $banco->prepare("SELECT * FROM tb03_usuario WHERE tb03_email = ?");

    $sql->execute([$email]);

    if($sql->rowCount() == 1){
        $usuario = $sql->fetch(); // Obtém os dados do usuário

        $token = uniqid();

        $_SESSION['token'] = $token;
        $_SESSION['tb03_email'] = $email;

        $url = 'http://localhost/MonitoraCaap_ss/novasenha.php';

        $corpo = 'Olá '.$usuario['tb03_nome'].', <br>
        Foi solicitada uma redefinição da sua senha na sua conta do "MonitoraCaaps". Acesse o link abaixo para redefinir sua senha.<br>
        <h3><a href="'.$url.'?token='.$_SESSION['token'].'">Redefinir a sua senha</a></h3> 
        <br>            
        Caso você não tenha solicitado essa redefinição, ignore esta mensagem.<br>
        Qualquer problema ou dúvida entre em contato pelo email tcc3dsa.aut@gmail.com';

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.ethereal.email';
        $mail->SMTPAuth = true;
        $mail->Username = 'tyra46@ethereal.email';
        $mail->Password = 'RexJJSe45z7vavPNAG';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('tyra46@ethereal.email', 'teste');
        $mail->addReplyTo('tyra46@ethereal.email', 'teste');
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Redefinição de senha';
        $mail->Body = $corpo;

        $mail->addAddress($email, $usuario['tb03_nome']); 
        if($mail->send()){
            echo '<div class="alerta sucesso">Um link de redefinição de senha foi enviado para o seu email.</div>';
        } else {
            echo '<div class="alerta danger">Erro ao enviar o email de redefinição de senha.</div>';
        }
    } else {
        echo '<div class="alerta danger">Não encontramos esse email em nossa base de dados.</div>';
    }
    
}
 else {
        echo 'Campo de email vazio ou não definido no formulário.';
    }


?>
