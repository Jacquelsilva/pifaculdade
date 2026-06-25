
# Recora — Gerenciador de Assinaturas

Projeto Integrador desenvolvido no **2º semestre** do curso de Desenvolvimento de Software Multiplataforma (DSM) na **Fatec Indaiatuba**. O Recora é uma aplicação web para controle e organização de assinaturas e gastos recorrentes, ajudando o usuário a evitar cobranças desnecessárias e manter o controle financeiro.

## Funcionalidades

- **Cadastro e autenticação** de usuários com CPF como chave primária
- **Dashboard** com cards financeiros personalizáveis (descrição e cor)
- **Gerenciador de categorias** com três tipos de lançamento: Assinaturas, Pagamentos e Outros
- **Entradas financeiras** por mês vinculadas a cards
- **Histórico** de ações realizadas pelo usuário
- **Configurações de conta** — edição de dados pessoais e preferências
- **Suporte multilíngue** (PT/EN) via middleware de idioma
- Páginas institucionais: Sobre, Planos, Recursos, Contato, Privacidade, Termos e Suporte

## Planos

| Plano | Preço | Recursos |
|---|---|---|
| **Básico** | Grátis | Até 5 assinaturas, relatórios básicos e suporte por e-mail |
| **Premium** | R$ 9,90/mês | Assinaturas ilimitadas, alertas personalizados e suporte prioritário |

> 30 dias grátis — cancele quando quiser, sem taxas.

## Tecnologias

| Tecnologia | Uso |
|---|---|
| PHP 8 + Laravel 11 | Back-end e roteamento |
| Blade | Templates das views |
| MySQL | Banco de dados relacional |
| Laravel Sanctum | Autenticação por sessão |
| Vite | Build dos assets front-end |
| Bootstrap Icons | Ícones da interface |
| JavaScript (Vanilla) | Interatividade do dashboard e FAQ |

## Banco de Dados

O banco de dados foi criado por meio do MySQL. Primeiro, para que o site consiga armazenar o cadastro de usuários, fizemos a tabela de usuários. Então, foi feita a tabela de categorias, que será responsável por armazenar as categorias que o usuário queira criar. Como cada usuário cria uma categoria diferente, as duas tabelas estão conectadas.

As tabelas "Outros", "Pagamentos" e "Assinaturas" são os diferentes tipos de categoria que podem ser criados, então, dependendo do que o usuário escolher, o seu conteúdo irá mudar.

A tabela de Gastos precisa acessar os dados contidos nas categorias, para então retornar quanto que foi gasto em um mês, ano, entre outros. Já a tabela de histórico precisa acessar tudo o que o usuário cria, modifica ou faz dentro do site, por isso está conectada à tabela de Usuários.

**Tabela do Banco**
<img width="1594" height="692" alt="image" src="https://github.com/user-attachments/assets/7020a2a9-d5b5-4cb3-a109-249ccb630dc3" />

| Tabela | Descrição |
|---|---|
| `usuarios` | Dados do usuário (CPF como PK, nome, e-mail, senha, telefone) |
| `categoria` | Categorias criadas por cada usuário (vinculadas ao CPF) |
| `assinaturas` | Tipo de categoria para serviços com renovação periódica |
| `pagamentos` | Tipo de categoria para pagamentos com data definida |
| `outros` | Tipo de categoria para lançamentos livres |
| `gastos` | Totaliza os gastos por categoria |
| `historico` | Registro de ações do usuário por categoria |
| `cards` | Cards do dashboard com descrição e cor |
| `entradas` | Valores mensais vinculados a cada card |

## Estrutura do Projeto

```
pifaculdade-main/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Configurações administrativas
│   │   │   ├── Auth/           # Login, logout e sessão
│   │   │   └── Site/           # Dashboard, histórico, cadastro, home
│   │   └── Middleware/         # Autenticação e idioma
│   └── Models/                 # Assinatura, Card, Categoria, Entrada, Gasto, Historico, Outro, Pagamento, User
├── database/
│   ├── migrations/             # Criação de todas as tabelas
│   └── recora.sql              # Dump completo do banco
├── resources/
│   ├── views/                  # Blade templates (Inicio, Home, Dashboard, Historico, etc.)
│   └── lang/                   # Traduções PT e EN
├── routes/
│   └── web.php                 # Rotas públicas, autenticadas e de admin
└── public/
    ├── css/style.css           # Estilos globais
    └── js/                     # Scripts do dashboard e FAQ
```

## Instalação

**Pré-requisitos:** PHP 8.1+, Composer, Node.js, MySQL

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/pifaculdade.git
cd pifaculdade

# Instale as dependências PHP
composer install

# Instale as dependências JS
npm install && npm run build

# Configure o ambiente
cp .env.example .env
php artisan key:generate

# Configure o banco de dados no .env e rode as migrations
php artisan migrate

# Ou importe o dump direto
mysql -u root -p recora < database/recora.sql

# Inicie o servidor
php artisan serve
```

Acesse em `http://localhost:8000/inicio`

## Rotas Principais

| Rota | Acesso | Descrição |
|---|---|---|
| `/inicio` | Público | Landing page do Recora |
| `/cadastro` | Público | Criação de nova conta |
| `/login` | Público | Autenticação |
| `/dashboard` | Autenticado | Painel financeiro com cards |
| `/historico` | Autenticado | Histórico de lançamentos |
| `/configuracao` | Autenticado | Configurações da conta |
| `/cards` | Autenticado | API de cards (CRUD) |

## Equipe

Projeto desenvolvido por alunos do 2º semestre do curso de DSM — Fatec Indaiatuba (2025).

*Autoria: Recora*
