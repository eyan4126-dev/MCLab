<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('public/css/globals.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/mov_style.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
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
                    <li>
                        <a href="home">
                            <i class='bx bx-grid-alt'></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="estoque">
                            <i class='bx bx-package'></i> Estoque
                        </a>
                    </li>
                    <li class="active">
                        <a href="movimentacoes">
                            <i class='bx bx-history'></i> Movimentações
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="content">

            <div class="cabecalho">
                <h2>Movimentações</h2>
            </div>

            <!-- BOTÃO PARA CADASTRAR MOVIMENTAÇÕES -->
            <div class="px-4 mt-3 d-flex align-items-center justify-content-between">
                <button type="button" class="btn-cadastro" data-bs-toggle="modal" data-bs-target="#modalMovimentação"
                    style="margin-top: 0.5rem;">
                    Cadastrar Movimentação <img src="public/img/mais.png" width="20px" height="20px"></img>
                </button>


                <!-- BOTÕES PARA FILTRAR MOVIMENTAÇÕES -->
                <div class="filtros m-0">
                    <a href="<?= base_url('movimentacoes') ?>"
                        class="filtro-btn filtro-todos <?= !isset($_GET['tipo']) ? 'active' : '' ?>">
                        Todas
                    </a>

                    <a href="<?= base_url('movimentacoes?tipo=entrada') ?>"
                        class="filtro-btn filtro-entrada <?= ($_GET['tipo'] ?? '') == 'entrada' ? 'active' : '' ?>">
                        Entrada
                    </a>

                    <a href="<?= base_url('movimentacoes?tipo=saida') ?>"
                        class="filtro-btn filtro-saida <?= ($_GET['tipo'] ?? '') == 'saida' ? 'active' : '' ?>">
                        Saída
                    </a>
                </div>
            </div>

            <!-- modal de cadastro de movimentações -->
            <div class="modal fade" id="modalMovimentação">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Preencha os dados</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <form action=<?= base_url('cadastrar_movimentacao') ?> method="POST">
                                <label>ID do Insumo</label>
                                <input type="number" name="insumo_id" required>

                                <label>ID do Usuario</label>
                                <input type="number" name="usuario_id" required>

                                <label>Tipo de Movimentação</label>
                                <select name="tipo" required>
                                    <option></option>
                                    <option value="entrada">🟢 Entrada</option>
                                    <option value="saida">🔴 Saída</option>
                                </select>

                                <label>Quantidade</label>
                                <input type="number" name="quantidade" required>

                                <label>Data da Movimentação</label>
                                <input type="datetime-local" name="data_movimentacao" required>

                                <label>Observação</label>
                                <input type="text" name="observacao" required>

                                <button type="submit"><strong>Cadastrar</strong></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="table-container mt-3 mx-4">

                <div class="table-responsive">
                    <table class="tabela-moderna">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Data/Hora</th>
                                <th>Tipo</th>
                                <th>Insumo</th>
                                <th>Quantidade</th>
                                <th>Usuário</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($movimentacoes)): ?>

                                <?php $ordem = 1; ?>
                                <?php foreach (array_reverse($movimentacoes) as $mov): ?>
                                    <tr>

                                        <td><?= $ordem++ ?></td>
                                        <td>
                                            <?= date("d/m/Y H:i", strtotime($mov["data_movimentacao"])) ?>
                                        </td>

                                        <td>
                                            <div class="tipo-cell">

                                                <span class="tipo-icon <?= strtolower($mov["tipo"]) ?>">
                                                    <i class='bx <?= $mov["tipo"] == "entrada" ? "bx-trending-up" : "bx-trending-down" ?>'></i>
                                                </span>

                                                <span class="badge-tipo <?= strtolower($mov["tipo"]) ?>">
                                                    <?= $mov["tipo"] ?>
                                                </span>

                                            </div>
                                        </td>

                                        <td class="insumo-nome">
                                            <?= $mov["insumo_nome"] ?>
                                        </td>

                                        <td class="<?= $mov["tipo"] == 'entrada' ? 'qtd-entrada' : 'qtd-saida' ?>">
                                            <?= $mov["quantidade"] > 0 ? '+' : '' ?>
                                            <?= $mov["quantidade"] ?>
                                        </td>

                                        <td class="usuario">
                                            <?= $mov["usuario_nome"] ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                            <?php else: ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            Nenhuma movimentação registrada ainda
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>

    <script src="<?= base_url('public/js/script.js'); ?>"></script>

</body>

</html>