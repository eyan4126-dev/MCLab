// ===== DADOS (substitui seus arrays do React) =====

// Pie (insumosPorRisco)
const insumosPorRisco = [
    { name: "Baixo", value: 2, color: "#22c55e" },
    { name: "Médio", value: 1, color: "#f97316" },
    { name: "Alto", value: 2, color: "#ef4444" }
];

// Bar (estoqueData)
const estoqueData = [
    { nome: "Produto A", quantidade: 10, minimo: 5 },
    { nome: "Produto B", quantidade: 3, minimo: 5 },
    { nome: "Produto C", quantidade: 8, minimo: 6 }
];


// ===== PIE CHART =====
const pieCtx = document.getElementById('pieChart');

new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: insumosPorRisco.map(i => i.name),
        datasets: [{
            data: insumosPorRisco.map(i => i.value),
            backgroundColor: insumosPorRisco.map(i => i.color)
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});


// ===== BAR CHART =====
const barCtx = document.getElementById('barChart');

new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: estoqueData.map(e => e.nome),
        datasets: [
            {
                label: 'Quantidade Atual',
                data: estoqueData.map(e => e.quantidade),
                backgroundColor: '#3b82f6'
            },
            {
                label: 'Quantidade Mínima',
                data: estoqueData.map(e => e.minimo),
                backgroundColor: '#ef4444'
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            x: {
                ticks: {
                    maxRotation: 45,
                    minRotation: 45
                }
            }
        }
    }
});