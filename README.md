# BoxLog

Projeto de aprendizado e demonstração de um CRUD para gerenciamento de logística.
Stack utilizada: **PHP 8.4 / Laravel 12** no backend e **Vue.js** no frontend.

## Estrutura

* `app/` – backend Laravel
* `resources/js` – frontend Vue
* `database/` – migrations, seeders e factories

## Dependências do setup

* PHP >= 8.4
* Composer
* npm
* sqlite3 (ou outro banco compatível)

## Setup

Clone o projeto, instale dependências e configure o ambiente:

```
git clone https://github.com/youngnix/crud-boxlog
cp .env.example .env
composer install
php artisan key:generate
npm install
```

## .env

Configure as variáveis de ambiente necessárias no arquivo `.env`.
O `.env.example` serve como base.

## Execução

Execute migrations, seeders e inicie o servidor:

```
php artisan migrate:fresh --seed
npm run dev
php artisan serve
```

Acesse a página de pedidos em [http://localhost:8000/orders](http://localhost:8000/orders).
Faça o login usando as credenciais configuradas no arquivo .env.
