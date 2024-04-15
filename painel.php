<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .navbar-custom {
            background-color: #191932;
        }

        .list-group-item:hover {
            background-color: #dce2f5;
        }

        .list-group-item a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: white; text-decoration: none;">Gerenciador de Academia</a>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="#" style="color: white; text-decoration: none;">PROJETO INTEGRADOR UNIDOMBOSCO</a>
            </div>
        </div>
    </nav>

    <!-- Menu -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="painel.php"><i class="fas fa-star"></i> Painel de Controle</a></li>
                    <li class="list-group-item"><a href="matricula.php"><i class="fas fa-user-plus"></i> Novo aluno</a></li>
                    <li class="list-group-item"><a href="gestao.php"><i class="fas fa-users"></i> Gestão de Alunos</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-invoice-dollar"></i> Planos</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-shopping-cart"></i> Produtos</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-money-bill"></i> Financeiro</a></li>
                </ul>
            </div>
            <!-- Tabela -->
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Matrícula</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Plano</th>
                            <th scope="col">Data inicial</th>
                            <th scope="col">Data final</th>
                            <th scope="col">Gerenciar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config.php';

                        // Configurações de paginação
                        $registros_por_pagina = 10;
                        $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                        $inicio = ($pagina_atual - 1) * $registros_por_pagina;

                        // Consulta SQL para obter os alunos
                        $sql = "SELECT * FROM alunos ORDER BY id DESC LIMIT $inicio, $registros_por_pagina";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>"; // ID do aluno
                                echo "<td>" . $row['nome_completo'] . "</td>";
                                echo "<td>" . $row['plano_adesao'] . "</td>";
                                echo "<td>" . date('d-m-Y', strtotime($row['data_inicio_plano'])) . "</td>";
                                echo "<td>" . date('d-m-Y', strtotime($row['data_plano'])) . "</td>";
                                echo "<td><button type='button' class='btn btn-primary btn-sm'>Gerenciar</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Nenhum aluno cadastrado.</td></tr>";
                        }

                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>

                <!-- Paginação -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php
                        // Consulta SQL para contar o total de alunos
                        $sql = "SELECT COUNT(*) AS total FROM alunos";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total_registros = $row['total'];

                        // Calcula o total de páginas
                        $total_paginas = ceil($total_registros / $registros_por_pagina);

                        // Exibe os links de paginação
                        for ($i = 1; $i <= $total_paginas; $i++) {
                            echo "<li class='page-item'><a class='page-link' href='painel.php?pagina=" . $i . "'>" . $i . "</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
