<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $plano_adesao = $_POST['plano_adesao'];
    $data_inicio_plano = $_POST['data_inicio_plano']; // Data preenchida do dia do cadastro

    // Foto do Aluno
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nome_arquivo = $_FILES['foto']['name'];
        $nome_temporario = $_FILES['foto']['tmp_name'];
        
        $caminho_destino = 'uploads/';

        // Arquivo temp para o destino
        if (move_uploaded_file($nome_temporario, $caminho_destino . $nome_arquivo)) {

            // Adiciono 30 dias à partir da data de início do plano
            $data_fim_plano = date('Y-m-d', strtotime($data_inicio_plano . ' +30 days'));

            // Aqui incluímos o nome do arquivo no SQL e a atualização da data fim do plano
            $sql = "INSERT INTO alunos (nome_completo, cpf, data_nascimento, genero, endereco, whatsapp, email, plano_adesao, data_inicio_plano, data_plano, foto) 
                    VALUES ('$nome', '$cpf', '$data_nascimento', '$genero', '$endereco', '$telefone', '$email', '$plano_adesao', '$data_inicio_plano', '$data_fim_plano', '$nome_arquivo')";

            if (mysqli_query($conn, $sql)) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro ao cadastrar: " . mysqli_error($conn);
            }
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }

    mysqli_close($conn);
} else {
    header("Location: painel.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento de Cadastro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #191932;
        }

        .card {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://i.giphy.com/ibolLe3mOqHE3PQTtk.webp" style="width: 50%">
                        <i class="fas fa-check-circle text-success" style="font-size: 50px;"></i>
                        <h5 class="card-title mt-3">Cadastro realizado com sucesso!</h5>
                        <p class="card-text">Você será redirecionado para o Painel em breve...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Redirecionamento automático
        setTimeout(function() {
            window.location.href = 'painel.php';
        }, 2000); // Tempo em milissegundos a cada 1000 = 1 segundo
    </script>
</body>

</html>

