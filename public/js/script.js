// Modal de visualização do insumo
const riscoMap = {
    baixo: 'mic-baixo',
    medio: 'mic-medio',
    alto: 'mic-alto',
};

document.getElementById('modalVisualizar').addEventListener('show.bs.modal', function (e) {
    const t = e.relatedTarget;
    const risco = t.getAttribute('data-bs-risco');
    const unidade = t.getAttribute('data-bs-unidade');

    document.getElementById('viewId').textContent = t.getAttribute('data-bs-id');
    document.getElementById('viewNome').textContent = t.getAttribute('data-bs-nome');
    document.getElementById('viewDescricao').textContent = t.getAttribute('data-bs-descricao');
    document.getElementById('viewQuantidade').textContent = t.getAttribute('data-bs-quantidade');
    document.getElementById('viewEstoqueMinimo').textContent = t.getAttribute('data-bs-estoque-minimo');
    document.getElementById('viewValidade').textContent = t.getAttribute('data-bs-validade');
    document.getElementById('viewUnidade').textContent = unidade;
    document.getElementById('viewUnidadeMin').textContent = unidade;

    const badge = document.getElementById('viewRiscoBadge');
    badge.textContent = risco.charAt(0).toUpperCase() + risco.slice(1);
    badge.className = 'mic-badge ' + (riscoMap[risco] || '');
});

// Modal de edição do insumo
document.getElementById('modalEditar').addEventListener('show.bs.modal', function (e) {
    const t = e.relatedTarget;

    const id            = t.getAttribute('data-bs-id');
    const nome          = t.getAttribute('data-bs-nome');
    const risco         = t.getAttribute('data-bs-risco');
    const unidade       = t.getAttribute('data-bs-unidade');
    const descricao     = t.getAttribute('data-bs-descricao');
    const quantidade    = t.getAttribute('data-bs-quantidade');
    const estoqueMinimo = t.getAttribute('data-bs-estoque-minimo');
    const validade      = t.getAttribute('data-bs-validade');

    document.getElementById('editId').value                      = id;
    this.querySelector('[name="nome"]').value                    = nome;
    this.querySelector('[name="descricao"]').value               = descricao;
    this.querySelector('[name="quantidade_atual"]').value        = quantidade;
    this.querySelector('[name="estoque_minimo"]').value          = estoqueMinimo;
    this.querySelector('[name="data_validade"]').value           = validade;
    this.querySelector('[name="risco"]').value                   = risco;
    this.querySelector('[name="unidade_medida"]').value          = unidade;
    this.querySelector('form').action = `${BASE_URL}editar_insumo/${id}`;
});