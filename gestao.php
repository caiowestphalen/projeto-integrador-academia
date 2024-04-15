<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Alunos</title>
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
                <a class="nav-item nav-link" href="gestao.php" style="color: white; text-decoration: none;">PROJETO INTEGRADOR UNIDOMBOSCO</a>
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
                    <li class="list-group-item active"><a href="gestao.php"><i class="fas fa-users"></i> Gestão de Alunos</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-file-invoice-dollar"></i> Planos</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-shopping-cart"></i> Produtos</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-money-bill"></i> Financeiro</a></li>
                </ul>
            </div>
            <!-- Pesquisa e Lista de Alunos -->
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="" method="GET" class="form-inline">
                            <div class="form-group mr-2">
                                <input type="text" name="search" class="form-control" placeholder="Pesquisar">
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Lista de Alunos</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Matricula</th>
                                    <th scope="col">Nome Completo</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Whatsapp</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'config.php';

                                // Definir a consulta SQL baseada na pesquisa
                                $sql = "SELECT * FROM alunos";
                                $result = mysqli_query($conn, $sql);

                                // Paginação
                                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                                $records_per_page = 10;
                                $offset = ($page - 1) * $records_per_page;
                                $total_pages_sql = "SELECT COUNT(*) AS total FROM alunos";
                                $result_total = mysqli_query($conn, $total_pages_sql);
                                $total_rows = mysqli_fetch_array($result_total)['total'];
                                $total_pages = ceil($total_rows / $records_per_page);

                                // Ajustar consulta SQL para paginação
                                $sql .= " LIMIT $offset, $records_per_page";
                                $result_paginated = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result_paginated) > 0) {
                                    while ($row = mysqli_fetch_assoc($result_paginated)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nome_completo'] . "</td>";
                                        echo "<td>" . $row['cpf'] . "</td>";
                                        echo "<td>" . $row['whatsapp'] . "</td>";
                                        echo "<td><a href='edit_aluno.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Editar</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Nenhum aluno encontrado.</td></tr>";
                                }

                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                    <li class="page-item <?php if ($i === $page) echo 'active'; ?>"><a class="page-link" href="gestao.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
