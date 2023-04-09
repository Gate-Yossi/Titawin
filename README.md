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
# ログインできれば成功
mysql -u root -p -h 127.0.0.1 -P 3306 --protocol=tcp 
```
