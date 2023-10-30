<?php
include_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $sql = "INSERT INTO tb03_usuario (tb03_nome, tb03_email, tb03_senha) VALUES (:name, :email, :password)";
        $stmt = $banco->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        
        header("Location: pagcadastro.html?success=true");
    } catch (PDOException $e) {
        header("Location: pagcadastro.html?success=false");
    }
}
/*include_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Inserir os dados no banco de dados
        $sql = "INSERT INTO tb03_usuario (tb03_nome, tb03_email, tb03_senha) VALUES (:name, :email, :password)";
        $stmt = $banco->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        
        // Redirecione para a página de cadastro com a mensagem na URL
        header("Location: pagcadastro.html?message=Cadastro%20inserido%20com%20sucesso");
    } catch (PDOException $e) {
        echo "Erro ao inserir registro: " . $e->getMessage();
    }
}*/


?>