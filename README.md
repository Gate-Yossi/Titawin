# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[CodeIgniterの環境構築方法：MySQLの導入](https://yossi-note.com/codeigniter_environment_construction_method_installing_mysql/)

# Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/app
docker compose build
docker compose up -d
docker compose run --rm flyway-baseline
docker compose run --rm flyway-migrate
```

ブラウザで `http://localhost:8080/Sample` にアクセスする。

# Test

```bash
docker-compose run app sh -c "cd /var/www/application/tests && /var/www/vendor/bin/phpunit"
```

# Xhprof

ブラウザで `http://localhost:8080/xhprof/?dir=/var/log/xhprof` にアクセスする。
