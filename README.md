# 🔬 MCLab — Sistema de Gestão de Estoque Laboratorial

> Aplicação web desenvolvida no SENAI para controle de insumos e movimentações de laboratório, aplicando o padrão MVC com PHP e CodeIgniter.

---

## 📋 Sobre o Projeto

O MCLab é um sistema de gestão de estoque voltado para laboratórios. Ele permite o cadastro e controle de insumos, registro de movimentações de entrada e saída, e exibe um dashboard com indicadores de risco baseados no nível de estoque de cada item.

**Funcionalidades:**
- 📦 Cadastro e gerenciamento de insumos
- 📉 Alertas automáticos de estoque abaixo do mínimo
- ⚠️ Classificação de insumos por nível de risco
- 🔄 Registro de movimentações (entradas e saídas)
- 📊 Dashboard com resumo geral do estoque

---

## 🛠️ Tecnologias Utilizadas

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![HTML](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

---

## 🚀 Como Rodar o Projeto

### Pré-requisitos

- PHP >= 8.1
- Composer
- MySQL
- Servidor local (XAMPP, Laragon, etc.)

### Instalação

**1. Clone o repositório**
```bash
git clone https://github.com/eyan4126-dev/MCLab.git
cd MCLab
```

**2. Instale as dependências**
```bash
composer install
```

**3. Configure o banco de dados**

Copie o arquivo de exemplo e preencha com suas credenciais:
```bash
cp app/Config/Database.php.example app/Config/Database.php
```

Abra `app/Config/Database.php` e preencha:
```php
'hostname' => 'localhost',
'username' => 'seu_usuario',
'password' => 'sua_senha',
'database' => 'mclab',
```

**4. Importe o banco de dados**

Crie um banco de dados chamado `mclab` e importe o arquivo SQL disponível em `app/Database/`.

**5. Configure o ambiente**
```bash
cp env .env
```

No `.env`, defina:
```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/MCLab/public'
```

**6. Acesse no navegador**
```
http://localhost/MCLab/public
```

---

## 📁 Estrutura do Projeto

```
MCLab/
├── app/
│   ├── Config/         # Configurações da aplicação
│   ├── Controllers/    # Controladores MVC
│   ├── Models/         # Models e acesso ao banco
│   ├── Views/          # Templates e páginas
│   └── Database/       # Migrations e seeds
├── public/
│   ├── css/            # Estilos
│   ├── js/             # Scripts
│   └── img/            # Imagens
└── system/             # Core do CodeIgniter
```

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

<div align="center">
  <sub>Desenvolvido por <a href="https://github.com/eyan4126-dev">Yan Oliveira</a></sub>
</div>
