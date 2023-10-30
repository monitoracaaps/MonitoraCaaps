<?php
try {
    $banco = new PDO(
        'mysql:host=127.0.0.1;dbname=banco',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro no banco de dados"]);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    // Verifique se email e password não são nulos
    if ($email !== null && $password !== null) {
        // Consulta ao banco de dados para verificar as credenciais
        $query = $banco->prepare("SELECT * FROM tb03_usuario WHERE tb03_email = :email AND tb03_senha = :senha");
        $query->bindParam(':email', $email);
        $query->bindParam(':senha', $password);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Credenciais incorretas"]);
        }
    } 
}

?>

