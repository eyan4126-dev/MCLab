<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentações</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.css'); ?>">
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
                    <li><a href="estoque">Estoque</a></li>
                    <li class="active"><a href="movimentacoes">Movimentações</a></li>
                </ul>
            </div>

        </div>

        <div class="content">

            <div class="cabecalho">
                <h2>Movimentações</h2>
            </div>

            <div class="px-4 mt-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMovimentação"
                    style="margin-top: 0.5rem;">
                    Cadastrar Movimentação <img src="public/img/mais.png" width="20px" height="20px"></img>
                </button>
            </div>

            <!-- The Modal -->
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

                            <form action=<?= base_url('cadastrar_insumo') ?> method="POST">
                                <label>Nome</label>
                                <input type="text" name="nome" required>

                                <label>Tipo de Movimentação</label>
                                <select name="risco" required>
                                    <option></option>
                                    <option>🟢 Entrada</option>
                                    <option>🔴 Saída</option>
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
                                <input type="number" name="quantidade" required>

                                <label>Estoque mínimo</label>
                                <input type="number" name="estoque_minimo" required>

                                <label>Data da Movimentação</label>
                                <input type="date" name="data_movimentacao" required>

                                <button type="submit"><strong>Cadastrar</strong></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="movimentacao-card">
                <div class="left-card">
                    ID: 1
                </div>
                <div class="center-card">
                    Entrade de insumo
                </div>
                <div class="right-card">

                </div>
            </div>



        </div>
    </div>

    <script src="https://jsdelivr.net"></script>
    <script src="<?= base_url('public/js/script.js'); ?>"></script>

</body>

</html>