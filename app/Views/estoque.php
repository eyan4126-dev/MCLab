<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="<?= base_url('public/css/estoque_style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                        <a href="dashboard">
                            <i class='bx bx-grid-alt'></i> Dashboard
                        </a>
                    </li>
                    <li class="active">
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
                <h2>Estoque</h2>
            </div>

            <div class="px-4 mt-3 d-flex align-items-center justify-content-between">
                <button type="button" class="btn-cadastro" data-bs-toggle="modal" data-bs-target="#modalCadastro"
                    style="margin-top: 0.5rem;">
                    Cadastrar Insumo <img src="public/img/mais.png" width="20px" height="20px"></img>
                </button>
                <div class="filtros m-0">

                    <a href="<?= base_url('estoque') ?>"
                        class="filtro-btn filtro-todos <?= !isset($_GET['risco']) ? 'active' : '' ?>">
                        Todos
                    </a>

                    <a href="<?= base_url('estoque?risco=baixo') ?>"
                        class="filtro-btn filtro-baixo <?= ($_GET['risco'] ?? '') == 'baixo' ? 'active' : '' ?>">
                        Baixo
                    </a>

                    <a href="<?= base_url('estoque?risco=medio') ?>"
                        class="filtro-btn filtro-medio <?= ($_GET['risco'] ?? '') == 'medio' ? 'active' : '' ?>">
                        Médio
                    </a>

                    <a href="<?= base_url('estoque?risco=alto') ?>"
                        class="filtro-btn filtro-alto <?= ($_GET['risco'] ?? '') == 'alto' ? 'active' : '' ?>">
                        Alto
                    </a>

                </div>
            </div>

            <!-- modal para cadastrar insumos -->
            <div class="modal fade" id="modalCadastro">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Preencha os dados</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <form action=<?= base_url('cadastrar_insumo') ?> method="POST">
                                <label>Nome</label>
                                <input type="text" name="nome" required>

                                <label>Nível de risco</label>
                                <select name="risco" required>
                                    <option></option>
                                    <option value="baixo">🟢 Baixo</option>
                                    <option value="medio">🟡 Médio</option>
                                    <option value="alto">🔴 Alto</option>
                                </select>

                                <label>Unidade de medida</label>
                                <select name="unidade_medida" required>
                                    <option></option>
                                    <option>kg</option>
                                    <option>g</option>
                                    <option>mg</option>
                                    <option>L</option>
                                    <option>ml</option>
                                </select>

                                <label>Descrição</label>
                                <input type="text" name="descricao" required>

                                <label>Quantidade</label>
                                <input type="number" name="quantidade_atual" required>

                                <label>Estoque mínimo</label>
                                <input type="number" name="estoque_minimo" required>

                                <label>Data de validade</label>
                                <input type="date" name="data_validade" required>

                                <button type="submit"><strong>Cadastrar</strong></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- lista de insumos -->
            <div class="table-container mt-3 mx-4">
                <table class="tabela-moderna">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Risco</th>
                            <th>Quantidade</th>
                            <th>Validade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($insumos)): ?>

                            <?php foreach ($insumos as $i): ?>
                                <tr>

                                    <td><?= $i["id"] ?></td>

                                    <td class="nome-click" data-bs-toggle="modal" data-bs-target="#modalVisualizar"
                                            data-bs-id="<?= $i["id"] ?>" data-bs-nome="<?= $i["nome"] ?>"
                                            data-bs-risco="<?= $i["risco"] ?>" data-bs-unidade="<?= $i["unidade_medida"] ?>"
                                            data-bs-descricao="<?= $i["descricao"] ?>"
                                            data-bs-quantidade="<?= $i["quantidade_atual"] ?>"
                                            data-bs-estoque-minimo="<?= $i["estoque_minimo"] ?>"
                                            data-bs-validade="<?= date("d/m/Y", strtotime($i["data_validade"])) ?>">

                                        <?= $i["nome"] ?>

                                    </td>

                                    <td>
                                        <span class="badge-risco <?= strtolower($i["risco"]) ?>">
                                            <?= ucfirst($i["risco"]) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?= $i["quantidade_atual"] . " " . $i["unidade_medida"] ?>
                                    </td>

                                    <td>
                                        <?= date("d/m/Y", strtotime($i["data_validade"])) ?>
                                    </td>

                                    <td class="acoes">

                                        <i class='bx bx-show icon' data-bs-toggle="modal" data-bs-target="#modalVisualizar"
                                            data-bs-id="<?= $i["id"] ?>" data-bs-nome="<?= $i["nome"] ?>"
                                            data-bs-risco="<?= $i["risco"] ?>" data-bs-unidade="<?= $i["unidade_medida"] ?>"
                                            data-bs-descricao="<?= $i["descricao"] ?>"
                                            data-bs-quantidade="<?= $i["quantidade_atual"] ?>"
                                            data-bs-estoque-minimo="<?= $i["estoque_minimo"] ?>"
                                            data-bs-validade="<?= date("d/m/Y", strtotime($i["data_validade"])) ?>">
                                        </i>

                                        <i class='bx bx-pencil icon' data-bs-toggle="modal" data-bs-target="#modalEditar">
                                        </i>

                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="6" class="text-center py-5">

                                    <div class="d-flex flex-column align-items-center gap-2">

                                        <i class='bx bx-package text-secondary' style="font-size: 3rem;"></i>

                                        <span class="text-secondary fs-5">
                                            Nenhum insumo encontrado
                                        </span>

                                    </div>

                                </td>
                            </tr>

                        <?php endif; ?>

                        <!-- modal com informações do insumo -->
                        <div class="modal fade" id="modalVisualizar">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 p-0" style="border-radius: 16px; overflow: hidden;">

                                    <div class="modal-header border-0 pb-0 px-4 pt-3">
                                        <button type="button" class="btn-close ms-auto"
                                            data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body pt-0 px-4 pb-4">
                                        <div class="mic-header">
                                            <div>
                                                <span class="mic-id">ID #<span id="viewId"></span></span>
                                                <h2 class="mic-nome" id="viewNome"></h2>
                                                <p class="mic-desc" id="viewDescricao"></p>
                                            </div>
                                            <span class="mic-badge" id="viewRiscoBadge"></span>
                                        </div>

                                        <div class="mic-grid">
                                            <div class="mic-stat">
                                                <span class="mic-stat-label">Quantidade atual</span>
                                                <p class="mic-stat-value">
                                                    <span id="viewQuantidade"></span>
                                                    <span class="mic-stat-unit" id="viewUnidade"></span>
                                                </p>
                                            </div>
                                            <div class="mic-stat">
                                                <span class="mic-stat-label">Estoque mínimo</span>
                                                <p class="mic-stat-value">
                                                    <span id="viewEstoqueMinimo"></span>
                                                    <span class="mic-stat-unit" id="viewUnidadeMin"></span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mic-validade">
                                            <span class="mic-val-label">Validade</span>
                                            <span class="mic-val-value" id="viewValidade"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- modal para editar insumo -->
                        <div class="modal fade" id="modalEditar">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title">Editar Insumo</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <form action="<?= base_url('editar_insumo') ?>" method="POST">

                                            <input type="hidden" name="id" id="editId">

                                            <label>Nome</label>
                                            <input type="text" name="nome" required>

                                            <label>Nível de risco</label>
                                            <select name="risco" required>
                                                <option></option>
                                                <option value="baixo">Baixo</option>
                                                <option value="medio">Médio</option>
                                                <option value="alto">Alto</option>
                                            </select>

                                            <label>Unidade de medida</label>
                                            <select name="unidade_medida" required>
                                                <option></option>
                                                <option>kg</option>
                                                <option>g</option>
                                                <option>mg</option>
                                                <option>L</option>
                                                <option>ml</option>
                                            </select>

                                            <label>Descrição</label>
                                            <input type="text" name="descricao" required>

                                            <label>Quantidade</label>
                                            <input type="number" name="quantidade_atual" required>

                                            <label>Estoque mínimo</label>
                                            <input type="number" name="estoque_minimo" required>

                                            <label>Data de validade</label>
                                            <input type="date" name="data_validade" required>

                                            <button type="submit">
                                                Salvar Alterações
                                            </button>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="<?= base_url('public/js/script.js'); ?>"></script>

</body>

</html>