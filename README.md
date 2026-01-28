# teste-nc

# CRUD Simples de Comentários

Aplicação simples de CRUD (Create, Read, Update, Delete) de comentários, desenvolvida utilizando Vue.js no frontend, Laravel no backend e PostgreSQL como banco de dados.

## Funcionalidades

- Criar comentários
- Listar comentários
- Editar comentários
- Excluir comentários

## Tecnologias Utilizadas

- Frontend: Vue.js
- Backend: Laravel
- Banco de Dados: PostgreSQL
- Node.js (>= 14.x)
- npm ou yarn
- PHP >= 8.x
- Composer

## Pré-requisitos

- Node.js >= 14
- npm ou yarn
- PHP >= 8.x
- Composer
- PostgreSQL

Verificação:
node -v
npm -v
php -v
composer -V

## Instalação

### Backend (Laravel)

Clone o repositório:

git clone [https://github.com/seu-usuario/seu-repositorio.git](https://github.com/Luanatvrs/teste-nc.git)
cd teste-nc/backend

Instale as dependências:

composer install

Copie o arquivo de ambiente:

cp .env.example .env

Gere a key da aplicação:

php artisan key:generate

Configure o banco de dados no .env:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

Rode as migrations:

php artisan migrate

Inicie o servidor:

php artisan serve

Backend disponível em:
http://localhost:8000

## Frontend (Vue)

Acesse a pasta do frontend:

cd ../frontend

Instale as dependências:

npm install

# ou

yarn install

Inicie o projeto:

npm run dev

# ou

yarn dev

Frontend disponível em:
http://localhost:5173

## Estrutura do Projeto 

Estrutura do Projeto

backend/ (Laravel)
- app
- routes
- database

frontend (Vue)
- src
- components

README.md



## Endpoints da API

- GET    /api/comentarios
- POST   /api/comentarios
- PUT    /api/comentarios/{id}
- DELETE /api/comentarios/{id}

## Exemplo de Requisição

{
  "name": "João",
  "message": "Ótimo conteúdo!"
}

