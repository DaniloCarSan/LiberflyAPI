# Liberfy API

# PASTA PRINCIPAIS DO CÓDIGO DESENVOLVIDO

- /app/Business
- /app/Http/Controllers/Api
- openapi.yml
- /tests/Feature
- /tests/Unit

# Pré requisitos para execução do ambiente de teste

- PHP: 8.3
- [Docker] : ^26
- [Composer] : ^2.2

## Técnologias Utilizadas

- Docker/ Docker compose
- PHP: 8.3
- Laravel: 11
- Laravel Sail
- mailpit
- Mysql: 8
- PHPUnit: 11
- OpenApi(swagger)

## Documentação da api com openapi

A documentção se encontra na página inicial da aplicação **http://localhost/** ou você pode visualizar a espeficificação no arquivo
**openapi.yml** na raiz do projeto. Para facilitar a visualização ou até mesmo testar você pode estar importando o arquivo dentro do
insomnia ou no vscode com a extenção **42Crunch.vscode-openapi**

# Executando aplicação (de uma olhada no arquivo Makefile)

**1 - Na raiz do projeto rode o comando abaixo para baixar as dependências do projeto (composer deve estar instalado)**

````
composer install
````

**2 -  Caso tenha o utilizatário make instalado execute o comando abaixo na raiz do projeto**

````
make start
````

ou

````
	cp .env.example .env
	sed -i 's/DB_HOST=localhost/DB_HOST=mysql/g' .env
	php artisan key:generate
	./vendor/bin/sail up -d
	docker exec -it liberflyapi-laravel.test-1 bash -c "chmod -R 777 ." 
````

**3 - Para configura o banco(criar tabeles + dados fake) rode o comando abaixo**
````
make migrate
````

ou

````
	./vendor/bin/sail artisan migrate:refresh --seed
````

**4 - A aplicação será executada, caso tenha duvida visualize o docker-compose arquivo**

````
app= localhost/80
mysql= localhost/3306
mailpit= localhost/8085
````

# Executar os testes

````
make test
````

ou 

````
	./vendor/bin/sail test
````

[Docker]: https://docs.docker.com/engine/install/ubuntu/
[Composer]: https://getcomposer.org/download/