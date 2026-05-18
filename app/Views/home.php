<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/globals.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/home_style.css'); ?>">
</head>

<body>

    <div class="layout">

        <div class="sidebar">

            <div class="logo">
                <img src="public/img/mclab-icon.png" draggable="false" alt="Logo">
                <h3>MCLab</h3>
            </div>

            <div class="menu">
                <ul>
                    <li class="active">
                        <a href="home">
                            <i class='bx bx-grid-alt'></i> Home
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
                <h2>Home</h2>
            </div>

            <div class="home">

                <!-- Welcome Banner -->
                <div class="welcome-banner">
                    <div class="welcome-text">
                        <h1>Bem-vindo ao MCLab 👋</h1>
                        <p>Gerencie seus insumos e movimentações com precisão e eficiência.</p>
                    </div>
                    <div class="welcome-badge">
                        <i class='bx bx-check-circle'></i> Laboratório ativo
                    </div>
                </div>

                <!-- Cards de resumo -->
                <div class="cards">
                    <div class="card" style="border-color: #0004ffff;">
                        <div class="card-content">
                            <div>
                                <p class="label">Total de Insumos</p>
                                <p class="value"><?= $resumo['total'] ?></p>
                            </div>
                            <i class="bx bx-package icon blue"></i>
                        </div>
                    </div>
                    <div class="card" style="border-color: #ff0000ff;">
                        <div class="card-content">
                            <div>
                                <p class="label">Alto Risco</p>
                                <p class="value red"><?= $resumo['risco_alto'] ?></p>
                            </div>
                            <i class="bx bx-error icon red"></i>
                        </div>
                    </div>
                    <div class="card" style="border-color: #ff8800ff;">
                        <div class="card-content">
                            <div>
                                <p class="label">Abaixo do Mínimo</p>
                                <p class="value orange"><?= $resumo['estoque_baixo'] ?></p>
                            </div>
                            <i class="bx bx-trending-down icon orange"></i>
                        </div>
                    </div>
                    <div class="card" style="border-color: #00b941ff;">
                        <div class="card-content">
                            <div>
                                <p class="label">Movimentações</p>
                                <p class="value green"><?= $resumo['movimentacoes'] ?></p>
                            </div>
                            <i class="bx bx-trending-up icon green"></i>
                        </div>
                    </div>
                </div>

                <br>

                <p class="section-title">Missão, Visão & Valores</p>
                <div class="mvv-grid">
                    <div class="mvv-card missao">
                        <div class="mvv-icon"><i class='bx bx-target-lock'></i></div>
                        <h3>Missão</h3>
                        <p>Garantir o controle preciso e rastreável de insumos laboratoriais, promovendo segurança,
                            eficiência e conformidade em cada etapa da gestão.</p>
                    </div>
                    <div class="mvv-card visao">
                        <div class="mvv-icon"><i class='bx bx-glasses'></i></div>
                        <h3>Visão</h3>
                        <p>Ser referência em gestão de estoque para laboratórios, proporcionando uma plataforma
                            inteligente e confiável que apoie decisões estratégicas.</p>
                    </div>
                    <div class="mvv-card valores">
                        <div class="mvv-icon"><i class='bx bx-star'></i></div>
                        <h3>Valores</h3>
                        <p>Precisão, responsabilidade, transparência e inovação contínua — pilares que guiam cada ação
                            dentro da plataforma e da equipe.</p>
                    </div>
                </div>

                <div class="bottom-grid">
                    <div class="info-card">
                        <h3><i class='bx bx-bulb'></i> Dicas Rápidas</h3>
                        <div class="tip-item">
                            <div class="tip-dot" style="background: #3b82f6;"></div>
                            <p><span>Estoque:</span> Cadastre novos insumos e defina o estoque mínimo para alertas
                                automáticos.</p>
                        </div>
                        <div class="tip-item">
                            <div class="tip-dot" style="background: #ea580c;"></div>
                            <p><span>Movimentações:</span> Registre entradas e saídas para manter o histórico sempre
                                atualizado.</p>
                        </div>
                        <div class="tip-item">
                            <div class="tip-dot" style="background: #16a34a;"></div>
                            <p><span>Alto Risco:</span> Insumos críticos devem ser revisados com prioridade máxima.</p>
                        </div>
                    </div>
                    <div class="info-card">
                        <h3><i class='bx bx-bar-chart-alt-2'></i> Status do Sistema</h3>
                        <div class="stat-row">
                            <span class="stat-label">Módulo de Estoque</span>
                            <span class="badge badge-green">Ativo</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Módulo de Movimentações</span>
                            <span class="badge badge-green">Ativo</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Alertas de Risco</span>
                            <span class="badge badge-orange"><?= $resumo['risco_alto'] ?> Pendentes</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Versão da Plataforma</span>
                            <span class="stat-value">v1.0.0</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
</body>

</html>