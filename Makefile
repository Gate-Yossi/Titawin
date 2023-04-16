SHELL = /bin/bash
WOKR_DIR = ./app
.DEFAULT_GOAL := help

# アプリのビルドから起動
.PHONY: setup
setup:
	@make build
	@make up
	@make setup_db

# コンテナの状態
.PHONY: ps
ps:
	cd $(WOKR_DIR) \
	&& docker compose ps

# アプリのビルド
.PHONY: build
build:
	cd $(WOKR_DIR) \
	&& docker compose build

# アプリの起動
.PHONY: up
up:
	cd $(WOKR_DIR) \
	&& docker compose up -d

# アプリの停止
.PHONY: down
down:
	cd $(WOKR_DIR) \
	&& docker compose down

# DBのセットアップ
.PHONY: setup_db
setup_db:
	cd $(WOKR_DIR) \
	&& docker compose run --rm flyway-baseline \
	&& docker compose run --rm flyway-migrate \
	&& docker compose run --rm flyway-info \
	&& docker compose run --rm schemaspy-cmd

# テスト用DBのセットアップ
.PHONY: setup_test_db
setup_test_db:
	cd $(WOKR_DIR) \
	&& docker compose run --rm flyway-cmd baseline -configFiles=/flyway/conf/flyway-test.conf \
	&& docker compose run --rm flyway-cmd migrate  -configFiles=/flyway/conf/flyway-test.conf \
	&& docker compose run --rm flyway-cmd info     -configFiles=/flyway/conf/flyway-test.conf

# テスト実施
.PHONY: test
test:
	cd $(WOKR_DIR) \
	&& docker-compose run web sh -c "cd /var/www/application/tests && /var/www/vendor/bin/phpunit"

# コンテナの削除
.PHONY: clean
clean:
	cd $(WOKR_DIR) \
	&& docker-compose down --rmi all --volumes --remove-orphans

# help
.PHONY: help
help:
	@grep -B 2 -E '^[a-zA-Z_-]+:' Makefile \
	| grep -v '.PHONY' \
    | grep -v -E '^\s*$$' \
	| tr '\n' ',' \
	| sed 's/--,/\n/g' \
	| awk -F, '{printf "%-20s %s\n", $$2, $$1}'
