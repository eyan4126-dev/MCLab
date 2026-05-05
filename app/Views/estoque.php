<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="<?= base_url('public/css/estoque_style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="layout">

        <div class="sidebar">
            <img src="public/img/logo.png" class="logo">

            <div class="menu">
                <ul>
                    <li><a href="dashboard">Dashboard</a></li>
                    <li class="active"><a href="estoque">Estoque</a></li>
                    <li><a href="movimentacoes">Movimentações</a></li>
                </ul>
            </div>

        </div>

        <div class="content">

            <div class="cabecalho">
                <h2>Estoque</h2>
            </div>

            <div class="px-4 mt-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCadastro"
                    style="margin-top: 0.5rem;">
                    Cadastrar Insumo <img src="public/img/mais.png" width="20px" height="20px"></img>
                </button>
                <!-- <input /> barra de pesquisa -->
            </div>

            <div class="filtros px-4 mt-3">
                <button class="filtro-btn active">Todos</button>
                <button class="filtro-btn green">Baixo</button>
                <button class="filtro-btn yellow">Médio</button>
                <button class="filtro-btn red">Alto</button>
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
                                    <option>🟢 Baixo</option>
                                    <option>🟡 Médio</option>
                                    <option>🔴 Alto</option>
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
                        <?php foreach ($insumos as $i): ?>
                            <tr>

                                <td><?= $i["id"] ?></td>

                                <td class="nome-click" data-bs-toggle="modal" data-bs-target="#modalInfo"
                                    data-bs-nome="<?= $i["nome"] ?>" data-bs-desc="<?= $i["descricao"] ?>">
                                    <?= $i["nome"] ?>
                                </td>

                                <td>
                                    <span class="badge-risco <?= strtolower($i["risco"]) ?>">
                                        <?= $i["risco"] ?>
                                    </span>
                                </td>

                                <td>
                                    <?= $i["quantidade_atual"] . " " . $i["unidade_medida"] ?>
                                </td>

                                <td>
                                    <?= date("d/m/Y", strtotime($i["data_validade"])) ?>
                                </td>

                                <td class="acoes">
                                    <img class="icon-editar" src="public/img/icon-editar.png" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-bs-id="<?= $i["id"] ?>"
                                        data-bs-nome="<?= $i["nome"] ?>" data-bs-desc="<?= $i["descricao"] ?>"
                                        data-bs-risco="<?= $i["risco"] ?>" data-bs-qtde="<?= $i["quantidade_atual"] ?>"
                                        data-bs-un-medida="<?= $i["unidade_medida"] ?>"
                                        data-bs-data-validade="<?= $i["data_validade"] ?>">

                                    <img class="tres-pontos" src="public/img/tres-pontos.png" data-bs-toggle="modal"
                                        data-bs-target="#modalInfo" data-bs-nome="<?= $i["nome"] ?>"
                                        data-bs-desc="<?= $i["descricao"] ?>">
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://jsdelivr.net"></script>
    <script src="<?= base_url('public/js/script.js'); ?>"></script>

</body>

</html>