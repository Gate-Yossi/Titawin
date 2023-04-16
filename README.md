Titawin
====

読み方:ティタウィン

## Description
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

## URL

[makeコマンドにcleanとhelpターゲットを追加](https://yossi-note.com/added_clean_and_help_to_make_command/)

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
