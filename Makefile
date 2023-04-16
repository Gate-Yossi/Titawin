SHELL = /bin/bash
WOKR_DIR = ./app
.DEFAULT_GOAL := help

.PHONY: setup ps build up down setup_db setup_test_db test clean

setup:
	@make build
	@make up
	@make setup_db

ps:
	cd $(WOKR_DIR) \
	&& docker compose ps

build:
	cd $(WOKR_DIR) \
	&& docker compose build

up:
	cd $(WOKR_DIR) \
	&& docker compose up -d

down:
	cd $(WOKR_DIR) \
	&& docker compose down

setup_db:
	cd $(WOKR_DIR) \
	&& docker compose run --rm flyway-baseline \
	&& docker compose run --rm flyway-migrate \
	&& docker compose run --rm flyway-info \
	&& docker compose run --rm schemaspy-cmd

setup_test_db:
	cd $(WOKR_DIR) \
	&& docker compose run --rm flyway-cmd baseline -configFiles=/flyway/conf/flyway-test.conf \
	&& docker compose run --rm flyway-cmd migrate  -configFiles=/flyway/conf/flyway-test.conf \
	&& docker compose run --rm flyway-cmd info     -configFiles=/flyway/conf/flyway-test.conf

test:
	cd $(WOKR_DIR) \
	&& docker-compose run web sh -c "cd /var/www/application/tests && /var/www/vendor/bin/phpunit"

clean:
	cd $(WOKR_DIR) \
	&& docker-compose down --rmi all --volumes --remove-orphans
