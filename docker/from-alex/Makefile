include .env

DOCKER_COMPOSE = docker compose


build-dev:
	@$(MAKE) _env_build_local
	@$(MAKE) _composer_install
	@$(MAKE) _cache_clear
	@$(MAKE) _cache_warmup
	@$(MAKE) _assets_install
	@$(MAKE) _migration

up:
	${DOCKER_COMPOSE} up -d --build


down:
	${DOCKER_COMPOSE} down --remove-orphans

ps:
	${DOCKER_COMPOSE} ps

restart: down up

logs:
	${DOCKER_COMPOSE} logs -f

cli:
	docker exec -it ${APP_NAME}-fpm-cli /bin/bash

_load_fixtures:
	docker exec -it ${APP_NAME}-fpm-cli symfony console doctrine:fixtures:load  --no-interaction

_env_build_local:
	docker exec ${APP_NAME}-fpm-cli rm -rf .env.local
	docker exec ${APP_NAME}-fpm-cli cp .env.local.dist .env.local

_composer_install:
	docker exec ${APP_NAME}-fpm-cli rm -Rf /var/www/vendor/*
	docker exec ${APP_NAME}-fpm-cli composer install --no-interaction --no-scripts

_cache_clear:
	docker exec ${APP_NAME}-fpm-cli rm -rf /var/www/var/cache/*
	docker exec ${APP_NAME}-fpm-cli chmod 777 -Rf /var/www/var/cache/

_cache_warmup:
	docker exec ${APP_NAME}-fpm-cli bin/console cache:warmup

_migration:
	docker exec ${APP_NAME}-fpm-cli symfony console doctrine:database:create --if-not-exists
	docker exec ${APP_NAME}-fpm-cli symfony console make:migration --no-interaction
	docker exec ${APP_NAME}-fpm-cli symfony console doctrine:migrations:migrate --allow-no-migration --no-interaction

_assets_install:
	docker exec ${APP_NAME}-fpm-cli symfony console assets:install


#composer dump-env prod


#test-tests:
#	docker exec -it phpunit-bus-ddd-php-fpm-cli php bin/phpunit
#
#test-onetest:
#	docker exec phpunit-bus-ddd-php-fpm-cli bin/phpunit tests/Domain/Handler/Event/Order/AddressToAddedHandlerTest.php
#	#docker run --rm -v ${PWD}/manager:/app manager-php-cli php bin/app.php