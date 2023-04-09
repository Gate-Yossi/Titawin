# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[CodeIgniterの環境構築方法：PHPUnitの導入](https://yossi-note.com/codeigniter_environment_construction_method_installing_phpunit/)

# Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/app
docker compose build
docker compose up -d
```

ブラウザで `http://localhost:8080/Blog` にアクセスする。

# Test

```bash
docker-compose run app sh -c "cd /var/www/application/tests && /var/www/vendor/bin/phpunit"
```

# Xhprof

ブラウザで `http://localhost:8080/xhprof/?dir=/var/log/xhprof` にアクセスする。
