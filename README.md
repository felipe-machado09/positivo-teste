# Laravel Sail Project Starter Guide

## Requisitos
Certifique-se de que Docker e Docker Compose estão instalados.

## Comandos para Configuração Inicial

```bash
# 1. Clone o repositório
git clone https://github.com/felipe-machado09/positivo-teste.git
cd seu-repositorio

# 2. Instale o Laravel Sail (se necessário)
composer require laravel/sail --dev
php artisan sail:install

# 3. Inicie o ambiente Docker
./vendor/bin/sail up -d

# 4. Configure o arquivo .env
cp .env.example .env
# Atualize as variáveis do banco de dados no .env conforme necessário:
# DB_CONNECTION=mysql
# DB_HOST=mysql
# DB_PORT=3306
# DB_DATABASE=nome_do_banco
# DB_USERNAME=root
# DB_PASSWORD=password

# 5. Instale as dependências
./vendor/bin/sail composer install

# 6. Gere a chave da aplicação
./vendor/bin/sail artisan key:generate

# 7. Execute migrations e seeders
./vendor/bin/sail artisan migrate --seed
