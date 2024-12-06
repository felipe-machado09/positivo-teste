## Sobre Mim

### Felipe Machado Teotonio  
**Senior PHP Developer | Laravel | Node | WordPress | React | Vue | Freelancer**  
Com mais de 7 anos de experiência em desenvolvimento de software, sou especialista em PHP, Laravel e WordPress, com forte atuação em metodologias ágeis como SCRUM e Kanban. Tenho habilidades em desenvolvimento de plugins, sistemas escaláveis e SEO, além de proficiência em Docker, Git e bancos de dados como MySQL e PostgreSQL.  

Para mais detalhes sobre minhas experiências e projetos, visite meu [LinkedIn](https://www.linkedin.com/in/felipe-machado-teotonio/).  

---

## Experiência Resumida

- **Turno (2024 - Presente):** Full Stack Engineer trabalhando com Laravel e Vue.js em soluções escaláveis para milhões de usuários.  
- **Fahrenheit Marketing (2023 - 2024):** Desenvolvimento de plugins e integrações customizadas em WordPress, Elementor e HubSpot.  
- **Nubank (2021 - 2023):** Criação e personalização de temas e plugins WordPress, automação de processos internos e foco em SEO.  
- **Ânima Educação (2021 - 2022):** Manutenção de sistemas legados e implementação de novas funcionalidades com PHP e Laravel.  
- **Estadão (2019 - 2021):** Desenvolvimento de sistemas robustos e eficientes utilizando Laravel, JavaScript e metodologias ágeis.  

---

## Sobre o Projeto Técnico


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
