# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[CodeIgniterの環境構築方法：DBの単体テスト導入](https://yossi-note.com/CodeIgniter_environment_construction_method_DB_unit_test_introduction/)

# Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/app
docker compose build
docker compose up -d
docker compose run --rm flyway-baseline
docker compose run --rm flyway-migrate
```

ブラウザで `http://localhost:8080` にアクセスする。

# Test

```bash
docker compose run --rm flyway-cmd info     -configFiles=/flyway/conf/flyway-test.conf
docker compose run --rm flyway-cmd baseline -configFiles=/flyway/conf/flyway-test.conf
docker compose run --rm flyway-cmd migrate  -configFiles=/flyway/conf/flyway-test.conf
docker-compose run web sh -c "cd /var/www/application/tests && /var/www/vendor/bin/phpunit"
```

# Schemaspy

```bash
docker compose run --rm schemaspy-cmd
```

# Xhprof

ブラウザで `http://localhost:8080/xhprof/?dir=/var/log/xhprof` にアクセスする。
