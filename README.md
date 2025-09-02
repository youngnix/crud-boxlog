# BoxLog

Este projeto é apenas um projeto de aprendizado e demonstração de um CRUD emulando um sistema de gerenciamento de logística.
O projeto usa um stack composto de PHP 8.4/Laravel 12 e Vue.js.

## Estrutura

- `app/` - backend Laravel
- `resources/js` - frontend Vue

# Dependências do setup

- PHP >= 8.4
- Composer
- npm
- sqlite3 

# Setup
 
```
git clone https://github.com/youngnix/crud-boxlog
cp .env.example .env
composer install
php artisan key:generate
npm install
```

## .env

É necessária a configuração do arquivo .env. As variáveis necessárias serão documentadas no arquivo.

# Execução

```
php artisan migrate:fresh --seed
npm run dev
php artisan serve
```

Acesse http://localhost:8000 no seu navegador.
