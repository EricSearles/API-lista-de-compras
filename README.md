# API de Lista de Compras

Esta é uma API de Lista de Compras desenvolvida com Laravel. A API oferece as seguintes funcionalidades:

- Criar uma lista de compras
- Adicionar e remover produtos à lista
- Obter dados de uma lista
- Adicionar e diminuir quantidades de um produto
- Duplicar uma lista

## Instalação

Siga as instruções abaixo para instalar e configurar a API em seu ambiente:

1. Clone o repositório:
 - git clone <url-do-repositorio>
  
2. Instale as dependências do projeto utilizando o Composer:
 - composer install
  
3. Crie um arquivo de ambiente `.env` a partir do arquivo `.env.example` e configure o banco de dados:
 - cp .env.example .env
  
4. Gere uma chave de aplicativo:
 - php artisan key:generate
  
5. Execute as migrations do banco de dados para criar as tabelas:
- php artisan migrate
  
6. Inicie o servidor local:
 - php artisan serve

## Para usar no postman
 Baixe o arquivo api-lista-de-compras.postman_collection.json
e importe a collection no postman


