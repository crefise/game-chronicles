NODE_CONTAINER := game_chronicles_node
MYSQL_CONTAINER := game_chronicles_mysql
APP_CONTAINER := game_chronicles_app

EXEC := docker exec -it

NPM := docker exec game_chronicles_node npm
ARTISAN := docker exec $(APP_CONTAINER) php artisan
APP := docker exec $(APP_CONTAINER)

build:
	@docker-compose pull
	@docker-compose build

start:
	@docker-compose up -d

stop:
	@docker-compose stop

restart: stop start

node:
	@$(EXEC) $(NODE_CONTAINER) bash

php:
	@$(EXEC) $(APP_CONTAINER) bash

ssh: php

mysql:
	@$(EXEC) $(MYSQL_CONTAINER) bash

migrate:
	@$(ARTISAN) migrate

key:
	@$(ARTISAN) key:generate

optimize:
	@$(ARTISAN) optimize

composer-install:
	@$(APP) composer install

npm-install:
	@$(NPM) install

npm-dev:
	@$(NPM) run dev

npm-watch:
	@$(NPM) run watch
