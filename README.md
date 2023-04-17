Titawin
====

読み方:ティタウィン

## Description
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

## URL

[dockerでPrometheusによる監視環境の構築](https://yossi-note.com/building_a_monitoring_environment_using_prometheus_with_docker/)

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
