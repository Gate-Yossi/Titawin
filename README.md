Titawin
====

読み方:ティタウィン

## Description
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

## URL

[Dockerで作る開発環境：k6で負荷試験とGrafanaによる可視化を試す](https://yossi-note.com/try_load_test_and_visualization_with_grafana_with_k6/)

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

## Xhprof

ブラウザで `http://localhost:8080/xhprof/?dir=/var/log/xhprof` にアクセスする。

## Prometheus

ブラウザで `http://localhost:9090/` にアクセスする。

## Grafana

ブラウザで `http://localhost:3000/` にアクセスする。

| target metrics | template id |
| -- | -- |
| docker deamon | 1229 |
| apache | 3894 |
| mysql | 7362 |
| k6 | 2587 |
