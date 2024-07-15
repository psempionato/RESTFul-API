## Projeto Laravel API RESTFul com Autenticação JWT e Documentação Swagger

## Descrição
Este projeto é uma API RESTful construída com Laravel que utiliza autenticação JWT (JSON Web Token) para proteger suas rotas. 
A API inclui endpoints para gerenciamento de itens e possui documentação gerada com Swagger para fácil visualização e teste das rotas.

## Pré-Requisitos
- Docker e Docker Compose
- Composer
- PHP (versão 8.1 ou superior)

### Configuração do Ambiente

1. Clone o repositório
2. Execute o comando "docker-compose up -d --build"
3. Acesse o container com o comando "docker-compose exec -it liberfly-test-php-1"
4. Acesse o diretório "laravel-test"
5. Dentro do container execute o comando "composer install"
6. Copie o arquivo de configuração: "cp .env.example .env"
7. Gere uma chave de aplicativo: "php artisan key:generate"
8. Execute as migrations e seeders: "php artisan migrate" e "php artisan db:seed"

## Documentação Swagger
A documentação Swagger está disponível em: http://localhost:8000/api/documentation


