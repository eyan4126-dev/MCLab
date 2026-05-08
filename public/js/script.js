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
document.getElementById('modalEditar').addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;

    document.getElementById('editId').value = button.getAttribute('data-bs-id');
    document.getElementById('editNome').value = button.getAttribute('data-bs-nome');
    document.getElementById('editDescricao').value = button.getAttribute('data-bs-descricao');
});