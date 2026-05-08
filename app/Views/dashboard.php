<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('public/css/dash_style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css'); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="layout">

        <div class="sidebar">
            <div class="logo">
                <img src="public/img/mclab-icon.png" width="50%">
                <h3>MCLab</h3>
            </div>

            <div class="menu">
                <ul>
                    <li class="active">
                        <a href="dashboard">
                            <i class='bx bx-grid-alt'></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="estoque">
                            <i class='bx bx-package'></i> Estoque
                        </a>
                    </li>
                    <li>
                        <a href="movimentacoes">
                            <i class='bx bx-history'></i> Movimentações
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="content">

            <div class="cabecalho">
                <h2>Dashboard</h2>
            </div>

            <div class="dashboard">

                <div class="cards">

                    <div class="card" style="border-color: #0004ffff;">
                        <div class="card-content">
                            <div>
                                <p class="label">Total de Insumos</p>
                                <p class="value"><?php $resumo['total'] ?></p>
                            </div>
                            <i class="bx bx-package icon blue"></i>
                        </div>
                    </div>

                    <div class="card" style="border-color: #ff0000ff;">
                        <div class="card-content">
                            <div>
                                <p class="label">Alto Risco</p>
                                <p class="value red"><?php $resumo['alto_risco'] ?></p>
                            </div>
                            <i class="bx bx-error icon red"></i>
                        </div>
                    </div>

                    <div class="card" style="border-color: #ff8800ff;">
                        <div class="card-content">
                            <div>
                                <p class="label">Abaixo do Mínimo</p>
                                <p class="value orange"><?php $resumo['estoque_baixo'] ?></p>
                            </div>
                            <i class="bx bx-trending-down icon orange"></i>
                        </div>
                    </div>

                    <div class="card" style="border-color: #00b941ff;">
                        <div class="card-content">
                            <div>
                                <p class="label">Movimentações</p>
                                <p class="value green"><?php $resumo['movimentacoes'] ?></p>
                            </div>
                            <i class="bx bx-trending-up icon green"></i>
                        </div>
                    </div>

                </div>

                <div class="charts">

                    <div class="chart-card">
                        <h3>Distribuição por Nível de Risco</h3>
                        <div class="chart-container">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <h3>Níveis de Estoque</h3>
                        <canvas id="barChart"></canvas>
                    </div>

                </div>

            </div>

        </div>

    </div>
    </div>
</body>

</html>