SHELL = /bin/bash
WOKR_DIR = ./app
.DEFAULT_GOAL := help
RUN_DATETIME = $(shell date "+%Y%m%d_%H%M%S")

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

# 負荷試験の実施
.PHONY: run_k6
run_k6:
	cd $(WOKR_DIR) \
	&& docker compose run --rm -T k6-cmd run - < k6/scripts/http_get.js

# コンテナの削除
.PHONY: clean
clean:
	cd $(WOKR_DIR) \
	&& docker-compose down --rmi all --volumes --remove-orphans

# 静的解析の実施
.PHONY: run_phpstan
run_phpstan:
	cd $(WOKR_DIR) \
	&& docker compose run --rm phpstan-cmd > ./phpstan/log/analysis_$(RUN_DATETIME).log

# 静的解析の実施
.PHONY: run_phan
run_phan:
	cd $(WOKR_DIR) \
	&& docker compose run --rm phan-cmd -po /mnt/log/analysis_$(RUN_DATETIME).log

# help
.PHONY: help
help:
	@grep -B 2 -E '^[a-zA-Z_-]+:' Makefile \
	| grep -v '.PHONY' \
    | grep -v -E '^\s*$$' \
	| tr '\n' ',' \
	| sed 's/--,/\n/g' \
	| awk -F, '{printf "%-20s %s\n", $$2, $$1}'
