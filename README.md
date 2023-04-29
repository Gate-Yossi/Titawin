Titawin
====

読み方:ティタウィン

## Description
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

## URL

[Dockerで作る開発環境：php-fpmの導入](https://yossi-note.com/introducing_php_fpm/)

## Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/app
make help
```

## Start

```bash
make setup
```

ブラウザで `http://localhost:8080` にアクセスする。

## Test

```bash
make setup_test_db
make test
```

## Schemaspy

migrateする度に更新されます。

```bash
make setup_db
```

## Xhgui

ブラウザで `http://localhost:8142/` にアクセスする。

## Prometheus

ブラウザで `http://localhost:9090/` にアクセスする。

## Grafana

ブラウザで `http://localhost:3000/` にアクセスする。

| target metrics | template id |
| -- | -- |
| docker deamon | 1229 |
| apache | 3894 |
| mysql | 7362 |
| memcached | 3063 |
| k6 | 2587 |
