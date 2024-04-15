
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno - Academia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #191932;
        }

        .cadastro-container,
        .plano-card {
            padding: 30px;
        }

        .cadastro-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .cadastro-info {
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
        }

        .lista-sem-bolinha {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cadastro-container">
                    <h2 class="text-center mb-4">Cadastro de Aluno</h2>
                    <form action="processar.php" method="POST" enctype="multipart/form-data">
                        <div class="cadastro-info mb-3">
                            <label for="nome" class="form-label"><i class="fas fa-user"></i> Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="cpf" class="form-label"><i class="fa-regular fa-address-card"></i> CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf"
                                required>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="data_nascimento" class="form-label"><i class="fas fa-calendar-alt"></i> Data de
                                Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                                required>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="genero" class="form-label"><i class="fas fa-venus-mars"></i> Gênero</label>
                            <select class="form-select" id="genero" name="genero" required>
                                <option value="" selected disabled>Selecione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>

                            </select>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="endereco" class="form-label"><i class="fas fa-map-marker-alt"></i>
                                Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" required>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="telefone" class="form-label"><i class="fa-brands fa-whatsapp"></i> WhatsApp</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" required>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="email" class="form-label"><i class="fas fa-envelope"></i> E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="plano_adesao" class="form-label"><i class="fas fa-clipboard-list"></i> Plano de
                                Adesão</label>
                            <select class="form-select" id="plano_adesao" name="plano_adesao" required>
                                <option value="" selected disabled>Selecione</option>
                                <option value="Platinum">Platinum</option>
                                <option value="Safira">Safira</option>
                                <option value="Infinity">Infinity</option>
                            </select>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="data_inicio_plano" class="form-label"><i class="fas fa-calendar-plus"></i> Data
                                de Início do Plano</label>
                            <input type="date" class="form-control" id="data_inicio_plano" name="data_inicio_plano"
                                value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="cadastro-info mb-3">
                            <label for="foto" class="form-label"><i class="fas fa-image"></i> Selecione uma foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5a8e354162.js" crossorigin="anonymous"></script>
</body>

</html>

