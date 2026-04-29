const btnABrir = document.getElementById('abrirModal');
const btnFechar = document.getElementById('fecharModal');
const modal = document.getElementById('modalInfo');

btnAbrir.addEventListener('click', () => {
    modal.showModal();
});

btnFechar.addEventListener('click', () => {
    modal.closeModal();
});

// JavaScript para preencher o modal
const editModal = document.getElementById('editModal')
editModal.addEventListener('show.bs.modal', event => {
    // Botão que acionou o modal
    const button = event.relatedTarget

    // Extrair informações dos atributos data-bs-*
    const id = button.getAttribute('data-bs-id')
    const nome = button.getAttribute('data-bs-nome')
    const descricao = button.getAttribute('data-bs-desc')
    const risco = button.getAttribute('data-bs-risco')
    const quantidade_atual = button.getAttribute('data-bs-qtde')
    const unidade_medida = button.getAttribute('data-bs-un-medida')
    const data_validade = button.getAttribute('data-bs-data-validade')

    // Atualizar o conteúdo do modal
    const modalBodyInputId = editModal.querySelector('#recipient-id')
    const modalBodyInputNome = editModal.querySelector('#recipient-name')
    const modalBodyInputDesc = editModal.querySelector('#recipient-desc')
    const modalBodyInputRisco = editModal.querySelector('#recipient-risco')
    const modalBodyInputQtde = editModal.querySelector('#recipient-qtde')
    const modalBodyInputUnMedida = editModal.querySelector('#recipient-un-medida')
    const modalBodyInputDataValidade = editModal.querySelector('#recipient-data-validade')

    modalBodyInputId.value = id
    modalBodyInputNome.value = nome
    modalBodyInputDesc.value = descricao
    modalBodyInputRisco.value = risco
    modalBodyInputQtde.value = quantidade_atual
    modalBodyInputUnMedida.value = unidade_medida
    modalBodyInputDataValidade.value = data_validade
})