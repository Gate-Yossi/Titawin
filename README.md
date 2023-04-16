# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[CodeIgniterの環境構築方法：DBの単体テスト導入](https://yossi-note.com/CodeIgniter_environment_construction_method_DB_unit_test_introduction/)

# Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/app
make setup
```

ブラウザで `http://localhost:8080` にアクセスする。

# Test

```bash
make setup_test_db
make test
```

# Schemaspy

migrateする度に更新されます。

```bash
make setup_db
```

# Xhprof

ブラウザで `http://localhost:8080/xhprof/?dir=/var/log/xhprof` にアクセスする。
