# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[DockerとFlywayで簡単にデータベースをマイグレーションする方法](https://yossi-note.com/how_to_easily_interpret_databases_with_docker_and_flyway/)

# Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/db
docker compose build
docker compose up -d
```

```bash
# テーブル作成とデータ登録
docker compose run --rm flyway-info
docker compose run --rm flyway-baseline
docker compose run --rm flyway-migrate
# 登録したデータが表示されていれば、OK
mysql -u root -p -h localhost -P 3306 -D sample --protocol=tcp -e "select * from sample;"
```
