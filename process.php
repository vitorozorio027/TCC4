<?php
session_start();

include 'db.php';

// Verifica se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login bem-sucedido
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        // Login falhou
        http_response_code(401); // Define o código de resposta HTTP para indicar falha de autenticação
        exit("Login or password is incorrect.");
    }
}

// Operações CRUD para Alunos
if (isset($_POST['add'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $matricula = $_POST['matricula'];
    $turma = $_POST['turma'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO alunos (nome, cpf, matricula, turma, telefone, email) VALUES ('$nome', '$cpf', '$matricula', '$turma', '$telefone', '$email')";
    if ($conn->query($sql) === TRUE) {
        header('Location: alunos.php?msg=success');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $matricula = $_POST['matricula'];
    $turma = $_POST['turma'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "UPDATE alunos SET nome='$nome', cpf='$cpf', matricula='$matricula', turma='$turma', telefone='$telefone', email='$email' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: alunos.php?msg=updated');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM alunos WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: alunos.php?msg=deleted');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Operações CRUD para Chaves
if (isset($_POST['add_chave'])) {
    $prateleira = $_POST['prateleira'];

    $sql = "INSERT INTO chaves (prateleira) VALUES ('$prateleira')";
    if ($conn->query($sql) === TRUE) {
        header('Location: chaves.php?msg=success_chave');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['update_chave'])) {
    $id = $_POST['id'];
    $prateleira = $_POST['prateleira'];

    $sql = "UPDATE chaves SET prateleira='$prateleira' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: chaves.php?msg=updated_chave');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete_chave'])) {
    $id = $_GET['delete_chave'];
    $sql = "DELETE FROM chaves WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: chaves.php?msg=deleted_chave');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
