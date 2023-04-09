# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[DockerでAmazon Linux 2をベースにしたApache HTTP ServerとPHP 7.4を簡単にインストールする方法](https://yossi-note.com/how_to_easily_install_apache_http_server_and_php74_based_on_amazon_linux_2_with_docker/)

# Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/app
docker compose build
docker compose up -d
```

ブラウザで `http://localhost:8080/info.php` にアクセスする。
