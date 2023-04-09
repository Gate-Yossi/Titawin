# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[Dockerを使ってMySQLをローカルで動かす方法](https://yossi-note.com/How_to_run_MySQL_locally_using_Docker/)

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
